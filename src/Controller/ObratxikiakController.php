<?php

namespace App\Controller;

use App\Entity\Obratxikiak;
use App\Form\ObratxikiakType;
use App\Repository\ObratxikiakRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\QueryBuilder;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/obratxikiak")
 */
class ObratxikiakController extends AbstractController
{

    /**
     * @Route("/", name="obratxikiak_index", methods={"GET"})
     * @param Request               $request
     * @param PaginatorInterface    $paginator
     * @param ObratxikiakRepository $obratxikiakRepository
     *
     * @return Response
     */
    public function index(Request $request, PaginatorInterface $paginator, ObratxikiakRepository $obratxikiakRepository): Response
    {
        /** @var QueryBuilder $queryBuilder */
        $queryBuilder = $obratxikiakRepository->createQueryBuilder('a');

        $filter = $request->query->get('filter');
        if ($filter) {
            $queryBuilder->where('MATCH_AGAINST (a.espedientea, a.sailkapena, a.signatura, a.urtea) AGAINST(:searchterm boolean)>0')
                         ->setParameter('searchterm', $filter);
        }

        $query = $queryBuilder->getQuery();

        $obratxikiaks = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('limit', 10)/*limit per page*/
        );



        return $this->render(
            'obratxikiak/index.html.twig',
            [
                'obratxikiaks' => $obratxikiaks,
            ]
        );

    }

    /**
     * @Route("/new", name="obratxikiak_new", methods={"GET","POST"})
     * @param Request $request
     *
     * @return Response
     */
    public function new(Request $request): Response
    {
        $obratxikiak = new Obratxikiak();
        $form = $this->createForm(ObratxikiakType::class, $obratxikiak);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($obratxikiak);
            $entityManager->flush();

            $this->addFlash('success', 'Datuak ongi grabatu dira.');
            return $this->redirectToRoute('obratxikiak_index');
        }

        return $this->render('obratxikiak/new.html.twig', [
            'obratxikiak' => $obratxikiak,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="obratxikiak_show", methods={"GET"})
     * @param Obratxikiak $obratxikiak
     *
     * @return Response
     */
    public function show(Obratxikiak $obratxikiak): Response
    {
        return $this->render('obratxikiak/show.html.twig', [
            'obratxikiak' => $obratxikiak,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="obratxikiak_edit", methods={"GET","POST"})
     * @param Request     $request
     * @param Obratxikiak $obratxikiak
     *
     * @return Response
     */
    public function edit(Request $request, Obratxikiak $obratxikiak): Response
    {
        $form = $this->createForm(ObratxikiakType::class, $obratxikiak);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'Datuak ongi grabatu dira.');
            return $this->redirectToRoute('obratxikiak_index', [
                'id' => $obratxikiak->getId(),
            ]);
        }

        return $this->render('obratxikiak/edit.html.twig', [
            'obratxikiak' => $obratxikiak,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="obratxikiak_delete", methods={"DELETE"}, options = { "expose" = true })
     * @param Request     $request
     * @param Obratxikiak $obratxikiak
     *
     * @return Response
     */
    public function delete(Request $request, Obratxikiak $obratxikiak): Response
    {
        if ($this->isCsrfTokenValid('delete'.$obratxikiak->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($obratxikiak);
            $entityManager->flush();
        } elseif ( $request->isXmlHttpRequest()) {
            $message = 'CSRF token error';
            $resp = [
                'code' => 500,
                'data' => $message
            ];
            return new JsonResponse($resp,500);
        } else {
            return $this->redirectToRoute('obratxikiak_index');
        }

        if ( $request->isXmlHttpRequest()) {
            $resp = [
                'code' => 200,
                'data' => 'Ezabatua izan da'
            ];
            return new JsonResponse($resp);
        }

        return $this->redirectToRoute('obratxikiak_index');
    }
}