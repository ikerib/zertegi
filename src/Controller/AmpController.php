<?php

namespace App\Controller;

use App\Entity\Amp;
use App\Form\AmpType;
use FOS\ElasticaBundle\Finder\PaginatedFinderInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/amp")
 */
class AmpController extends AbstractController {

    /** @var PaginatedFinderInterface */
    private $finder;

    /**
     * constructor.
     *
     * @param PaginatedFinderInterface $finder
     *
     */
    public function __construct(PaginatedFinderInterface $finder)
    {
        $this->finder = $finder;
    }

    /**
     * @Route("/", name="amp_index", methods={"GET"})
     *
     * @param Request            $request
     *
     * @param PaginatorInterface $paginator
     *
     * @return Response
     */
    public function index(Request $request, PaginatorInterface $paginator): Response
    {
        /** @var \Doctrine\ORM\EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $searchQuery = $request->query->get('filter');
        if (!empty($searchQuery))
        {

            $results = $this->finder->createPaginatorAdapter($searchQuery);
            $amps    = $paginator->paginate(
                $results,
                $request->query->getInt('page', 2)/*page number*/,
                $request->query->getInt('limit', 10)/*limit per page*/
            );

        } else
        {


            /** @var \Doctrine\ORM\QueryBuilder $queryBuilder */
            $queryBuilder = $em->getRepository('App:Amp')->createQueryBuilder('bp');

            if ($request->query->getAlnum('filter'))
            {
                $queryBuilder->where('bp.expediente LIKE :expediente')
                             ->setParameter('expediente', '%'.$request->query->getAlnum('filter').'%')
                             ->orWhere('bp.fecha LIKE :fecha')
                             ->setParameter('fecha', '%'.$request->query->getAlnum('filter').'%')
                             ->orWhere('bp.clasificacion LIKE :clasificacion')
                             ->setParameter('clasificacion', '%'.$request->query->getAlnum('filter').'%')
                             ->orWhere('bp.signatura LIKE :signatura')
                             ->setParameter('signatura', '%'.$request->query->getAlnum('filter').'%')
                             ->orWhere('bp.observaciones LIKE :observaciones')
                             ->setParameter('observaciones', '%'.$request->query->getAlnum('filter').'%');
            }
            $query = $queryBuilder->getQuery();

            $amps = $paginator->paginate(
                $query, /* query NOT result */
                $request->query->getInt('page', 2)/*page number*/,
                $request->query->getInt('limit', 10)/*limit per page*/
            );
        }


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
        $form = $this->createForm(AmpType::class, $amp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($amp);
            $entityManager->flush();

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

    public function createCustomForm($id, $method, $route): \Symfony\Component\Form\FormInterface
    {
        return $this->createFormBuilder()
                    ->setAction($this->generateUrl($route, array('id' => $id)))
                    ->setMethod($method)
                    ->getForm();
    }
}
