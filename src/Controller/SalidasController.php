<?php

namespace App\Controller;

use App\Entity\Salidas;
use App\Form\SalidasType;
use App\Repository\SalidasRepository;
use Doctrine\ORM\QueryBuilder;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/salidas")
 */
class SalidasController extends AbstractController
{

    /**
     * @Route("/", name="salidas_index", methods={"GET"})
     * @param Request            $request
     * @param PaginatorInterface $paginator
     * @param SalidasRepository  $salidasRepository
     * @param SessionInterface   $session
     *
     * @return Response
     */
    public function index(Request $request, PaginatorInterface $paginator, SalidasRepository $salidasRepository, SessionInterface $session): Response
    {
        /** @var QueryBuilder $queryBuilder */
        $queryBuilder = $salidasRepository->createQueryBuilder('a');

        $filter = $request->query->get('filter');
        if ($filter) {
            // Begiratu bilaketak &-rik duen, baldin badu banatu bilaketa bloketan
            $aFilter = explode('&', $filter);
            $sqlFilter = '';

            foreach ($aFilter as $key=>$value) {
                if ( $key === 0) {
                    $sqlFilter = $value;
                } else {
                    $sqlFilter .= ','.$value;
                }
            }
            $queryBuilder->where('MATCH_AGAINST( a.eskatzailea, a.espedientea, a.irteera, a.sarrera, a.signatura) AGAINST(:searchterm boolean)>0')
                         ->setParameter('searchterm', $filter);
        }

        $query = $queryBuilder->getQuery();

        $salidas = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('limit', 10)/*limit per page*/
        );

        $myselection = $session->get('zertegi-selection');
        if (($myselection !== null) && array_key_exists('salidas', $myselection))
        {
            $myselection = $myselection[ 'salidas' ];
        }


        return $this->render(
            'salidas/index.html.twig',
            [
                'salidas' => $salidas,
                'myselection' => $myselection
            ]
        );
    }

    /**
     * @Route("/new", name="salidas_new", methods={"GET","POST"})
     * @param Request $request
     *
     * @return Response
     */
    public function new(Request $request): Response
    {
        $salida = new Salidas();
        $form = $this->createForm(SalidasType::class, $salida);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($salida);
            $entityManager->flush();

            $this->addFlash('success', 'Datuak ongi grabatu dira.');
            return $this->redirectToRoute('salidas_index');
        }

        return $this->render('salidas/new.html.twig', [
            'salida' => $salida,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="salidas_show", methods={"GET"})
     * @param Salidas $salida
     *
     * @return Response
     */
    public function show(Salidas $salida): Response
    {
        return $this->render('salidas/show.html.twig', [
            'salida' => $salida,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="salidas_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Salidas $salida
     *
     * @return Response
     */
    public function edit(Request $request, Salidas $salida): Response
    {
        $form = $this->createForm(SalidasType::class, $salida);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'Datuak ongi grabatu dira.');
            return $this->redirectToRoute('salidas_index', [
                'id' => $salida->getId(),
            ]);
        }

        return $this->render('salidas/edit.html.twig', [
            'salida' => $salida,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="salidas_delete", methods={"DELETE"}, options = { "expose" = true })
     * @param Request $request
     * @param Salidas $salida
     *
     * @return Response
     */
    public function delete(Request $request, Salidas $salida): Response
    {
        if ($this->isCsrfTokenValid('delete'.$salida->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($salida);
            $entityManager->flush();
        } elseif ( $request->isXmlHttpRequest()) {
            $message = 'CSRF token error';
            $resp = [
                'code' => 500,
                'data' => $message
            ];
            return new JsonResponse($resp,500);
        } else {
            return $this->redirectToRoute('salidas_index');
        }

        if ( $request->isXmlHttpRequest()) {
            $resp = [
                'code' => 200,
                'data' => 'Ezabatua izan da'
            ];
            return new JsonResponse($resp);
        }

        return $this->redirectToRoute('salidas_index');
    }
}
