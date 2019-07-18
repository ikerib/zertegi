<?php

namespace App\Controller;

use App\Entity\Hutsak;
use App\Form\HutsakType;
use App\Repository\HutsakRepository;
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
 * @Route("/admin/hutsak")
 */
class HutsakController extends AbstractController
{

    /**
     * @Route("/", name="hutsak_index", methods={"GET"})
     * @param Request            $request
     * @param PaginatorInterface $paginator
     * @param HutsakRepository   $hutsakRepository
     *
     * @param SessionInterface   $session
     *
     * @return Response
     */
    public function index(Request $request, PaginatorInterface $paginator, HutsakRepository $hutsakRepository, SessionInterface $session): Response
    {
        /** @var QueryBuilder $queryBuilder */
        $queryBuilder = $hutsakRepository->createQueryBuilder('a');

        $filter = $request->query->get('filter');
        if ($filter)
        {
            $queryBuilder->where('MATCH_AGAINST(a.berria, a.egoera, a.signatura, a.zaharra) AGAINST(:searchterm boolean)>0')
                         ->setParameter('searchterm', $filter);
        }

        $query = $queryBuilder->getQuery();

        $hutsaks = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('limit', 10)/*limit per page*/
        );

        $myselection = $session->get('zertegi-selection');
        if ($myselection !== null) {
            if (array_key_exists('hutsak', $myselection))
            {
                $myselection = $myselection[ 'hutsak' ];
            }
        }

        return $this->render(
            'hutsak/index.html.twig',
            [
                'hutsaks' => $hutsaks,
                'myselection' => $myselection
            ]
        );
    }

    /**
     * @Route("/new", name="hutsak_new", methods={"GET","POST"})
     * @param Request $request
     *
     * @return Response
     */
    public function new(Request $request): Response
    {
        $hutsak = new Hutsak();
        $form = $this->createForm(HutsakType::class, $hutsak);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($hutsak);
            $entityManager->flush();

            $this->addFlash('success', 'Datuak ongi grabatu dira.');
            return $this->redirectToRoute('hutsak_index');
        }

        return $this->render('hutsak/new.html.twig', [
            'hutsak' => $hutsak,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="hutsak_show", methods={"GET"})
     * @param Hutsak $hutsak
     *
     * @return Response
     */
    public function show(Hutsak $hutsak): Response
    {
        return $this->render('hutsak/show.html.twig', [
            'hutsak' => $hutsak,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="hutsak_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Hutsak  $hutsak
     *
     * @return Response
     */
    public function edit(Request $request, Hutsak $hutsak): Response
    {
        $form = $this->createForm(HutsakType::class, $hutsak);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'Datuak ongi grabatu dira.');
            return $this->redirectToRoute('hutsak_index', [
                'id' => $hutsak->getId(),
            ]);
        }

        return $this->render('hutsak/edit.html.twig', [
            'hutsak' => $hutsak,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="hutsak_delete", methods={"DELETE"}, options = { "expose" = true })
     * @param Request $request
     * @param Hutsak  $hutsak
     *
     * @return Response
     */
    public function delete(Request $request, Hutsak $hutsak): Response
    {
        if ($this->isCsrfTokenValid('delete'.$hutsak->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($hutsak);
            $entityManager->flush();
        } elseif ( $request->isXmlHttpRequest()) {
            $message = 'CSRF token error';
            $resp = [
                'code' => 500,
                'data' => $message
            ];
            return new JsonResponse($resp,500);
        } else {
            return $this->redirectToRoute('hutsak_index');
        }

        if ( $request->isXmlHttpRequest()) {
            $resp = [
                'code' => 200,
                'data' => 'Ezabatua izan da'
            ];
            return new JsonResponse($resp);
        }

        return $this->redirectToRoute('hutsak_index');
    }
}
