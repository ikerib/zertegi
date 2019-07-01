<?php

namespace App\Controller;

use App\Entity\Kontratazioa;
use App\Form\KontratazioaType;
use App\Repository\KontratazioaRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\QueryBuilder;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/admin/kontratazioa")
 */
class KontratazioaController extends AbstractController
{

    /**
     * @Route("/", name="kontratazioa_index", methods={"GET"})
     * @param Request                $request
     * @param PaginatorInterface     $paginator
     * @param KontratazioaRepository $kontratazioaRepository
     *
     * @return Response
     */
    public function index(Request $request, PaginatorInterface $paginator, KontratazioaRepository $kontratazioaRepository): Response
    {
        /** @var QueryBuilder $queryBuilder */
        $queryBuilder = $kontratazioaRepository->createQueryBuilder('a');

        $filter = $request->query->get('filter');
        if ($filter) {
            $queryBuilder->where('MATCH_AGAINST( a.espedientea, a.sailkapena, a.signatura, a.urtea) AGAINST(:searchterm boolean)>0')
                         ->setParameter('searchterm', $filter);
        }

        $query = $queryBuilder->getQuery();

        $kontratazioas = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('limit', 10)/*limit per page*/
        );



        return $this->render(
            'kontratazioa/index.html.twig',
            [
                'kontratazioas' => $kontratazioas,
            ]
        );

    }

    /**
     * @Route("/new", name="kontratazioa_new", methods={"GET","POST"})
     * @param Request $request
     *
     * @return Response
     */
    public function new(Request $request): Response
    {
        $kontratazioa = new Kontratazioa();
        $form = $this->createForm(KontratazioaType::class, $kontratazioa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($kontratazioa);
            $entityManager->flush();

            $this->addFlash('success', 'Datuak ongi grabatu dira.');
            return $this->redirectToRoute('kontratazioa_index');
        }

        return $this->render('kontratazioa/new.html.twig', [
            'kontratazioa' => $kontratazioa,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="kontratazioa_show", methods={"GET"})
     * @param Kontratazioa $kontratazioa
     *
     * @return Response
     */
    public function show(Kontratazioa $kontratazioa): Response
    {
        return $this->render('kontratazioa/show.html.twig', [
            'kontratazioa' => $kontratazioa,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="kontratazioa_edit", methods={"GET","POST"})
     * @param Request      $request
     * @param Kontratazioa $kontratazioa
     *
     * @return Response
     */
    public function edit(Request $request, Kontratazioa $kontratazioa): Response
    {
        $form = $this->createForm(KontratazioaType::class, $kontratazioa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'Datuak ongi grabatu dira.');
            return $this->redirectToRoute('kontratazioa_index', [
                'id' => $kontratazioa->getId(),
            ]);
        }

        return $this->render('kontratazioa/edit.html.twig', [
            'kontratazioa' => $kontratazioa,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="kontratazioa_delete", methods={"DELETE"}, options = { "expose" = true })
     * @param Request      $request
     * @param Kontratazioa $kontratazioa
     *
     * @return Response
     */
    public function delete(Request $request, Kontratazioa $kontratazioa): Response
    {
        if ($this->isCsrfTokenValid('delete'.$kontratazioa->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($kontratazioa);
            $entityManager->flush();
        } elseif ( $request->isXmlHttpRequest()) {
            $message = 'CSRF token error';
            $resp = [
                'code' => 500,
                'data' => $message
            ];
            return new JsonResponse($resp,500);
        } else {
            return $this->redirectToRoute('kontratazioa_index');
        }

        if ( $request->isXmlHttpRequest()) {
            $resp = [
                'code' => 200,
                'data' => 'Ezabatua izan da'
            ];
            return new JsonResponse($resp);
        }

        return $this->redirectToRoute('kontratazioa_index');
    }
}