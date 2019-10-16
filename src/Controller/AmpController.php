<?php

namespace App\Controller;

use App\Entity\Amp;
use App\Form\AmpType;
use App\Repository\AmpRepository;
use App\Repository\LogRepository;
use App\Service\DbHelperService;
use Doctrine\ORM\QueryBuilder;
use Knp\Component\Pager\PaginatorInterface;
use Knp\Snappy\Pdf;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/admin/amp")
 */
class AmpController extends AbstractController
{

    /**
     * @Route("/", name="amp_index", methods={"GET", "POST"})
     * @param Request                       $request
     * @param AmpRepository                 $ampRepository
     * @param PaginatorInterface            $paginator
     * @param SessionInterface              $session
     * @param DbHelperService               $dbhelper
     * @param \App\Repository\LogRepository $logRepository
     *
     * @return Response
     */
    public function index(Request $request, AmpRepository $ampRepository,
                          PaginatorInterface $paginator,
                          SessionInterface $session,
                          DbHelperService $dbhelper,
                          LogRepository $logRepository): Response
    {
        $fields    = $dbhelper->getAllEntityFields(Amp::class);
        $myFilters = $dbhelper->getFinderParams($request->query->get('form'));
        $query     = $dbhelper->performSearch('amp', $myFilters, $fields, $_SERVER['REQUEST_URI']);
        $amps      = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('limit', 10)/*limit per page*/
        );


        $myselection = $session->get('zertegi-selection');
        if (($myselection !== null) && (array_key_exists('amp', $myselection))) {
            $myselection = $myselection['amp'];
        }
        $logs = $logRepository->findBy([], ['id' => 'DESC'], 10);


        return $this->render(
            'amp/index.html.twig',
            [
                'logs'        => $logs,
                'amps'        => $amps,
                'fields'      => $fields,
                'myselection' => $myselection,
                'finderdata'  => $request->query->get('form')
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
        $form = $this->createForm(
            AmpType::class,
            $amp,
            [
                'action' => $this->generateUrl('amp_new'),
                'method' => 'POST',
            ]
        );
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
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

        if ($form->isSubmitted() && $form->isValid()) {
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
     * @param Amp     $amp
     *
     * @return Response
     */
    public function delete(Request $request, Amp $amp): Response
    {
        if ($this->isCsrfTokenValid('delete' . $amp->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($amp);
            $entityManager->flush();

        } elseif ($request->isXmlHttpRequest()) {
            $message = 'CSRF token error';
            $resp    = [
                'code' => 500,
                'data' => $message,
            ];

            return new JsonResponse($resp, 500);
        } else {
            return $this->redirectToRoute('amp_index');
        }

        if ($request->isXmlHttpRequest()) {
            $resp = [
                'code' => 200,
                'data' => 'Ezabatua izan da',
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
     * @Route("/print/{id}", name="amp_print", methods={"GET", "POST" })
     * @param Request $request
     *
     * @param Amp     $amp
     *
     * @param Pdf     $snappy
     *
     * @return Response
     */
    public function print(Request $request, Amp $amp, Pdf $snappy): Response
    {
        $html     = $this->renderView('amp/pdf.html.twig', ['amp' => $amp]);
        $filename = sprintf('amp-%s.pdf', date('Y-m-d-hh-ss'));

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
