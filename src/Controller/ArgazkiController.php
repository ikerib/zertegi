<?php

namespace App\Controller;

use App\Entity\Argazki;
use App\Form\ArgazkiType;
use App\Repository\ArgazkiRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\QueryBuilder;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/argazki")
 */
class ArgazkiController extends AbstractController {

    /**
     * @Route("/", name="argazki_index", methods={"GET"})
     * @param Request            $request
     * @param ArgazkiRepository  $argazkiRepository
     *
     * @param PaginatorInterface $paginator
     *
     * @return Response
     */
    public function index(Request $request, ArgazkiRepository $argazkiRepository, PaginatorInterface $paginator): Response
    {
        /** @var QueryBuilder $queryBuilder */
        $queryBuilder = $argazkiRepository->createQueryBuilder('a');

        $filter = $request->query->get('filter');
        if ($filter)
        {
            $queryBuilder->where('MATCH_AGAINST(a.barrutia, a.deskribapena, a.fecha, a.gaia, a.kolorea, a.neurria, a.oharrak, a.zenbakia) AGAINST(:searchterm boolean)>0')
                         ->setParameter('searchterm', $filter);
        }

        $query = $queryBuilder->getQuery();

        $argazkis = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('limit', 10)/*limit per page*/
        );


        return $this->render(
            'argazki/index.html.twig',
            [
                'argazkis' => $argazkis,
            ]
        );
    }

    /**
     * @Route("/new", name="argazki_new", methods={"GET","POST"})
     * @param Request $request
     *
     * @return Response
     */
    public function new(Request $request): Response
    {
        $argazki = new Argazki();
        $form    = $this->createForm(ArgazkiType::class, $argazki);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($argazki);
            $entityManager->flush();

            $this->addFlash('success', 'Datuak ongi grabatu dira.');

            return $this->redirectToRoute('argazki_index');
        }

        return $this->render(
            'argazki/new.html.twig',
            [
                'argazki' => $argazki,
                'form'    => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/{id}", name="argazki_show", methods={"GET"})
     * @param Argazki $argazki
     *
     * @return Response
     */
    public function show(Argazki $argazki): Response
    {
        return $this->render(
            'argazki/show.html.twig',
            [
                'argazki' => $argazki,
            ]
        );
    }

    /**
     * @Route("/{id}/edit", name="argazki_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Argazki $argazki
     *
     * @return Response
     */
    public function edit(Request $request, Argazki $argazki): Response
    {
        $form = $this->createForm(ArgazkiType::class, $argazki);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'Aldaketak ongi gorde dira.');

            return $this->redirectToRoute(
                'argazki_index',
                [
                    'id' => $argazki->getId(),
                ]
            );
        }

        return $this->render(
            'argazki/edit.html.twig',
            [
                'argazki' => $argazki,
                'form'    => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/{id}", name="argazki_delete", methods={"DELETE"}, options = { "expose" = true })
     * @param Request $request
     * @param Argazki $argazki
     *
     * @return Response
     */
    public function delete(Request $request, Argazki $argazki): Response
    {
        if ($this->isCsrfTokenValid('delete'.$argazki->getId(), $request->request->get('_token')))
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($argazki);
            $entityManager->flush();
            $this->addFlash('success', 'Ezabatua izan da.');
        } elseif ($request->isXmlHttpRequest())
        {
            $message = 'CSRF token error';
            $resp    = [
                'code' => 500,
                'data' => $message,
            ];

            return new JsonResponse($resp, 500);
        } else
        {
            return $this->redirectToRoute('argazki_index');
        }

        if ($request->isXmlHttpRequest())
        {
            $resp = [
                'code' => 200,
                'data' => 'Ezabatua izan da',
            ];

            return new JsonResponse($resp);
        }

        return $this->redirectToRoute('argazki_index');
    }
}
