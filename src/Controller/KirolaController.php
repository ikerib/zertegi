<?php

namespace App\Controller;

use App\Entity\Euskera;
use App\Entity\Hutsak;
use App\Entity\Kirola;
use App\Form\KirolaType;
use App\Repository\KirolaRepository;
use App\Repository\LogRepository;
use App\Service\DbHelperService;
use Doctrine\ORM\QueryBuilder;
use Knp\Component\Pager\PaginatorInterface;
use Knp\Snappy\Pdf;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/kirola")
 */
class KirolaController extends AbstractController
{

    /**
     * @Route("/", name="kirola_index", methods={"GET"})
     * @param Request                       $request
     * @param PaginatorInterface            $paginator
     * @param KirolaRepository              $kirolaRepository
     * @param SessionInterface              $session
     * @param DbHelperService               $dbhelper
     * @param \App\Repository\LogRepository $logRepository
     *
     * @return Response
     */
    public function index(Request $request, PaginatorInterface $paginator,
                          KirolaRepository $kirolaRepository, SessionInterface $session,
                          DbHelperService $dbhelper, LogRepository $logRepository
    ): Response
    {
        $fields    = $dbhelper->getAllEntityFields(Kirola::class);
        $myFilters = $dbhelper->getFinderParams($request->query->get('form'));
        $query     = $dbhelper->performSearch('kirola', $myFilters, $fields, $_SERVER['REQUEST_URI']);
        $kirolak   = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('limit', 10)/*limit per page*/
        );

        $myselection = $session->get('zertegi-selection');
        if ($myselection !== null) {
            if (array_key_exists('kirola', $myselection)) {
                $myselection = $myselection['kirola'];
            }
        }

        $fields = $dbhelper->getAllEntityFields(Kirola::class);
        $logs   = $logRepository->findBy([], ['id' => 'DESC'], 10);

        return $this->render(
            'kirola/index.html.twig',
            [
                'logs'        => $logs,
                'kirolak'     => $kirolak,
                'myselection' => $myselection,
                'fields'      => $fields,
                'finderdata'  => $request->query->get('form')]
        );
    }

    /**
     * @Route("/new", name="kirola_new", methods={"GET","POST"})
     * @param Request $request
     *
     * @return Response
     */
    public function new(Request $request): Response
    {
        $kirola = new Kirola();
        $form   = $this->createForm(KirolaType::class, $kirola);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($kirola);
            $entityManager->flush();

            $this->addFlash('success', 'Datuak ongi grabatu dira.');
            return $this->redirectToRoute('kirola_index');
        }

        return $this->render('kirola/new.html.twig', [
            'kirola' => $kirola,
            'form'   => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="kirola_show", methods={"GET"})
     * @param Kirola $kirola
     *
     * @return Response
     */
    public function show(Kirola $kirola): Response
    {
        return $this->render('kirola/show.html.twig', [
            'kirola' => $kirola,
        ]);
    }

    /**
     * @Route("/{id}/apli/{num}", name="kirola_apli", methods={"GET"})
     * @param Kirola $kirola
     *
     * @param     $num
     *
     * @return Response
     */
    public function apli(Kirola $kirola, $num): Response
    {
        return $this->render('kirola/apli.html.twig',
                             [
                                 'kirola' => $kirola,
                                 'num' => $num
                             ]
        );
    }

    /**
     * @Route("/{id}/edit", name="kirola_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Kirola  $kirola
     *
     * @return Response
     */
    public function edit(Request $request, Kirola $kirola): Response
    {
        $form = $this->createForm(KirolaType::class, $kirola);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'Aldaketak ongi gorde dira.');
            return $this->redirectToRoute('kirola_index', [
                'id' => $kirola->getId(),
            ]);
        }

        return $this->render('kirola/edit.html.twig', [
            'kirola' => $kirola,
            'form'   => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="kirola_delete", methods={"DELETE"}, options = { "expose" = true })
     * @param Request $request
     * @param Kirola  $kirola
     *
     * @return Response
     */
    public function delete(Request $request, Kirola $kirola): Response
    {
        if ($this->isCsrfTokenValid('delete' . $kirola->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($kirola);
            $entityManager->flush();
        } elseif ($request->isXmlHttpRequest()) {
            $message = 'CSRF token error';
            $resp    = [
                'code' => 500,
                'data' => $message
            ];
            return new JsonResponse($resp, 500);
        } else {
            return $this->redirectToRoute('kirola_index');
        }

        if ($request->isXmlHttpRequest()) {
            $resp = [
                'code' => 200,
                'data' => 'Ezabatua izan da'
            ];
            return new JsonResponse($resp);
        }

        return $this->redirectToRoute('kirola_index');
    }

    /**
     * @Route("/print/{id}", name="kirola_print", methods={"GET", "POST" })
     * @param Request $request
     *
     * @param Kirola  $kirola
     * @param Pdf     $snappy
     *
     * @return Response
     */
    public function print(Request $request, Kirola $kirola, Pdf $snappy): Response
    {
        $html     = $this->renderView('kirola/pdf.html.twig', ['kirola' => $kirola]);
        $filename = sprintf('kirola-%s.pdf', date('Y-m-d-hh-ss'));

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
