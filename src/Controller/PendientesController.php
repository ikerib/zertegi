<?php

namespace App\Controller;

use App\Entity\Pendientes;
use App\Form\PendientesType;
use App\Repository\PendientesRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\QueryBuilder;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/pendientes")
 */
class PendientesController extends AbstractController
{

    /**
     * @Route("/", name="pendientes_index", methods={"GET"})
     * @param Request              $request
     * @param PaginatorInterface   $paginator
     * @param PendientesRepository $pendientesRepository
     *
     * @return Response
     */
    public function index(Request $request, PaginatorInterface $paginator, PendientesRepository $pendientesRepository): Response
    {
        /** @var QueryBuilder $queryBuilder */
        $queryBuilder = $pendientesRepository->createQueryBuilder('a');

        $filter = $request->query->get('filter');
        if ($filter) {
            $queryBuilder->where('MATCH_AGAINST(a.data, a.espedientea, a.signatura) AGAINST(:searchterm boolean)>0')
                         ->setParameter('searchterm', $filter);
        }

        $query = $queryBuilder->getQuery();

        $pendientes = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('limit', 10)/*limit per page*/
        );



        return $this->render(
            'pendientes/index.html.twig',
            [
                'pendientes' => $pendientes,
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
