<?php

namespace App\Controller;

use App\Entity\Argazki;
use App\Form\ArgazkiType;
use App\Form\BerrikusiAmpType;
use App\Form\BerrikusiArgazkiType;
use App\Repository\ArgazkiRepository;
use App\Repository\LogRepository;
use App\Service\DbHelperService;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\QueryBuilder;
use Knp\Component\Pager\PaginatorInterface;
use Knp\Snappy\Pdf;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/argazki")
 */
class ArgazkiController extends AbstractController
{

    /**
     * @Route("/", name="argazki_index", methods={"GET", "POST"})
     * @param Request                       $request
     * @param ArgazkiRepository             $argazkiRepository
     * @param \App\Repository\LogRepository $logRepository
     * @param PaginatorInterface            $paginator
     * @param SessionInterface              $session
     * @param DbHelperService               $dbhelper
     *
     * @return Response
     */
    public function index(
        Request $request,
        ArgazkiRepository $argazkiRepository,
        LogRepository $logRepository,
        PaginatorInterface $paginator,
        SessionInterface $session,
        DbHelperService $dbhelper
    ): Response
    {
        $fields    = $dbhelper->getAllEntityFields(Argazki::class);
        $myFilters = $dbhelper->getFinderParams($request->query->get('form'));
        $query     = $dbhelper->performSearch('argazki', $myFilters, $fields, $_SERVER['REQUEST_URI']);
        $argazkis  = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('limit', 10)/*limit per page*/
        );

        $myselection = $session->get('zertegi-selection');
        if ($myselection !== null) {
            if (array_key_exists('argazki', $myselection)) {
                $myselection = $myselection['argazki'];
            }
        }

        $logs = $logRepository->findBy([], ['id' => 'DESC'], 10);

        return $this->render(
            'argazki/index.html.twig',
            [
                'logs'        => $logs,
                'argazkis'    => $argazkis,
                'myselection' => $myselection,
                'fields'      => $fields,
                'finderdata'  => $request->query->get('form')]
        );
    }

    /**
     * @Route("/rebisioa", name="argazki_rebisioa")
     */
    public function rebisioa(Request $request, PaginatorInterface $paginator, ArgazkiRepository $argazkiRepository): Response
    {
        $query = $argazkiRepository->getAllBerrikusi();
        $argazkis  = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('limit', 10)/*limit per page*/
        );
        return $this->render('argazki/rebisioa.html.twig', [
            'argazkis' => $argazkis,
        ]);
    }

    /**
     * @Route("/new", name="argazki_new", methods={"GET","POST"})
     * @param Request $request
     *
     * @return Response
     */
    public function new(Request $request): Response
    {
        $argazki = new Argazki();
        $form    = $this->createForm(ArgazkiType::class, $argazki);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($argazki);
            $entityManager->flush();

            $this->addFlash('success', 'Datuak ongi grabatu dira.');

            return $this->redirectToRoute('argazki_index');
        }

        return $this->render(
            'argazki/new.html.twig',
            [
                'argazki' => $argazki,
                'form'    => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/{id}", name="argazki_show", methods={"GET"})
     * @param Argazki $argazki
     *
     * @return Response
     */
    public function show(Argazki $argazki): Response
    {
        return $this->render(
            'argazki/show.html.twig',
            [
                'argazki' => $argazki,
            ]
        );
    }

    /**
     * @Route("/{id}/apli/{num}", name="argazki_apli", methods={"GET"})
     * @param Argazki $argazki
     *
     * @param     $num
     *
     * @return Response
     */
    public function apli(Argazki $argazki, $num): Response
    {
        return $this->render(
            'argazki/apli.html.twig',
            [
                'argazki' => $argazki,
                'num' => $num
            ]
        );
    }

    /**
     * @Route("/{id}/edit", name="argazki_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Argazki $argazki
     *
     * @return Response
     */
    public function edit(Request $request, Argazki $argazki): Response
    {
        $form = $this->createForm(ArgazkiType::class, $argazki);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'Aldaketak ongi gorde dira.');

            return $this->redirectToRoute(
                'argazki_index',
                [
                    'id' => $argazki->getId(),
                ]
            );
        }

        return $this->render(
            'argazki/edit.html.twig',
            [
                'argazki' => $argazki,
                'form'    => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/berrikusi/{id}", name="argazki_berrikusi", methods={"GET","POST"})
     * @param Request $request
     * @param Argazki $argazki
     *
     * @return Response
     */
    public function berrikusi(Request $request, Argazki $argazki): Response
    {
        $form = $this->createForm(BerrikusiArgazkiType::class, $argazki);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $argazki->setBerrikusi(false);
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Aldaketak ongi gorde dira.');
            return $this->redirectToRoute('argazki_rebisioa');
        }

        return $this->render(
            'argazki/berrikusi.html.twig',
            [
                'argazki'  => $argazki,
                'form' => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/{id}", name="argazki_delete", methods={"DELETE"}, options = { "expose" = true })
     * @param Request $request
     * @param Argazki $argazki
     *
     * @return Response
     */
    public function delete(Request $request, Argazki $argazki): Response
    {
        if ($this->isCsrfTokenValid('delete' . $argazki->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($argazki);
            $entityManager->flush();

        } elseif ($request->isXmlHttpRequest()) {
            $message = 'CSRF token error';
            $resp    = [
                'code' => 500,
                'data' => $message,
            ];

            return new JsonResponse($resp, 500);
        } else {
            return $this->redirectToRoute('argazki_index');
        }

        if ($request->isXmlHttpRequest()) {
            $resp = [
                'code' => 200,
                'data' => 'Ezabatua izan da',
            ];

            return new JsonResponse($resp);
        }

        return $this->redirectToRoute('argazki_index');
    }

    /**
     * @Route("/print/{id}", name="argazki_print", methods={"GET", "POST" })
     * @param Request $request
     *
     * @param Argazki $argazki
     * @param Pdf     $snappy
     *
     * @return Response
     */
    public function print(Request $request, Argazki $argazki, Pdf $snappy): Response
    {
        $html     = $this->renderView('argazki/pdf.html.twig', ['argazki' => $argazki]);
        $filename = sprintf('argazki-%s.pdf', date('Y-m-d-hh-ss'));

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
