<?php

namespace App\Controller;

use App\Entity\Amp;
use App\Entity\Euskera;
use App\Entity\Hutsak;
use App\Form\BerrikusiHutsakType;
use App\Form\HutsakType;
use App\Repository\HutsakRepository;
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
 * @Route("/admin/hutsak")
 */
class HutsakController extends AbstractController
{

    /**
     * @Route("/", name="hutsak_index", methods={"GET"})
     * @param Request                       $request
     * @param PaginatorInterface            $paginator
     * @param HutsakRepository              $hutsakRepository
     * @param SessionInterface              $session
     * @param DbHelperService               $dbhelper
     * @param \App\Repository\LogRepository $logRepository
     *
     * @return Response
     */
    public function index(Request $request, PaginatorInterface $paginator,
                          HutsakRepository $hutsakRepository, SessionInterface $session,
                          DbHelperService $dbhelper, LogRepository $logRepository
    ): Response
    {
        $fields    = $dbhelper->getAllEntityFields(Hutsak::class);
        $myFilters = $dbhelper->getFinderParams($request->query->get('form'));
        $query     = $dbhelper->performSearch('hutsak', $myFilters, $fields, $_SERVER['REQUEST_URI']);
        $hutsaks   = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('limit', 10)/*limit per page*/
        );

        $myselection = $session->get('zertegi-selection');
        if ($myselection !== null) {
            if (array_key_exists('hutsak', $myselection)) {
                $myselection = $myselection['hutsak'];
            }
        }

        $fields = $dbhelper->getAllEntityFields(Hutsak::class);
        $logs   = $logRepository->findBy([], ['id' => 'DESC'], 10);

        return $this->render(
            'hutsak/index.html.twig',
            [
                'logs'        => $logs,
                'hutsaks'     => $hutsaks,
                'myselection' => $myselection,
                'fields'      => $fields,
                'finderdata'  => $request->query->get('form')]
        );
    }

    /**
     * @Route("/rebisioa", name="hutsak_rebisioa")
     */
    public function rebisioa(Request $request, PaginatorInterface $paginator, HutsakRepository $hutsakRepository): Response
    {
        $query = $hutsakRepository->getAllBerrikusi();
        $hutsak  = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('limit', 10)/*limit per page*/
        );
        return $this->render('hutsak/rebisioa.html.twig', [
            'hutsak' => $hutsak,
        ]);
    }

    /**
     * @Route("/new", name="hutsak_new", methods={"GET","POST"})
     * @param Request $request
     *
     * @return Response
     */
    public function new(Request $request): Response
    {
        $hutsak = new Hutsak();
        $form   = $this->createForm(HutsakType::class, $hutsak);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($hutsak);
            $entityManager->flush();

            $this->addFlash('success', 'Datuak ongi grabatu dira.');
            return $this->redirectToRoute('hutsak_index');
        }

        return $this->render('hutsak/new.html.twig', [
            'hutsak' => $hutsak,
            'form'   => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="hutsak_show", methods={"GET"})
     * @param Hutsak $hutsak
     *
     * @return Response
     */
    public function show(Hutsak $hutsak): Response
    {
        return $this->render('hutsak/show.html.twig', [
            'hutsak' => $hutsak,
        ]);
    }

    /**
     * @Route("/{id}/apli/{num}", name="hutsak_apli", methods={"GET"})
     * @param Hutsak $hutsak
     *
     * @param     $num
     *
     * @return Response
     */
    public function apli(Hutsak $hutsak, $num): Response
    {
        return $this->render('hutsak/apli.html.twig',
                             [
                                 'hutsak' => $hutsak,
                                 'num' => $num
                             ]
        );
    }

    /**
     * @Route("/{id}/edit", name="hutsak_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Hutsak  $hutsak
     *
     * @return Response
     */
    public function edit(Request $request, Hutsak $hutsak): Response
    {
        $form = $this->createForm(HutsakType::class, $hutsak);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'Datuak ongi grabatu dira.');
            return $this->redirectToRoute('hutsak_index', [
                'id' => $hutsak->getId(),
            ]);
        }

        return $this->render('hutsak/edit.html.twig', [
            'hutsak' => $hutsak,
            'form'   => $form->createView(),
        ]);
    }

    /**
     * @Route("/berrikusi/{id}", name="hutsak_berrikusi", methods={"GET","POST"})
     * @param Request $request
     * @param Hutsak $hutsak
     * @return Response
     */
    public function berrikusi(Request $request, Hutsak  $hutsak): Response
    {
        $form = $this->createForm(BerrikusiHutsakType::class, $hutsak);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $hutsak->setBerrikusi(false);
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Aldaketak ongi gorde dira.');
            return $this->redirectToRoute('hutsak_rebisioa');
        }

        return $this->render(
            'hutsak/berrikusi.html.twig',
            [
                'hutsak'  => $hutsak,
                'form' => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/{id}", name="hutsak_delete", methods={"DELETE"}, options = { "expose" = true })
     * @param Request $request
     * @param Hutsak  $hutsak
     *
     * @return Response
     */
    public function delete(Request $request, Hutsak $hutsak): Response
    {
        if ($this->isCsrfTokenValid('delete' . $hutsak->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($hutsak);
            $entityManager->flush();
        } elseif ($request->isXmlHttpRequest()) {
            $message = 'CSRF token error';
            $resp    = [
                'code' => 500,
                'data' => $message
            ];
            return new JsonResponse($resp, 500);
        } else {
            return $this->redirectToRoute('hutsak_index');
        }

        if ($request->isXmlHttpRequest()) {
            $resp = [
                'code' => 200,
                'data' => 'Ezabatua izan da'
            ];
            return new JsonResponse($resp);
        }

        return $this->redirectToRoute('hutsak_index');
    }

    /**
     * @Route("/print/{id}", name="hutsak_print", methods={"GET", "POST" })
     * @param Request $request
     *
     * @param Hutsak  $hutsak
     * @param Pdf     $snappy
     *
     * @return Response
     */
    public function print(Request $request, Hutsak $hutsak, Pdf $snappy): Response
    {
        $html     = $this->renderView('hutsak/pdf.html.twig', ['hutsak' => $hutsak]);
        $filename = sprintf('hutsak-%s.pdf', date('Y-m-d-hh-ss'));

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
