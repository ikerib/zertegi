<?php

namespace App\Controller;

use App\Entity\Amp;
use App\Entity\Protokoloak;
use App\Entity\Tablas;
use App\Form\BerrikusiTablasType;
use App\Form\TablasType;
use App\Repository\LogRepository;
use App\Repository\TablasRepository;
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
 * @Route("/admin/tablas")
 */
class TablasController extends AbstractController
{

    /**
     * @Route("/", name="tablas_index", methods={"GET", "POST"})
     * @param Request                       $request
     * @param PaginatorInterface            $paginator
     * @param TablasRepository              $tablasRepository
     * @param \App\Repository\LogRepository $logRepository
     * @param SessionInterface              $session
     * @param DbHelperService               $dbhelper
     *
     * @return Response
     */
    public function index(
        Request $request,
        PaginatorInterface $paginator,
        TablasRepository $tablasRepository,
        LogRepository $logRepository,
        SessionInterface $session,
        DbHelperService $dbhelper
    ): Response
    {

        $fields    = $dbhelper->getAllEntityFields(Tablas::class);
        $myFilters = $dbhelper->getFinderParams($request->query->get('form'));
        $query     = $dbhelper->performSearch('tablas', $myFilters, $fields, $_SERVER['REQUEST_URI']);
        $tablas    = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('limit', 10)/*limit per page*/
        );

        $myselection = $session->get('zertegi-selection');
        if (($myselection !== null) && array_key_exists('tablas', $myselection)) {
            $myselection = $myselection['tablas'];
        }

        $fields = $dbhelper->getAllEntityFields(Tablas::class);
        $logs   = $logRepository->findBy([], ['id' => 'DESC'], 10);

        return $this->render(
            'tablas/index.html.twig',
            [
                'logs'        => $logs,
                'tablas'      => $tablas,
                'myselection' => $myselection,
                'fields'      => $fields,
                'finderdata'  => $request->query->get('form')]
        );
    }

    /**
     * @Route("/rebisioa", name="tablas_rebisioa")
     */
    public function rebisioa(Request $request, PaginatorInterface $paginator, TablasRepository $tablasRepository): Response
    {
        $query = $tablasRepository->getAllBerrikusi();
        $tablas  = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('limit', 10)/*limit per page*/
        );
        return $this->render('tablas/rebisioa.html.twig', [
            'tablas' => $tablas,
        ]);
    }

    /**
     * @Route("/new", name="tablas_new", methods={"GET","POST"})
     * @param Request $request
     *
     * @return Response
     */
    public function new(Request $request): Response
    {
        $tabla = new Tablas();
        $form  = $this->createForm(TablasType::class, $tabla);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tabla);
            $entityManager->flush();

            $this->addFlash('success', 'Aldaketak ongi gorde dira.');

            return $this->redirectToRoute('tablas_index');
        }

        return $this->render(
            'tablas/new.html.twig',
            [
                'tabla' => $tabla,
                'form'  => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/{id}", name="tablas_show", methods={"GET"})
     * @param Tablas $tabla
     *
     * @return Response
     */
    public function show(Tablas $tabla): Response
    {
        return $this->render(
            'tablas/show.html.twig',
            [
                'tabla' => $tabla,
            ]
        );
    }

    /**
     * @Route("/{id}/apli/{num}", name="tablas_apli", methods={"GET"})
     * @param Tablas $tabla
     *
     * @param     $num
     *
     * @return Response
     */
    public function apli(Tablas $tabla, $num): Response
    {
        return $this->render('tablas/apli.html.twig',
                             [
                                 'tabla' => $tabla,
                                 'num' => $num
                             ]
        );
    }


    /**
     * @Route("/{id}/edit", name="tablas_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Tablas  $tabla
     *
     * @return Response
     */
    public function edit(Request $request, Tablas $tabla): Response
    {
        $form = $this->createForm(TablasType::class, $tabla);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'Aldaketak ongi gorde dira.');

            return $this->redirectToRoute(
                'tablas_index',
                [
                    'id' => $tabla->getId(),
                ]
            );
        }

        return $this->render(
            'tablas/edit.html.twig',
            [
                'tabla' => $tabla,
                'form'  => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/berrikusi/{id}", name="tablas_berrikusi", methods={"GET","POST"})
     * @param Request $request
     * @param Tablas $tablas
     * @return Response
     */
    public function berrikusi(Request $request, Tablas  $tablas): Response
    {
        $form = $this->createForm(BerrikusiTablasType::class, $tablas);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tablas->setBerrikusi(false);
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Aldaketak ongi gorde dira.');
            return $this->redirectToRoute('tablas_rebisioa');
        }

        return $this->render(
            'tablas/berrikusi.html.twig',
            [
                'tablas'  => $tablas,
                'form' => $form->createView(),
            ]
        );
    }


    /**
     * @Route("/{id}", name="tablas_delete", methods={"DELETE"})
     * @param Request $request
     * @param Tablas  $tabla
     *
     * @return Response
     */
    public function delete(Request $request, Tablas $tabla): Response
    {
        if ($this->isCsrfTokenValid('delete' . $tabla->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tabla);
            $entityManager->flush();
        } elseif ($request->isXmlHttpRequest()) {
            $message = 'CSRF token error';
            $resp    = [
                'code' => 500,
                'data' => $message,
            ];

            return new JsonResponse($resp, 500);
        } else {
            return $this->redirectToRoute('tablas_index');
        }

        if ($request->isXmlHttpRequest()) {
            $resp = [
                'code' => 200,
                'data' => 'Ezabatua izan da',
            ];

            return new JsonResponse($resp);
        }

        return $this->redirectToRoute('tablas_index');
    }

    /**
     * @Route("/print/{id}", name="tablas_print", methods={"GET", "POST" })
     * @param Request $request
     *
     * @param Tablas  $tabla
     * @param Pdf     $snappy
     *
     * @return Response
     */
    public function print(Request $request, Tablas $tabla, Pdf $snappy): Response
    {
        $html     = $this->renderView('tablas/pdf.html.twig', ['tabla' => $tabla]);
        $filename = sprintf('tablas-%s.pdf', date('Y-m-d-hh-ss'));

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
