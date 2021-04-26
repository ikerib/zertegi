<?php

namespace App\Controller;

use App\Entity\Amp;
use App\Entity\Entradas;
use App\Form\EntradasType;
use App\Repository\EntradasRepository;
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
 * @Route("/admin/entradas")
 */
class EntradasController extends AbstractController
{

    /**
     * @Route("/", name="entradas_index", methods={"GET"})
     * @param Request                       $request
     * @param PaginatorInterface            $paginator
     * @param EntradasRepository            $entradasRepository
     * @param LogRepository $logRepository
     * @param SessionInterface              $session
     * @param DbHelperService               $dbhelper
     *
     * @return Response
     */
    public function index(
        Request $request,
        PaginatorInterface $paginator,
        EntradasRepository $entradasRepository,
        LogRepository $logRepository,
        SessionInterface $session,
        DbHelperService $dbhelper
    ): Response
    {
        $fields    = $dbhelper->getAllEntityFields(Entradas::class);
        $myFilters = $dbhelper->getFinderParams($request->query->get('form'));
        $query     = $dbhelper->performSearch('entradas', $myFilters, $fields, $_SERVER['REQUEST_URI']);

        $entradas = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('limit', 10)/*limit per page*/
        );

        $myselection = $session->get('zertegi-selection');
        if ($myselection !== null) {
            if (array_key_exists('entradas', $myselection)) {
                $myselection = $myselection['entradas'];
            }
        }
        $logs = $logRepository->findBy([], ['id' => 'DESC'], 10);

        return $this->render(
            'entradas/index.html.twig',
            [
                'logs'        => $logs,
                'entradas'    => $entradas,
                'myselection' => $myselection,
                'fields'      => $fields,
                'finderdata'  => $request->query->get('form')]
        );
    }

    /**
     * @Route("/new", name="entradas_new", methods={"GET","POST"})
     * @param Request $request
     *
     * @return Response
     */
    public function new(Request $request): Response
    {
        $entrada = new Entradas();
        $form    = $this->createForm(EntradasType::class, $entrada);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($entrada);
            $entityManager->flush();

            $this->addFlash('success', 'Datuak ongi grabatu dira.');

            return $this->redirectToRoute('entradas_index');
        }

        return $this->render(
            'entradas/new.html.twig',
            [
                'entrada' => $entrada,
                'form'    => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/{id}", name="entradas_show", methods={"GET"})
     * @param Entradas $entrada
     *
     * @return Response
     */
    public function show(Entradas $entrada): Response
    {
        return $this->render(
            'entradas/show.html.twig',
            [
                'entrada' => $entrada,
            ]
        );
    }

    /**
     * @Route("/{id}/apli/{num}", name="entradas_apli", methods={"GET"})
     * @param Entradas $entradas
     *
     * @param     $num
     *
     * @return Response
     */
    public function apli(Entradas $entradas, $num): Response
    {
        return $this->render('entradas/apli.html.twig',
                             [
                                 'entradas' => $entradas,
                                 'num' => $num
                             ]
        );
    }

    /**
     * @Route("/{id}/edit", name="entradas_edit", methods={"GET","POST"})
     * @param Request  $request
     * @param Entradas $entrada
     *
     * @return Response
     */
    public function edit(Request $request, Entradas $entrada): Response
    {
        $form = $this->createForm(EntradasType::class, $entrada);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'Datuak ongi grabatu dira.');

            return $this->redirectToRoute(
                'entradas_index',
                [
                    'id' => $entrada->getId(),
                ]
            );
        }

        return $this->render(
            'entradas/edit.html.twig',
            [
                'entrada' => $entrada,
                'form'    => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/{id}", name="entradas_delete", methods={"DELETE"}, options = { "expose" = true })
     * @param Request  $request
     * @param Entradas $entrada
     *
     * @return Response
     */
    public function delete(Request $request, Entradas $entrada): Response
    {
        if ($this->isCsrfTokenValid('delete' . $entrada->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($entrada);
            $entityManager->flush();
        } elseif ($request->isXmlHttpRequest()) {
            $message = 'CSRF token error';
            $resp    = [
                'code' => 500,
                'data' => $message,
            ];

            return new JsonResponse($resp, 500);
        } else {
            return $this->redirectToRoute('entradas_index');
        }

        if ($request->isXmlHttpRequest()) {
            $resp = [
                'code' => 200,
                'data' => 'Ezabatua izan da',
            ];

            return new JsonResponse($resp);
        }

        return $this->redirectToRoute('entradas_index');
    }

    /**
     * @Route("/print/{id}", name="entradas_print", methods={"GET", "POST" })
     * @param Request  $request
     *
     * @param Entradas $entrada
     * @param Pdf      $snappy
     *
     * @return Response
     */
    public function print(Request $request, Entradas $entrada, Pdf $snappy): Response
    {
        $html     = $this->renderView('entradas/pdf.html.twig', ['entrada' => $entrada]);
        $filename = sprintf('entrada-%s.pdf', date('Y-m-d-hh-ss'));

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
