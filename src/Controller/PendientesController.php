<?php

namespace App\Controller;

use App\Entity\Amp;
use App\Entity\Pendientes;
use App\Form\PendientesType;
use App\Repository\PendientesRepository;
use App\Service\DbHelperService;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\QueryBuilder;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/pendientes")
 */
class PendientesController extends AbstractController
{

    /**
     * @Route("/", name="pendientes_index", methods={"GET", "POST"})
     * @param Request              $request
     * @param PaginatorInterface   $paginator
     * @param PendientesRepository $pendientesRepository
     *
     * @param SessionInterface     $session
     * @param DbHelperService      $dbhelper
     *
     * @return Response
     */
    public function index(Request $request, PaginatorInterface $paginator,
        PendientesRepository $pendientesRepository, SessionInterface $session,
        DbHelperService $dbhelper): Response
    {
        $myFilters=$dbhelper->getFinderParams($request->request->get('form'));
        $query = $pendientesRepository->getQueryByFinder($myFilters);
        $pendientes = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('limit', 10)/*limit per page*/
        );

        $myselection = $session->get('zertegi-selection');
        if ($myselection !== null) {
            if (array_key_exists('pendiente', $myselection))
            {
                $myselection = $myselection[ 'pendiente' ];
            }
        }

        $fields = $dbhelper->getAllEntityFields(Pendientes::class);

        return $this->render(
            'pendientes/index.html.twig',
            [
                'pendientes' => $pendientes,
                'myselection' => $myselection,
                'fields'    => $fields
            ]
        );
    }

    /**
     * @Route("/new", name="pendientes_new", methods={"GET","POST"})
     * @param Request $request
     *
     * @return Response
     */
    public function new(Request $request): Response
    {
        $pendiente = new Pendientes();
        $form = $this->createForm(PendientesType::class, $pendiente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($pendiente);
            $entityManager->flush();

            $this->addFlash('success', 'Aldaketak ongi gorde dira.');
            return $this->redirectToRoute('pendientes_index');
        }

        return $this->render('pendientes/new.html.twig', [
            'pendiente' => $pendiente,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pendientes_show", methods={"GET"})
     * @param Pendientes $pendiente
     *
     * @return Response
     */
    public function show(Pendientes $pendiente): Response
    {
        return $this->render('pendientes/show.html.twig', [
            'pendiente' => $pendiente,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="pendientes_edit", methods={"GET","POST"})
     * @param Request    $request
     * @param Pendientes $pendiente
     *
     * @return Response
     */
    public function edit(Request $request, Pendientes $pendiente): Response
    {
        $form = $this->createForm(PendientesType::class, $pendiente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'Aldaketak ongi gorde dira.');
            return $this->redirectToRoute('pendientes_index', [
                'id' => $pendiente->getId(),
            ]);
        }

        return $this->render('pendientes/edit.html.twig', [
            'pendiente' => $pendiente,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pendientes_delete", methods={"DELETE"}, options = { "expose" = true })
     * @param Request    $request
     * @param Pendientes $pendiente
     *
     * @return Response
     */
    public function delete(Request $request, Pendientes $pendiente): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pendiente->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($pendiente);
            $entityManager->flush();
        } elseif ( $request->isXmlHttpRequest()) {
            $message = 'CSRF token error';
            $resp = [
                'code' => 500,
                'data' => $message
            ];
            return new JsonResponse($resp,500);
        } else {
            return $this->redirectToRoute('pendientes_index');
        }

        if ( $request->isXmlHttpRequest()) {
            $resp = [
                'code' => 200,
                'data' => 'Ezabatua izan da'
            ];
            return new JsonResponse($resp);
        }

        return $this->redirectToRoute('pendientes_index');
    }
}
