<?php

namespace App\Controller;

use App\Entity\Amp;
use App\Entity\Entradas;
use App\Entity\Euskera;
use App\Form\EuskeraType;
use App\Repository\EuskeraRepository;
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
 * @Route("/admin/euskera")
 */
class EuskeraController extends AbstractController
{

    /**
     * @Route("/", name="euskera_index", methods={"GET"})
     * @param Request            $request
     * @param PaginatorInterface $paginator
     * @param EuskeraRepository  $euskeraRepository
     *
     * @param SessionInterface   $session
     *
     * @param DbHelperService    $dbhelper
     *
     * @return Response
     */
    public function index(Request $request, PaginatorInterface $paginator,
        EuskeraRepository $euskeraRepository, SessionInterface $session,
        DbHelperService $dbhelper): Response
    {
        $myFilters = $dbhelper->getFinderParams($request->request->get('form'));
        $query     = $euskeraRepository->getQueryByFinder($myFilters);
        $euskeras = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('limit', 10)/*limit per page*/
        );

        $myselection = $session->get('zertegi-selection');
        if ($myselection !== null) {
            if (array_key_exists('euskera', $myselection))
            {
                $myselection = $myselection[ 'euskera' ];
            }
        }

        $fields = $dbhelper->getAllEntityFields(Euskera::class);

        return $this->render(
            'euskera/index.html.twig',
            [
                'euskeras' => $euskeras,
                'myselection' => $myselection,
                'fields'    => $fields,
                'finderdata'    => $request->query->get('form')
            ]
        );
    }

    /**
     * @Route("/new", name="euskera_new", methods={"GET","POST"})
     * @param Request $request
     *
     * @return Response
     */
    public function new(Request $request): Response
    {
        $euskera = new Euskera();
        $form = $this->createForm(EuskeraType::class, $euskera);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($euskera);
            $entityManager->flush();

            $this->addFlash('success', 'Datuak ongi grabatu dira.');
            return $this->redirectToRoute('euskera_index');
        }

        return $this->render('euskera/new.html.twig', [
            'euskera' => $euskera,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="euskera_show", methods={"GET"})
     * @param Euskera $euskera
     *
     * @return Response
     */
    public function show(Euskera $euskera): Response
    {
        return $this->render('euskera/show.html.twig', [
            'euskera' => $euskera,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="euskera_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Euskera $euskera
     *
     * @return Response
     */
    public function edit(Request $request, Euskera $euskera): Response
    {
        $form = $this->createForm(EuskeraType::class, $euskera);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'Datuak ongi grabatu dira.');
            return $this->redirectToRoute('euskera_index', [
                'id' => $euskera->getId(),
            ]);
        }

        return $this->render('euskera/edit.html.twig', [
            'euskera' => $euskera,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="euskera_delete", methods={"DELETE"}, options = { "expose" = true })
     * @param Request $request
     * @param Euskera $euskera
     *
     * @return Response
     */
    public function delete(Request $request, Euskera $euskera): Response
    {
        if ($this->isCsrfTokenValid('delete'.$euskera->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($euskera);
            $entityManager->flush();
        } elseif ( $request->isXmlHttpRequest()) {
            $message = 'CSRF token error';
            $resp = [
                'code' => 500,
                'data' => $message
            ];
            return new JsonResponse($resp,500);
        } else {
            return $this->redirectToRoute('euskera_index');
        }

        if ( $request->isXmlHttpRequest()) {
            $resp = [
                'code' => 200,
                'data' => 'Ezabatua izan da'
            ];
            return new JsonResponse($resp);
        }

        return $this->redirectToRoute('euskera_index');
    }

    /**
     * @Route("/print/{id}", name="euskera_print", methods={"GET", "POST" })
     * @param Request $request
     *
     * @param Euskera $euskera
     * @param Pdf     $snappy
     *
     * @return Response
     */
    public function print(Request $request, Euskera $euskera, Pdf $snappy): Response
    {
        $html      = $this->renderView('euskera/pdf.html.twig', [ 'euskera' => $euskera ]);
        $filename  = sprintf('euskera-%s.pdf', date('Y-m-d-hh-ss'));

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
