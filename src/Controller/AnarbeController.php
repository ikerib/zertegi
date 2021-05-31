<?php

namespace App\Controller;

use App\Entity\Amp;
use App\Entity\Anarbe;
use App\Form\AnarbeType;
use App\Form\BerrikusiAnarbeType;
use App\Repository\AnarbeRepository;
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
 * @Route("/admin/anarbe")
 */
class AnarbeController extends AbstractController
{

    /**
     * @Route("/", name="anarbe_index", methods={"GET", "POST"})
     * @param Request                       $request
     * @param PaginatorInterface            $paginator
     * @param AnarbeRepository              $anarbeRepository
     * @param SessionInterface              $session
     * @param DbHelperService               $dbhelper
     * @param \App\Repository\LogRepository $logRepository
     *
     * @return Response
     */
    public function index(Request $request, PaginatorInterface $paginator,
                          AnarbeRepository $anarbeRepository, SessionInterface $session,
                          DbHelperService $dbhelper, LogRepository $logRepository
    ): Response
    {
        $fields    = $dbhelper->getAllEntityFields(Anarbe::class);
        $myFilters = $dbhelper->getFinderParams($request->query->get('form'));
        $query     = $dbhelper->performSearch('anarbe', $myFilters, $fields, $_SERVER['REQUEST_URI']);
        $anarbes   = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('limit', 10)/*limit per page*/
        );


        $myselection = $session->get('zertegi-selection');
        if (($myselection !== null) && (array_key_exists('anarbe', $myselection))) {
            $myselection = $myselection['anarbe'];
        }

        $logs = $logRepository->findBy([], ['id' => 'DESC'], 10);

        return $this->render(
            'anarbe/index.html.twig',
            [
                'logs'        => $logs,
                'anarbes'     => $anarbes,
                'fields'      => $fields,
                'myselection' => $myselection,
                'finderdata'  => $request->query->get('form')]
        );
    }


    /**
     * @Route("/rebisioa", name="anarbe_rebisioa")
     */
    public function rebisioa(Request $request, PaginatorInterface $paginator, AnarbeRepository $anarbeRepository): Response
    {
        $query = $anarbeRepository->getAllBerrikusi();
        $anarbes  = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('limit', 10)/*limit per page*/
        );
        return $this->render('anarbe/rebisioa.html.twig', [
            'anarbes' => $anarbes,
        ]);
    }

    /**
     * @Route("/new", name="anarbe_new", methods={"GET","POST"})
     * @param Request $request
     *
     * @return Response
     */
    public function new(Request $request): Response
    {
        $anarbe = new Anarbe();
        $form   = $this->createForm(AnarbeType::class, $anarbe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($anarbe);
            $entityManager->flush();

            $this->addFlash('success', 'Datuak ongi grabatu dira.');
            return $this->redirectToRoute('anarbe_index');
        }

        return $this->render('anarbe/new.html.twig', [
            'anarbe' => $anarbe,
            'form'   => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="anarbe_show", methods={"GET"})
     * @param Anarbe $anarbe
     *
     * @return Response
     */
    public function show(Anarbe $anarbe): Response
    {
        return $this->render('anarbe/show.html.twig', [
            'anarbe' => $anarbe,
        ]);
    }

    /**
     * @Route("/{id}/apli/{num}", name="anarbe_apli", methods={"GET"})
     * @param Anarbe $anarbe
     *
     * @param     $num
     *
     * @return Response
     */
    public function apli(Anarbe $anarbe, $num): Response
    {
        return $this->render(
            'anarbe/apli.html.twig',
            [
                'anarbe' => $anarbe,
                'num' => $num
            ]
        );
    }

    /**
     * @Route("/{id}/edit", name="anarbe_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Anarbe  $anarbe
     *
     * @return Response
     */
    public function edit(Request $request, Anarbe $anarbe): Response
    {
        $form = $this->createForm(AnarbeType::class, $anarbe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'Aldaketak ongi gorde dira.');
            return $this->redirectToRoute('anarbe_index', [
                'id' => $anarbe->getId(),
            ]);
        }

        return $this->render('anarbe/edit.html.twig', [
            'anarbe' => $anarbe,
            'form'   => $form->createView(),
        ]);
    }

    /**
     * @Route("/berrikusi/{id}", name="anarbe_berrikusi", methods={"GET","POST"})
     * @param Request $request
     * @param Anarbe     $anarbe
     *
     * @return Response
     */
    public function berrikusi(Request $request, Anarbe $anarbe): Response
    {
        $form = $this->createForm(BerrikusiAnarbeType::class, $anarbe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $anarbe->setBerrikusi(false);
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Aldaketak ongi gorde dira.');
            return $this->redirectToRoute('anarbe_rebisioa');
        }

        return $this->render(
            'anarbe/berrikusi.html.twig',
            [
                'anarbe'  => $anarbe,
                'form' => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/{id}", name="anarbe_delete", methods={"DELETE"}, options = { "expose" = true })
     * @param Request $request
     * @param Anarbe  $anarbe
     *
     * @return Response
     */
    public function delete(Request $request, Anarbe $anarbe): Response
    {
        if ($this->isCsrfTokenValid('delete' . $anarbe->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($anarbe);
            $entityManager->flush();

        } elseif ($request->isXmlHttpRequest()) {
            $message = 'CSRF token error';
            $resp    = [
                'code' => 500,
                'data' => $message
            ];
            return new JsonResponse($resp, 500);
        } else {
            return $this->redirectToRoute('anarbe_index');
        }

        if ($request->isXmlHttpRequest()) {
            $resp = [
                'code' => 200,
                'data' => 'Ezabatua izan da'
            ];
            return new JsonResponse($resp);
        }

        return $this->redirectToRoute('anarbe_index');
    }

    /**
     * @Route("/print/{id}", name="anarbe_print", methods={"GET", "POST" })
     * @param Request $request
     *
     * @param Anarbe  $anarbe
     * @param Pdf     $snappy
     *
     * @return Response
     */
    public function print(Request $request, Anarbe $anarbe, Pdf $snappy): Response
    {
        $html     = $this->renderView('anarbe/pdf.html.twig', ['anarbe' => $anarbe]);
        $filename = sprintf('anarbe-%s.pdf', date('Y-m-d-hh-ss'));

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
