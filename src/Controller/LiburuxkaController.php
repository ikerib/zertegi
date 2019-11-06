<?php

namespace App\Controller;

use App\Entity\Amp;
use App\Entity\Hutsak;
use App\Entity\Liburuxka;
use App\Form\LiburuxkaType;
use App\Repository\LiburuxkaRepository;
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
 * @Route("/admin/liburuxka")
 */
class LiburuxkaController extends AbstractController
{

    /**
     * @Route("/", name="liburuxka_index", methods={"GET", "POST"})
     * @param Request                       $request
     * @param PaginatorInterface            $paginator
     * @param LiburuxkaRepository           $liburuxkaRepository
     * @param \App\Repository\LogRepository $logRepository
     * @param SessionInterface              $session
     * @param DbHelperService               $dbhelper
     *
     * @return Response
     */
    public function index(
        Request $request,
        PaginatorInterface $paginator,
        LiburuxkaRepository $liburuxkaRepository,
        LogRepository $logRepository,
        SessionInterface $session,
        DbHelperService $dbhelper
    ): Response
    {

        $fields     = $dbhelper->getAllEntityFields(Liburuxka::class);
        $myFilters  = $dbhelper->getFinderParams($request->query->get('form'));
        $query      = $dbhelper->performSearch('liburuxka', $myFilters, $fields, $_SERVER['REQUEST_URI']);
        $liburuxkas = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('limit', 10)/*limit per page*/
        );

        $myselection = $session->get('zertegi-selection');
        if ($myselection !== null) {
            if (array_key_exists('liburuxka', $myselection)) {
                $myselection = $myselection['liburuxka'];
            }
        }

        $fields = $dbhelper->getAllEntityFields(Liburuxka::class);
        $logs   = $logRepository->findBy([], ['id' => 'DESC'], 10);

        return $this->render(
            'liburuxka/index.html.twig',
            [
                'logs'        => $logs,
                'liburuxkas'  => $liburuxkas,
                'myselection' => $myselection,
                'fields'      => $fields,
                'finderdata'  => $request->query->get('form')]
        );

    }

    /**
     * @Route("/new", name="liburuxka_new", methods={"GET","POST"})
     * @param Request $request
     *
     * @return Response
     */
    public function new(Request $request): Response
    {
        $liburuxka = new Liburuxka();
        $form      = $this->createForm(LiburuxkaType::class, $liburuxka);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($liburuxka);
            $entityManager->flush();

            $this->addFlash('success', 'Datuak ongi grabatu dira.');

            return $this->redirectToRoute('liburuxka_index');
        }

        return $this->render(
            'liburuxka/new.html.twig',
            [
                'liburuxka' => $liburuxka,
                'form'      => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/{id}", name="liburuxka_show", methods={"GET"})
     * @param Liburuxka $liburuxka
     *
     * @return Response
     */
    public function show(Liburuxka $liburuxka): Response
    {
        return $this->render(
            'liburuxka/show.html.twig',
            [
                'liburuxka' => $liburuxka,
            ]
        );
    }

    /**
     * @Route("/{id}/apli/{num}", name="liburuxka_apli", methods={"GET"})
     * @param Liburuxka $liburuxka
     *
     * @param     $num
     *
     * @return Response
     */
    public function apli(Liburuxka $liburuxka, $num): Response
    {
        return $this->render('liburuxka/apli.html.twig',
                             [
                                 'liburuxka' => $liburuxka,
                                 'num' => $num
                             ]
        );
    }

    /**
     * @Route("/{id}/edit", name="liburuxka_edit", methods={"GET","POST"})
     * @param Request   $request
     * @param Liburuxka $liburuxka
     *
     * @return Response
     */
    public function edit(Request $request, Liburuxka $liburuxka): Response
    {
        $form = $this->createForm(LiburuxkaType::class, $liburuxka);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'Datuak ongi grabatu dira.');

            return $this->redirectToRoute(
                'liburuxka_index',
                [
                    'id' => $liburuxka->getId(),
                ]
            );
        }

        return $this->render(
            'liburuxka/edit.html.twig',
            [
                'liburuxka' => $liburuxka,
                'form'      => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/{id}", name="liburuxka_delete", methods={"DELETE"}, options = { "expose" = true })
     * @param Request   $request
     * @param Liburuxka $liburuxka
     *
     * @return Response
     */
    public function delete(Request $request, Liburuxka $liburuxka): Response
    {
        if ($this->isCsrfTokenValid('delete' . $liburuxka->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($liburuxka);
            $entityManager->flush();
        } elseif ($request->isXmlHttpRequest()) {
            $message = 'CSRF token error';
            $resp    = [
                'code' => 500,
                'data' => $message,
            ];

            return new JsonResponse($resp, 500);
        } else {
            return $this->redirectToRoute('liburuxka_index');
        }

        if ($request->isXmlHttpRequest()) {
            $resp = [
                'code' => 200,
                'data' => 'Ezabatua izan da',
            ];

            return new JsonResponse($resp);
        }

        return $this->redirectToRoute('liburuxka_index');
    }

    /**
     * @Route("/print/{id}", name="liburuxka_print", methods={"GET", "POST" })
     * @param Request   $request
     *
     * @param Liburuxka $liburuxka
     * @param Pdf       $snappy
     *
     * @return Response
     */
    public function print(Request $request, Liburuxka $liburuxka, Pdf $snappy): Response
    {
        $html     = $this->renderView('liburuxka/pdf.html.twig', ['liburuxka' => $liburuxka]);
        $filename = sprintf('liburuxka-%s.pdf', date('Y-m-d-hh-ss'));

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
