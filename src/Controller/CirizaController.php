<?php

namespace App\Controller;

use App\Entity\Ciriza;
use App\Form\CirizaType;
use App\Repository\CirizaRepository;
use App\Repository\LogRepository;
use App\Service\DbHelperService;
use Knp\Component\Pager\PaginatorInterface;
use Knp\Snappy\Pdf;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/ciriza")
 */
class CirizaController extends AbstractController {

    /**
     * @Route("/", name="ciriza_index", methods={"GET", "POST"})
     * @param Request                       $request
     * @param PaginatorInterface            $paginator
     * @param CirizaRepository              $cirizaRepository
     *
     * @param \App\Repository\LogRepository $logRepository
     * @param SessionInterface              $session
     *
     * @param DbHelperService               $dbhelper
     *
     * @return Response
     */
    public function index(
        Request $request,
        PaginatorInterface $paginator,
        CirizaRepository $cirizaRepository,
        LogRepository $logRepository,
        SessionInterface $session,
        DbHelperService $dbhelper
    ): Response {
        $fields = $dbhelper->getAllEntityFields(Ciriza::class);
        $myFilters = $dbhelper->getFinderParams($request->query->get('form'));
        $query = $dbhelper->performSearch('ciriza',$myFilters, $fields, $_SERVER['REQUEST_URI']);

        $cirizas = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('limit', 10)/*limit per page*/
        );

        $myselection = $session->get('zertegi-selection');
        if ($myselection !== null)
        {
            if (array_key_exists('ciriza', $myselection))
            {
                $myselection = $myselection[ 'ciriza' ];
            }
        }
        $logs = $logRepository->findBy([],['id'=>'DESC'],10);
        return $this->render(
            'ciriza/index.html.twig',
            [
                'logs'      => $logs,
                'cirizas'     => $cirizas,
                'myselection' => $myselection,
                'fields'      => $fields,
                'finderdata'    => $request->query->get('form')            ]
        );
    }

    /**
     * @Route("/new", name="ciriza_new", methods={"GET","POST"})
     * @param Request $request
     *
     * @return Response
     */
    public function new(Request $request): Response
    {
        $ciriza = new Ciriza();
        $form   = $this->createForm(CirizaType::class, $ciriza);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ciriza);
            $entityManager->flush();

            $this->addFlash('success', 'Datuak ongi grabatu dira.');

            return $this->redirectToRoute('ciriza_index');
        }

        return $this->render(
            'ciriza/new.html.twig',
            [
                'ciriza' => $ciriza,
                'form'   => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/{id}", name="ciriza_show", methods={"GET"})
     * @param Ciriza $ciriza
     *
     * @return Response
     */
    public function show(Ciriza $ciriza): Response
    {
        return $this->render(
            'ciriza/show.html.twig',
            [
                'ciriza' => $ciriza,
            ]
        );
    }

    /**
     * @Route("/{id}/apli/{num}", name="ciriza_apli", methods={"GET"})
     * @param Ciriza $ciriza
     *
     * @param     $num
     *
     * @return Response
     */
    public function apli(Ciriza $ciriza, $num): Response
    {
        return $this->render(
            'ciriza/apli.html.twig',
            [
                'ciriza' => $ciriza,
                'num' => $num
            ]
        );
    }

    /**
     * @Route("/{id}/edit", name="ciriza_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Ciriza  $ciriza
     *
     * @return Response
     */
    public function edit(Request $request, Ciriza $ciriza): Response
    {
        $form = $this->createForm(CirizaType::class, $ciriza);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'Aldaketak ongi gorde dira.');

            return $this->redirectToRoute(
                'ciriza_index',
                [
                    'id' => $ciriza->getId(),
                ]
            );
        }

        return $this->render(
            'ciriza/edit.html.twig',
            [
                'ciriza' => $ciriza,
                'form'   => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/{id}", name="ciriza_delete", methods={"DELETE"}, options = { "expose" = true })
     * @param Request $request
     * @param Ciriza  $ciriza
     *
     * @return Response
     */
    public function delete(Request $request, Ciriza $ciriza): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ciriza->getId(), $request->request->get('_token')))
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ciriza);
            $entityManager->flush();
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
            return $this->redirectToRoute('ciriza_index');
        }

        if ($request->isXmlHttpRequest())
        {
            $resp = [
                'code' => 200,
                'data' => 'Ezabatua izan da',
            ];

            return new JsonResponse($resp);
        }

        return $this->redirectToRoute('ciriza_index');
    }

    /**
     * @Route("/print/{id}", name="ciriza_print", methods={"GET", "POST" })
     * @param Request $request
     *
     * @param Ciriza  $ciriza
     * @param Pdf     $snappy
     *
     * @return Response
     */
    public function print(Request $request, Ciriza $ciriza, Pdf $snappy): Response
    {
        $html      = $this->renderView('ciriza/pdf.html.twig', [ 'ciriza' => $ciriza ]);
        $filename  = sprintf('ciriza-%s.pdf', date('Y-m-d-hh-ss'));

        return new Response(
            $snappy->getOutputFromHtml($html),
            200,
            [
                'Content-Type'        => 'application/pdf',
                'Content-Disposition' => sprintf('attachment; filename="%s"', $filename),
            ]
        );
    }
}
