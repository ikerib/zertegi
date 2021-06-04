<?php

namespace App\Controller;

use App\Entity\Amp;
use App\Entity\Consultas;
use App\Form\BerrikusiConsultasType;
use App\Form\ConsultasType;
use App\Repository\ConsultasRepository;
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
 * @Route("/admin/consultas")
 */
class ConsultasController extends AbstractController
{

    /**
     * @Route("/", name="consultas_index", methods={"GET", "POST"})
     * @param Request                       $request
     * @param PaginatorInterface            $paginator
     * @param ConsultasRepository           $consultasRepository
     * @param LogRepository $logRepository
     * @param SessionInterface              $session
     * @param DbHelperService               $dbhelper
     *
     * @return Response
     */
    public function index(
        Request $request,
        PaginatorInterface $paginator,
        ConsultasRepository $consultasRepository,
        LogRepository $logRepository,
        SessionInterface $session,
        DbHelperService $dbhelper
    ): Response
    {
        $fields    = $dbhelper->getAllEntityFields(Consultas::class);
        $myFilters = $dbhelper->getFinderParams($request->query->get('form'));
        $query     = $dbhelper->performSearch('consultas', $myFilters, $fields, $_SERVER['REQUEST_URI']);
        $consultas = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('limit', 10)/*limit per page*/
        );

        $myselection = $session->get('zertegi-selection');
        if ($myselection !== null) {
            if (array_key_exists('consultas', $myselection)) {
                $myselection = $myselection['consultas'];
            }
        }
        $logs = $logRepository->findBy([], ['id' => 'DESC'], 10);

        return $this->render(
            'consultas/index.html.twig',
            [
                'logs'        => $logs,
                'consultas'   => $consultas,
                'myselection' => $myselection,
                'fields'      => $fields,
                'finderdata'  => $request->query->get('form')]
        );
    }

    /**
     * @Route("/rebisioa", name="consultas_rebisioa")
     */
    public function rebisioa(Request $request, PaginatorInterface $paginator, ConsultasRepository $consultasRepository): Response
    {
        $query = $consultasRepository->getAllBerrikusi();
        $consultas  = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('limit', 10)/*limit per page*/
        );
        return $this->render('consultas/rebisioa.html.twig', [
            'consultas' => $consultas,
        ]);
    }

    /**
     * @Route("/new", name="consultas_new", methods={"GET","POST"})
     * @param Request $request
     *
     * @return Response
     */
    public function new(Request $request): Response
    {
        $consulta = new Consultas();
        $form     = $this->createForm(ConsultasType::class, $consulta);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($consulta);
            $entityManager->flush();

            $this->addFlash('success', 'Datuak ongi grabatu dira.');

            return $this->redirectToRoute('consultas_index');
        }

        return $this->render(
            'consultas/new.html.twig',
            [
                'consulta' => $consulta,
                'form'     => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/{id}", name="consultas_show", methods={"GET"})
     * @param Consultas $consulta
     *
     * @return Response
     */
    public function show(Consultas $consulta): Response
    {
        return $this->render(
            'consultas/show.html.twig',
            [
                'consulta' => $consulta,
            ]
        );
    }

    /**
     * @Route("/{id}/apli/{num}", name="consultas_apli", methods={"GET"})
     * @param Consultas $consulta
     *
     * @param     $num
     *
     * @return Response
     */
    public function apli(Consultas $consulta, $num): Response
    {
        return $this->render('consultas/apli.html.twig',
            [
                'consulta' => $consulta,
                'num' => $num
            ]
        );
    }

    /**
     * @Route("/{id}/edit", name="consultas_edit", methods={"GET","POST"})
     * @param Request   $request
     * @param Consultas $consulta
     *
     * @return Response
     */
    public function edit(Request $request, Consultas $consulta): Response
    {
        $form = $this->createForm(ConsultasType::class, $consulta);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'Aldaketak ongi gorde dira.');

            return $this->redirectToRoute(
                'consultas_index',
                [
                    'id' => $consulta->getId(),
                ]
            );
        }

        return $this->render(
            'consultas/edit.html.twig',
            [
                'consulta' => $consulta,
                'form'     => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/berrikusi/{id}", name="consultas_berrikusi", methods={"GET","POST"})
     * @param Request $request
     * @param Consultas $consultas
     * @return Response
     */
    public function berrikusi(Request $request, Consultas $consultas): Response
    {
        $form = $this->createForm(BerrikusiConsultasType::class, $consultas);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $consultas->setBerrikusi(false);
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Aldaketak ongi gorde dira.');
            return $this->redirectToRoute('consultas_rebisioa');
        }

        return $this->render(
            'consultas/berrikusi.html.twig',
            [
                'consulta'  => $consultas,
                'form' => $form->createView(),
            ]
        );
    }


    /**
     * @Route("/{id}", name="consultas_delete", methods={"DELETE"}, options = { "expose" = true })
     * @param Request   $request
     * @param Consultas $consulta
     *
     * @return Response
     */
    public function delete(Request $request, Consultas $consulta): Response
    {
        if ($this->isCsrfTokenValid('delete' . $consulta->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($consulta);
            $entityManager->flush();
        } elseif ($request->isXmlHttpRequest()) {
            $message = 'CSRF token error';
            $resp    = [
                'code' => 500,
                'data' => $message,
            ];

            return new JsonResponse($resp, 500);
        } else {
            return $this->redirectToRoute('consultas_index');
        }

        if ($request->isXmlHttpRequest()) {
            $resp = [
                'code' => 200,
                'data' => 'Ezabatua izan da',
            ];

            return new JsonResponse($resp);
        }

        return $this->redirectToRoute('consultas_index');
    }

    /**
     * @Route("/print/{id}", name="consultas_print", methods={"GET", "POST" })
     * @param Request   $request
     *
     * @param Consultas $consulta
     * @param Pdf       $snappy
     *
     * @return Response
     */
    public function print(Request $request, Consultas $consulta, Pdf $snappy): Response
    {
        $html     = $this->renderView('consultas/pdf.html.twig', ['consulta' => $consulta]);
        $filename = sprintf('consulta-%s.pdf', date('Y-m-d-hh-ss'));

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
