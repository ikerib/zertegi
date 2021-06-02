<?php

namespace App\Controller;

use App\Entity\Amp;
use App\Entity\Protokoloak;
use App\Entity\Salidas;
use App\Form\BerrikusiSalidasType;
use App\Form\SalidasType;
use App\Repository\LogRepository;
use App\Repository\SalidasRepository;
use App\Service\DbHelperService;
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
 * @Route("/admin/salidas")
 */
class SalidasController extends AbstractController
{

    /**
     * @Route("/", name="salidas_index", methods={"GET", "POST"})
     * @param Request                       $request
     * @param PaginatorInterface            $paginator
     * @param SalidasRepository             $salidasRepository
     * @param SessionInterface              $session
     * @param DbHelperService               $dbhelper
     * @param \App\Repository\LogRepository $logRepository
     *
     * @return Response
     */
    public function index(Request $request, PaginatorInterface $paginator,
                          SalidasRepository $salidasRepository, SessionInterface $session,
                          DbHelperService $dbhelper, LogRepository $logRepository): Response
    {
        $fields    = $dbhelper->getAllEntityFields(Salidas::class);
        $myFilters = $dbhelper->getFinderParams($request->query->get('form'));
        $query     = $dbhelper->performSearch('salidas', $myFilters, $fields, $_SERVER['REQUEST_URI']);
        $salidas   = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('limit', 10)/*limit per page*/
        );

        $myselection = $session->get('zertegi-selection');
        if (($myselection !== null) && array_key_exists('salidas', $myselection)) {
            $myselection = $myselection['salidas'];
        }

        $fields = $dbhelper->getAllEntityFields(Salidas::class);
        $logs   = $logRepository->findBy([], ['id' => 'DESC'], 10);

        return $this->render(
            'salidas/index.html.twig',
            [
                'logs'        => $logs,
                'salidas'     => $salidas,
                'myselection' => $myselection,
                'fields'      => $fields,
                'finderdata'  => $request->query->get('form')]
        );
    }

    /**
     * @Route("/rebisioa", name="salidas_rebisioa")
     */
    public function rebisioa(Request $request, PaginatorInterface $paginator, SalidasRepository $salidasRepository): Response
    {
        $query = $salidasRepository->getAllBerrikusi();
        $salidas  = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('limit', 10)/*limit per page*/
        );
        return $this->render('salidas/rebisioa.html.twig', [
            'salidas' => $salidas,
        ]);
    }

    /**
     * @Route("/new", name="salidas_new", methods={"GET","POST"})
     * @param Request $request
     *
     * @return Response
     */
    public function new(Request $request): Response
    {
        $salida = new Salidas();
        $form   = $this->createForm(SalidasType::class, $salida);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($salida);
            $entityManager->flush();

            $this->addFlash('success', 'Datuak ongi grabatu dira.');
            return $this->redirectToRoute('salidas_index');
        }

        return $this->render('salidas/new.html.twig', [
            'salida' => $salida,
            'form'   => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="salidas_show", methods={"GET"})
     * @param Salidas $salida
     *
     * @return Response
     */
    public function show(Salidas $salida): Response
    {
        return $this->render('salidas/show.html.twig', [
            'salida' => $salida,
        ]);
    }

    /**
     * @Route("/{id}/apli/{num}", name="salidas_apli", methods={"GET"})
     * @param Salidas $salida
     *
     * @param     $num
     *
     * @return Response
     */
    public function apli(Salidas $salida, $num): Response
    {
        return $this->render('salidas/apli.html.twig',
                             [
                                 'salida' => $salida,
                                 'num' => $num
                             ]
        );
    }

    /**
     * @Route("/{id}/edit", name="salidas_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Salidas $salida
     *
     * @return Response
     */
    public function edit(Request $request, Salidas $salida): Response
    {
        $form = $this->createForm(SalidasType::class, $salida);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'Datuak ongi grabatu dira.');
            return $this->redirectToRoute('salidas_index', [
                'id' => $salida->getId(),
            ]);
        }

        return $this->render('salidas/edit.html.twig', [
            'salida' => $salida,
            'form'   => $form->createView(),
        ]);
    }

    /**
     * @Route("/berrikusi/{id}", name="salidas_berrikusi", methods={"GET","POST"})
     * @param Request $request
     * @param Salidas $salidas
     * @return Response
     */
    public function berrikusi(Request $request, Salidas  $salidas): Response
    {
        $form = $this->createForm(BerrikusiSalidasType::class, $salidas);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $salidas->setBerrikusi(false);
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Aldaketak ongi gorde dira.');
            return $this->redirectToRoute('salidas_rebisioa');
        }

        return $this->render(
            'salidas/berrikusi.html.twig',
            [
                'salidas'  => $salidas,
                'form' => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/{id}", name="salidas_delete", methods={"DELETE"}, options = { "expose" = true })
     * @param Request $request
     * @param Salidas $salida
     *
     * @return Response
     */
    public function delete(Request $request, Salidas $salida): Response
    {
        if ($this->isCsrfTokenValid('delete' . $salida->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($salida);
            $entityManager->flush();
        } elseif ($request->isXmlHttpRequest()) {
            $message = 'CSRF token error';
            $resp    = [
                'code' => 500,
                'data' => $message
            ];
            return new JsonResponse($resp, 500);
        } else {
            return $this->redirectToRoute('salidas_index');
        }

        if ($request->isXmlHttpRequest()) {
            $resp = [
                'code' => 200,
                'data' => 'Ezabatua izan da'
            ];
            return new JsonResponse($resp);
        }

        return $this->redirectToRoute('salidas_index');
    }

    /**
     * @Route("/print/{id}", name="salidas_print", methods={"GET", "POST" })
     * @param Request $request
     *
     * @param Salidas $salidas
     * @param Pdf     $snappy
     *
     * @return Response
     */
    public function print(Request $request, Salidas $salidas, Pdf $snappy): Response
    {
        $html     = $this->renderView('salidas/pdf.html.twig', ['salidas' => $salidas]);
        $filename = sprintf('salidas-%s.pdf', date('Y-m-d-hh-ss'));

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
