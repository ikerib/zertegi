<?php

namespace App\Controller;

use App\Entity\Kultura;
use App\Form\KulturaType;
use App\Repository\KulturaRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\QueryBuilder;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/kultura")
 */
class KulturaController extends AbstractController
{

    /**
     * @Route("/", name="kultura_index", methods={"GET"})
     * @param Request            $request
     * @param PaginatorInterface $paginator
     * @param KulturaRepository  $kulturaRepository
     *
     * @return Response
     */
    public function index(Request $request, PaginatorInterface $paginator, KulturaRepository $kulturaRepository): Response
    {
        /** @var QueryBuilder $queryBuilder */
        $queryBuilder = $kulturaRepository->createQueryBuilder('a');

        $filter = $request->query->get('filter');
        if ($filter) {
            $queryBuilder->where('MATCH_AGAINST(a.data, a.espedientea, a.oharrak, a.sailkapena, a.signatura) AGAINST(:searchterm boolean)>0')
                         ->setParameter('searchterm', $filter);
        }

        $query = $queryBuilder->getQuery();

        $kulturas = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('limit', 10)/*limit per page*/
        );



        return $this->render(
            'kultura/index.html.twig',
            [
                'kulturas' => $kulturas,
            ]
        );
    }

    /**
     * @Route("/new", name="kultura_new", methods={"GET","POST"})
     * @param Request $request
     *
     * @return Response
     */
    public function new(Request $request): Response
    {
        $kultura = new Kultura();
        $form = $this->createForm(KulturaType::class, $kultura);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($kultura);
            $entityManager->flush();

            $this->addFlash('success', 'Datuak ongi grabatu dira.');
            return $this->redirectToRoute('kultura_index');
        }

        return $this->render('kultura/new.html.twig', [
            'kultura' => $kultura,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="kultura_show", methods={"GET"})
     * @param Kultura $kultura
     *
     * @return Response
     */
    public function show(Kultura $kultura): Response
    {
        return $this->render('kultura/show.html.twig', [
            'kultura' => $kultura,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="kultura_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Kultura $kultura
     *
     * @return Response
     */
    public function edit(Request $request, Kultura $kultura): Response
    {
        $form = $this->createForm(KulturaType::class, $kultura);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'Datuak ongi grabatu dira.');
            return $this->redirectToRoute('kultura_index', [
                'id' => $kultura->getId(),
            ]);
        }

        return $this->render('kultura/edit.html.twig', [
            'kultura' => $kultura,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="kultura_delete", methods={"DELETE"}, options = { "expose" = true })
     * @param Request $request
     * @param Kultura $kultura
     *
     * @return Response
     */
    public function delete(Request $request, Kultura $kultura): Response
    {
        if ($this->isCsrfTokenValid('delete'.$kultura->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($kultura);
            $entityManager->flush();
        } elseif ( $request->isXmlHttpRequest()) {
            $message = 'CSRF token error';
            $resp = [
                'code' => 500,
                'data' => $message
            ];
            return new JsonResponse($resp,500);
        } else {
            return $this->redirectToRoute('kultura_index');
        }

        if ( $request->isXmlHttpRequest()) {
            $resp = [
                'code' => 200,
                'data' => 'Ezabatua izan da'
            ];
            return new JsonResponse($resp);
        }

        return $this->redirectToRoute('kultura_index');
    }
}
