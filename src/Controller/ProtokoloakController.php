<?php

namespace App\Controller;

use App\Entity\Amp;
use App\Entity\Liburuxka;
use App\Entity\Protokoloak;
use App\Form\BerrikusiProtokoloakType;
use App\Form\ProtokoloakType;
use App\Repository\LogRepository;
use App\Repository\ProtokoloakRepository;
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
 * @Route("/admin/protokoloak")
 */
class ProtokoloakController extends AbstractController
{

    /**
     * @Route("/", name="protokoloak_index", methods={"GET", "POST"})
     * @param Request                       $request
     * @param PaginatorInterface            $paginator
     * @param ProtokoloakRepository         $protokoloakRepository
     * @param SessionInterface              $session
     * @param DbHelperService               $dbhelper
     * @param \App\Repository\LogRepository $logRepository
     *
     * @return Response
     */
    public function index(Request $request, PaginatorInterface $paginator,
                          ProtokoloakRepository $protokoloakRepository, SessionInterface $session,
                          DbHelperService $dbhelper, LogRepository $logRepository): Response
    {

        $fields       = $dbhelper->getAllEntityFields(Protokoloak::class);
        $myFilters    = $dbhelper->getFinderParams($request->query->get('form'));
        $query        = $dbhelper->performSearch('protokoloak', $myFilters, $fields, $_SERVER['REQUEST_URI']);
        $protokoloaks = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('limit', 10)/*limit per page*/
        );

        $myselection = $session->get('zertegi-selection');
        if ($myselection !== null) {
            if (array_key_exists('protokoloak', $myselection)) {
                $myselection = $myselection['protokoloak'];
            }
        }

        $fields = $dbhelper->getAllEntityFields(Protokoloak::class);
        $logs   = $logRepository->findBy([], ['id' => 'DESC'], 10);

        return $this->render(
            'protokoloak/index.html.twig',
            [
                'logs'         => $logs,
                'protokoloaks' => $protokoloaks,
                'myselection'  => $myselection,
                'fields'       => $fields,
                'finderdata'   => $request->query->get('form')]
        );
    }

    /**
     * @Route("/rebisioa", name="protokoloak_rebisioa")
     */
    public function rebisioa(Request $request, PaginatorInterface $paginator, ProtokoloakRepository $protokoloakRepository): Response
    {
        $query = $protokoloakRepository->getAllBerrikusi();
        $protokoloak  = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('limit', 10)/*limit per page*/
        );
        return $this->render('protokoloak/rebisioa.html.twig', [
            'protokoloak' => $protokoloak,
        ]);
    }

    /**
     * @Route("/new", name="protokoloak_new", methods={"GET","POST"})
     * @param Request $request
     *
     * @return Response
     */
    public function new(Request $request): Response
    {
        $protokoloak = new Protokoloak();
        $form        = $this->createForm(ProtokoloakType::class, $protokoloak);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($protokoloak);
            $entityManager->flush();

            $this->addFlash('success', 'Datuak ongi grabatu dira.');
            return $this->redirectToRoute('protokoloak_index');
        }

        return $this->render('protokoloak/new.html.twig', [
            'protokoloak' => $protokoloak,
            'form'        => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="protokoloak_show", methods={"GET"})
     * @param Protokoloak $protokoloak
     *
     * @return Response
     */
    public function show(Protokoloak $protokoloak): Response
    {
        return $this->render('protokoloak/show.html.twig', [
            'protokoloak' => $protokoloak,
        ]);
    }

    /**
     * @Route("/{id}/apli/{num}", name="protokoloak_apli", methods={"GET"})
     * @param Protokoloak $protokoloak
     *
     * @param     $num
     *
     * @return Response
     */
    public function apli(Protokoloak $protokoloak, $num): Response
    {
        return $this->render('protokoloak/apli.html.twig',
                             [
                                 'protokoloak' => $protokoloak,
                                 'num' => $num
                             ]
        );
    }

    /**
     * @Route("/{id}/edit", name="protokoloak_edit", methods={"GET","POST"})
     * @param Request     $request
     * @param Protokoloak $protokoloak
     *
     * @return Response
     */
    public function edit(Request $request, Protokoloak $protokoloak): Response
    {
        $form = $this->createForm(ProtokoloakType::class, $protokoloak);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'Datuak ongi grabatu dira.');
            return $this->redirectToRoute('protokoloak_index', [
                'id' => $protokoloak->getId(),
            ]);
        }

        return $this->render('protokoloak/edit.html.twig', [
            'protokoloak' => $protokoloak,
            'form'        => $form->createView(),
        ]);
    }

    /**
     * @Route("/berrikusi/{id}", name="protokoloak_berrikusi", methods={"GET","POST"})
     * @param Request $request
     * @param Protokoloak $protokoloak
     * @return Response
     */
    public function berrikusi(Request $request, Protokoloak  $protokoloak): Response
    {
        $form = $this->createForm(BerrikusiProtokoloakType::class, $protokoloak);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $protokoloak->setBerrikusi(false);
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Aldaketak ongi gorde dira.');
            return $this->redirectToRoute('protokoloak_rebisioa');
        }

        return $this->render(
            'protokoloak/berrikusi.html.twig',
            [
                'protokoloak'  => $protokoloak,
                'form' => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/{id}", name="protokoloak_delete", methods={"DELETE"})
     * @param Request     $request
     * @param Protokoloak $protokoloak
     *
     * @return Response
     */
    public function delete(Request $request, Protokoloak $protokoloak): Response
    {
        if ($this->isCsrfTokenValid('delete' . $protokoloak->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($protokoloak);
            $entityManager->flush();
        } elseif ($request->isXmlHttpRequest()) {
            $message = 'CSRF token error';
            $resp    = [
                'code' => 500,
                'data' => $message
            ];
            return new JsonResponse($resp, 500);
        } else {
            return $this->redirectToRoute('protokoloak_index');
        }

        if ($request->isXmlHttpRequest()) {
            $resp = [
                'code' => 200,
                'data' => 'Ezabatua izan da'
            ];
            return new JsonResponse($resp);
        }

        return $this->redirectToRoute('protokoloak_index');
    }

    /**
     * @Route("/print/{id}", name="protokoloak_print", methods={"GET", "POST" })
     * @param Request     $request
     *
     * @param Protokoloak $protokoloak
     * @param Pdf         $snappy
     *
     * @return Response
     */
    public function print(Request $request, Protokoloak $protokoloak, Pdf $snappy): Response
    {
        $html     = $this->renderView('protokoloak/pdf.html.twig', ['protokoloak' => $protokoloak]);
        $filename = sprintf('protokoloak-%s.pdf', date('Y-m-d-hh-ss'));

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
