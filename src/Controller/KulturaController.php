<?php

namespace App\Controller;

use App\Entity\Amp;
use App\Entity\Kultura;
use App\Form\BerrikusiKulturaType;
use App\Form\KulturaType;
use App\Repository\KulturaRepository;
use App\Repository\LogRepository;
use App\Service\DbHelperService;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\QueryBuilder;
use Knp\Component\Pager\PaginatorInterface;
use Knp\Snappy\Pdf;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/kultura")
 */
class KulturaController extends AbstractController
{

    /**
     * @Route("/", name="kultura_index", methods={"GET", "POST"})
     * @param Request                       $request
     * @param PaginatorInterface            $paginator
     * @param KulturaRepository             $kulturaRepository
     * @param \App\Repository\LogRepository $logRepository
     * @param SessionInterface              $session
     * @param DbHelperService               $dbhelper
     *
     * @return Response
     */
    public function index(
        Request $request,
        PaginatorInterface $paginator,
        KulturaRepository $kulturaRepository,
        LogRepository $logRepository,
        SessionInterface $session,
        DbHelperService $dbhelper
    ): Response
    {
        $fields    = $dbhelper->getAllEntityFields(Kultura::class);
        $myFilters = $dbhelper->getFinderParams($request->query->get('form'));
        $query     = $dbhelper->performSearch('kultura', $myFilters, $fields, $_SERVER['REQUEST_URI']);
        $kulturas  = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('limit', 10)/*limit per page*/
        );

        $myselection = $session->get('zertegi-selection');
        if ($myselection !== null) {
            if (array_key_exists('kultura', $myselection)) {
                $myselection = $myselection['kultura'];
            }
        }

        $fields = $dbhelper->getAllEntityFields(Kultura::class);
        $logs   = $logRepository->findBy([], ['id' => 'DESC'], 10);

        return $this->render(
            'kultura/index.html.twig',
            [
                'logs'        => $logs,
                'kulturas'    => $kulturas,
                'myselection' => $myselection,
                'fields'      => $fields,
                'finderdata'  => $request->query->get('form')]
        );
    }

    /**
     * @Route("/rebisioa", name="kultura_rebisioa")
     */
    public function rebisioa(Request $request, PaginatorInterface $paginator, KulturaRepository $kulturaRepository): Response
    {
        $query = $kulturaRepository->getAllBerrikusi();
        $kulturak  = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('limit', 10)/*limit per page*/
        );
        return $this->render('kultura/rebisioa.html.twig', [
            'kulturak' => $kulturak,
        ]);
    }

    /**
     * @Route("/new", name="kultura_new", methods={"GET","POST"})
     * @param Request $request
     *
     * @return Response
     */
    public function new(Request $request): Response
    {
        $kultura = new Kultura();
        $form    = $this->createForm(KulturaType::class, $kultura);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($kultura);
            $entityManager->flush();

            $this->addFlash('success', 'Datuak ongi grabatu dira.');

            return $this->redirectToRoute('kultura_index');
        }

        return $this->render(
            'kultura/new.html.twig',
            [
                'kultura' => $kultura,
                'form'    => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/{id}", name="kultura_show", methods={"GET"})
     * @param Kultura $kultura
     *
     * @return Response
     */
    public function show(Kultura $kultura): Response
    {
        return $this->render(
            'kultura/show.html.twig',
            [
                'kultura' => $kultura,
            ]
        );
    }

    /**
     * @Route("/{id}/apli/{num}", name="kultura_apli", methods={"GET"})
     * @param Kultura $kultura
     *
     * @param     $num
     *
     * @return Response
     */
    public function apli(Kultura $kultura, $num): Response
    {
        return $this->render('kultura/apli.html.twig',
                             [
                                 'kultura' => $kultura,
                                 'num' => $num
                             ]
        );
    }

    /**
     * @Route("/{id}/edit", name="kultura_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Kultura $kultura
     *
     * @return Response
     */
    public function edit(Request $request, Kultura $kultura): Response
    {
        $form = $this->createForm(KulturaType::class, $kultura);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'Datuak ongi grabatu dira.');

            return $this->redirectToRoute(
                'kultura_index',
                [
                    'id' => $kultura->getId(),
                ]
            );
        }

        return $this->render(
            'kultura/edit.html.twig',
            [
                'kultura' => $kultura,
                'form'    => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/berrikusi/{id}", name="kultura_berrikusi", methods={"GET","POST"})
     * @param Request $request
     * @param Kultura $kultura
     * @return Response
     */
    public function berrikusi(Request $request, Kultura  $kultura): Response
    {
        $form = $this->createForm(BerrikusiKulturaType::class, $kultura);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $kultura->setBerrikusi(false);
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Aldaketak ongi gorde dira.');
            return $this->redirectToRoute('kultura_rebisioa');
        }

        return $this->render(
            'kultura/berrikusi.html.twig',
            [
                'kultura'  => $kultura,
                'form' => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/{id}", name="kultura_delete", methods={"DELETE"}, options = { "expose" = true })
     * @param Request $request
     * @param Kultura $kultura
     *
     * @return Response
     */
    public function delete(Request $request, Kultura $kultura): Response
    {
        if ($this->isCsrfTokenValid('delete' . $kultura->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($kultura);
            $entityManager->flush();
        } elseif ($request->isXmlHttpRequest()) {
            $message = 'CSRF token error';
            $resp    = [
                'code' => 500,
                'data' => $message,
            ];

            return new JsonResponse($resp, 500);
        } else {
            return $this->redirectToRoute('kultura_index');
        }

        if ($request->isXmlHttpRequest()) {
            $resp = [
                'code' => 200,
                'data' => 'Ezabatua izan da',
            ];

            return new JsonResponse($resp);
        }

        return $this->redirectToRoute('kultura_index');
    }

    /**
     * @Route("/print/{id}", name="kultura_print", methods={"GET", "POST" })
     * @param Request $request
     *
     * @param Kultura $kultura
     * @param Pdf     $snappy
     *
     * @return Response
     */
    public function print(Request $request, Kultura $kultura, Pdf $snappy): Response
    {
        $html     = $this->renderView('kultura/pdf.html.twig', ['kultura' => $kultura]);
        $filename = sprintf('kultura-%s.pdf', date('Y-m-d-hh-ss'));

        return new Response(
            $snappy->getOutputFromHtml($html),
            200,
            [
                'Content-Type'        => 'application/pdf',
                'Content-Disposition' => sprintf('attachment; filename="%s"', $filename),
            ]
        );
    }
}
