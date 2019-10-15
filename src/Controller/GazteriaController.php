<?php

namespace App\Controller;

use App\Entity\Amp;
use App\Entity\Euskera;
use App\Entity\Gazteria;
use App\Form\GazteriaType;
use App\Repository\GazteriaRepository;
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
 * @Route("/admin/gazteria")
 */
class GazteriaController extends AbstractController
{

    /**
     * @Route("/", name="gazteria_index", methods={"GET"})
     * @param Request            $request
     * @param PaginatorInterface $paginator
     * @param GazteriaRepository $gazteriaRepository
     *
     * @param SessionInterface   $session
     *
     * @param DbHelperService    $dbhelper
     *
     * @return Response
     */
    public function index(Request $request, PaginatorInterface $paginator,
        GazteriaRepository $gazteriaRepository, SessionInterface $session,
        DbHelperService $dbhelper
    ): Response
    {
        $fields = $dbhelper->getAllEntityFields(Gazteria::class);
        $myFilters = $dbhelper->getFinderParams($request->query->get('form'));
        $query = $dbhelper->performSearch('gazteria', $myFilters, $fields);
        $gazterias = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('limit', 10)/*limit per page*/
        );

        $myselection = $session->get('zertegi-selection');
        if ($myselection !== null) {
            if (array_key_exists('gazteria', $myselection))
            {
                $myselection = $myselection[ 'gazteria' ];
            }
        }

        return $this->render(
            'gazteria/index.html.twig',
            [
                'gazterias' => $gazterias,
                'myselection' => $myselection,
                'fields'    => $fields,
                'finderdata'    => $request->query->get('form')            ]
        );
    }

    /**
     * @Route("/new", name="gazteria_new", methods={"GET","POST"})
     * @param Request $request
     *
     * @return Response
     */
    public function new(Request $request): Response
    {
        $gazterium = new Gazteria();
        $form = $this->createForm(GazteriaType::class, $gazterium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($gazterium);
            $entityManager->flush();

            $this->addFlash('success', 'Datuak ongi grabatu dira.');
            return $this->redirectToRoute('gazteria_index');
        }

        return $this->render('gazteria/new.html.twig', [
            'gazterium' => $gazterium,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="gazteria_show", methods={"GET"})
     * @param Gazteria $gazterium
     *
     * @return Response
     */
    public function show(Gazteria $gazterium): Response
    {
        return $this->render('gazteria/show.html.twig', [
            'gazterium' => $gazterium,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="gazteria_edit", methods={"GET","POST"})
     * @param Request  $request
     * @param Gazteria $gazterium
     *
     * @return Response
     */
    public function edit(Request $request, Gazteria $gazterium): Response
    {
        $form = $this->createForm(GazteriaType::class, $gazterium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'Aldaketak ongi gorde dira.');
            return $this->redirectToRoute('gazteria_index', [
                'id' => $gazterium->getId(),
            ]);
        }

        return $this->render('gazteria/edit.html.twig', [
            'gazterium' => $gazterium,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="gazteria_delete", methods={"DELETE"}, options = { "expose" = true })
     * @param Request  $request
     * @param Gazteria $gazterium
     *
     * @return Response
     */
    public function delete(Request $request, Gazteria $gazterium): Response
    {
        if ($this->isCsrfTokenValid('delete'.$gazterium->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($gazterium);
            $entityManager->flush();
        } elseif ( $request->isXmlHttpRequest()) {
            $message = 'CSRF token error';
            $resp = [
                'code' => 500,
                'data' => $message
            ];
            return new JsonResponse($resp,500);
        } else {
            return $this->redirectToRoute('gazteria_index');
        }

        if ( $request->isXmlHttpRequest()) {
            $resp = [
                'code' => 200,
                'data' => 'Ezabatua izan da'
            ];
            return new JsonResponse($resp);
        }

        return $this->redirectToRoute('gazteria_index');
    }

    /**
     * @Route("/print/{id}", name="gazteria_print", methods={"GET", "POST" })
     * @param Request  $request
     *
     * @param Gazteria $gazteria
     * @param Pdf      $snappy
     *
     * @return Response
     */
    public function print(Request $request, Gazteria $gazteria, Pdf $snappy): Response
    {
        $html      = $this->renderView('gazteria/pdf.html.twig', [ 'gazteria' => $gazteria ]);
        $filename  = sprintf('gazteria-%s.pdf', date('Y-m-d-hh-ss'));

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
