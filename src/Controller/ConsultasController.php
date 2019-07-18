<?php

namespace App\Controller;

use App\Entity\Consultas;
use App\Form\ConsultasType;
use App\Repository\ConsultasRepository;
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
 * @Route("/admin/consultas")
 */
class ConsultasController extends AbstractController
{

    /**
     * @Route("/", name="consultas_index", methods={"GET"})
     * @param Request             $request
     * @param PaginatorInterface  $paginator
     * @param ConsultasRepository $consultasRepository
     *
     * @param SessionInterface    $session
     *
     * @return Response
     */
    public function index(Request $request, PaginatorInterface $paginator, ConsultasRepository $consultasRepository, SessionInterface $session): Response
    {
        /** @var QueryBuilder $queryBuilder */
        $queryBuilder = $consultasRepository->createQueryBuilder('a');

        $filter = $request->query->get('filter');
        if ($filter) {
            $queryBuilder->where('MATCH_AGAINST(a.enpresa, a.gaia, a.helbidea, a.izena, a.kontsulta) AGAINST(:searchterm boolean)>0')
                         ->setParameter('searchterm', $filter);
        }

        $query = $queryBuilder->getQuery();

        $consultas = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('limit', 10)/*limit per page*/
        );

        $myselection = $session->get('zertegi-selection');
        if ($myselection !== null) {
            if (array_key_exists('consultas', $myselection))
            {
                $myselection = $myselection[ 'consultas' ];
            }
        }


        return $this->render(
            'consultas/index.html.twig',
            [
                'consultas' => $consultas,
                'myselection' => $myselection
            ]
        );
    }

    /**
     * @Route("/new", name="consultas_new", methods={"GET","POST"})
     * @param Request $request
     *
     * @return Response
     */
    public function new(Request $request): Response
    {
        $consulta = new Consultas();
        $form = $this->createForm(ConsultasType::class, $consulta);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($consulta);
            $entityManager->flush();

            $this->addFlash('success', 'Datuak ongi grabatu dira.');
            return $this->redirectToRoute('consultas_index');
        }

        return $this->render('consultas/new.html.twig', [
            'consulta' => $consulta,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="consultas_show", methods={"GET"})
     * @param Consultas $consulta
     *
     * @return Response
     */
    public function show(Consultas $consulta): Response
    {
        return $this->render('consultas/show.html.twig', [
            'consulta' => $consulta,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="consultas_edit", methods={"GET","POST"})
     * @param Request   $request
     * @param Consultas $consulta
     *
     * @return Response
     */
    public function edit(Request $request, Consultas $consulta): Response
    {
        $form = $this->createForm(ConsultasType::class, $consulta);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'Aldaketak ongi gorde dira.');
            return $this->redirectToRoute('consultas_index', [
                'id' => $consulta->getId(),
            ]);
        }

        return $this->render('consultas/edit.html.twig', [
            'consulta' => $consulta,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="consultas_delete", methods={"DELETE"}, options = { "expose" = true })
     * @param Request   $request
     * @param Consultas $consulta
     *
     * @return Response
     */
    public function delete(Request $request, Consultas $consulta): Response
    {
        if ($this->isCsrfTokenValid('delete'.$consulta->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($consulta);
            $entityManager->flush();
        } elseif ( $request->isXmlHttpRequest()) {
            $message = 'CSRF token error';
            $resp = [
                'code' => 500,
                'data' => $message
            ];
            return new JsonResponse($resp,500);
        } else {
            return $this->redirectToRoute('consultas_index');
        }

        if ( $request->isXmlHttpRequest()) {
            $resp = [
                'code' => 200,
                'data' => 'Ezabatua izan da'
            ];
            return new JsonResponse($resp);
        }

        return $this->redirectToRoute('consultas_index');
    }
}
