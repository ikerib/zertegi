<?php

namespace App\Controller;

use App\Entity\Amp;
use App\Form\AmpType;
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
 * @Route("/admin/amp")
 */
class AmpController extends AbstractController {

    /**
     * @Route("/", name="amp_index", methods={"GET"})
     *
     * @param Request            $request
     *
     *
     * @param PaginatorInterface $paginator
     *
     * @return Response
     */
    public function index(Request $request, PaginatorInterface $paginator): Response
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        /** @var QueryBuilder $queryBuilder */
        $queryBuilder = $em->getRepository(Amp::class)->createQueryBuilder('a');

        $filter = $request->query->get('filter');
        if ($filter) {
            $queryBuilder->where('MATCH_AGAINST(a.clasificacion, a.expediente, a.fecha, a.observaciones, a.signatura) AGAINST(:searchterm boolean)>0')
                         ->setParameter('searchterm', $filter);
        }

        $query = $queryBuilder->getQuery();

        $amps = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('limit', 10)/*limit per page*/
        );



        return $this->render(
            'amp/index.html.twig',
            [
                'amps' => $amps,
            ]
        );
    }

    /**
     * @Route("/new", name="amp_new", methods={"GET","POST"})
     * @param Request $request
     *
     * @return Response
     */
    public function new(Request $request): Response
    {
        $amp  = new Amp();
        $form = $this->createForm(AmpType::class, $amp, [
            'action' => $this->generateUrl('amp_new'),
            'method' => 'POST'
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($amp);
            $entityManager->flush();

            $this->addFlash('success', 'Datuak ongi grabatu dira.');
            return $this->redirectToRoute('amp_index');
        }

        return $this->render(
            'amp/new.html.twig',
            [
                'amp'  => $amp,
                'form' => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/{id}/edit", name="amp_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Amp     $amp
     *
     * @return Response
     */
    public function edit(Request $request, Amp $amp): Response
    {
        $form = $this->createForm(AmpType::class, $amp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'Aldaketak ongi gorde dira.');

            return $this->redirectToRoute(
                'amp_index',
                [
                    'id' => $amp->getId(),
                ]
            );
        }

        return $this->render(
            'amp/edit.html.twig',
            [
                'amp'  => $amp,
                'form' => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/{id}", name="amp_delete", methods={"DELETE"}, options = { "expose" = true })
     * @param Request $request
     *
     * @param Amp     $amp
     *
     * @return Response
     */
    public function delete(Request $request, Amp $amp): Response
    {
        if ($this->isCsrfTokenValid('delete'.$amp->getId(), $request->request->get('_token')))
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($amp);
            $entityManager->flush();
            $this->addFlash('success', 'Ezabatua izan da.');
        } elseif ( $request->isXmlHttpRequest()) {
            $message = 'CSRF token error';
            $resp = [
                'code' => 500,
                'data' => $message
            ];
            return new JsonResponse($resp,500);
        } else {
            return $this->redirectToRoute('amp_index');
        }

        if ( $request->isXmlHttpRequest()) {
            $resp = [
                'code' => 200,
                'data' => 'Ezabatua izan da'
            ];
            return new JsonResponse($resp);
        }

        return $this->redirectToRoute('amp_index');
    }

    public function createCustomForm($id, $method, $route): FormInterface
    {
        return $this->createFormBuilder()
                    ->setAction($this->generateUrl($route, array('id' => $id)))
                    ->setMethod($method)
                    ->getForm();
    }

    /**
     * @Route("/{id}", name="amp_show", methods={"GET"})
     * @param Amp $amp
     *
     * @return Response
     */
    public function show(Amp $amp): Response
    {
        return $this->render(
            'amp/show.html.twig',
            [
                'amp' => $amp,
            ]
        );
    }
}
