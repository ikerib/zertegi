<?php

namespace App\Controller;

use App\Entity\Amp;
use App\Entity\Liburuxka;
use App\Entity\Obratxikiak;
use App\Form\BerrikusiObratxikiakType;
use App\Form\ObratxikiakType;
use App\Repository\LogRepository;
use App\Repository\ObratxikiakRepository;
use App\Service\DbHelperService;
use Doctrine\ORM\EntityManager;
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
 * @Route("/admin/obratxikiak")
 */
class ObratxikiakController extends AbstractController
{

    /**
     * @Route("/", name="obratxikiak_index", methods={"GET", "POST"})
     * @param Request $request
     * @param PaginatorInterface $paginator
     * @param ObratxikiakRepository $obratxikiakRepository
     *
     * @param SessionInterface $session
     *
     * @param DbHelperService $dbhelper
     * @param LogRepository $logRepository
     * @return Response
     */
    public function index(Request $request, PaginatorInterface $paginator,
                          ObratxikiakRepository $obratxikiakRepository, SessionInterface $session,
                          DbHelperService $dbhelper, LogRepository $logRepository): Response
    {
        $fields       = $dbhelper->getAllEntityFields(Obratxikiak::class);
        $myFilters    = $dbhelper->getFinderParams($request->query->get('form'));
        $query        = $dbhelper->performSearch('obratxikiak', $myFilters, $fields, $_SERVER['REQUEST_URI']);
        $obratxikiaks = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('limit', 10)/*limit per page*/
        );

        $myselection = $session->get('zertegi-selection');
        if ($myselection !== null) {
            if (array_key_exists('obratxikiak', $myselection)) {
                $myselection = $myselection['obratxikiak'];
            }
        }

        $fields = $dbhelper->getAllEntityFields(Obratxikiak::class);
        $logs   = $logRepository->findBy([], ['id' => 'DESC'], 10);

        return $this->render(
            'obratxikiak/index.html.twig',
            [
                'logs'         => $logs,
                'obratxikiaks' => $obratxikiaks,
                'myselection'  => $myselection,
                'fields'       => $fields,
                'finderdata'   => $request->query->get('form')]
        );

    }

    /**
     * @Route("/rebisioa", name="obratxikiak_rebisioa")
     */
    public function rebisioa(Request $request, PaginatorInterface $paginator, ObratxikiakRepository $obratxikiakRepository): Response
    {
        $query = $obratxikiakRepository->getAllBerrikusi();
        $obratxikiak  = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('limit', 10)/*limit per page*/
        );
        return $this->render('obratxikiak/rebisioa.html.twig', [
            'obratxikiak' => $obratxikiak,
        ]);
    }

    /**
     * @Route("/new", name="obratxikiak_new", methods={"GET","POST"})
     * @param Request $request
     *
     * @return Response
     */
    public function new(Request $request): Response
    {
        $obratxikiak = new Obratxikiak();
        $form        = $this->createForm(ObratxikiakType::class, $obratxikiak);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($obratxikiak);
            $entityManager->flush();

            $this->addFlash('success', 'Datuak ongi grabatu dira.');
            return $this->redirectToRoute('obratxikiak_index');
        }

        return $this->render('obratxikiak/new.html.twig', [
            'obratxikiak' => $obratxikiak,
            'form'        => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="obratxikiak_show", methods={"GET"})
     * @param Obratxikiak $obratxikiak
     *
     * @return Response
     */
    public function show(Obratxikiak $obratxikiak): Response
    {
        return $this->render('obratxikiak/show.html.twig', [
            'obratxikiak' => $obratxikiak,
        ]);
    }

    /**
     * @Route("/{id}/apli/{num}", name="obratxikiak_apli", methods={"GET"})
     * @param Obratxikiak $obratxikiak
     *
     * @param     $num
     *
     * @return Response
     */
    public function apli(Obratxikiak $obratxikiak, $num): Response
    {
        return $this->render('obratxikiak/apli.html.twig',
                             [
                                 'obratxikiak' => $obratxikiak,
                                 'num' => $num
                             ]
        );
    }

    /**
     * @Route("/{id}/edit", name="obratxikiak_edit", methods={"GET","POST"})
     * @param Request     $request
     * @param Obratxikiak $obratxikiak
     *
     * @return Response
     */
    public function edit(Request $request, Obratxikiak $obratxikiak): Response
    {
        $form = $this->createForm(ObratxikiakType::class, $obratxikiak);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'Datuak ongi grabatu dira.');
            return $this->redirectToRoute('obratxikiak_index', [
                'id' => $obratxikiak->getId(),
            ]);
        }

        return $this->render('obratxikiak/edit.html.twig', [
            'obratxikiak' => $obratxikiak,
            'form'        => $form->createView(),
        ]);
    }

    /**
     * @Route("/berrikusi/{id}", name="obratxikiak_berrikusi", methods={"GET","POST"})
     * @param Request $request
     * @param Obratxikiak $obratxikiak
     * @return Response
     */
    public function berrikusi(Request $request, Obratxikiak  $obratxikiak): Response
    {
        $form = $this->createForm(BerrikusiObratxikiakType::class, $obratxikiak);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $obratxikiak->setBerrikusi(false);
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Aldaketak ongi gorde dira.');
            return $this->redirectToRoute('obratxikiak_rebisioa');
        }

        return $this->render(
            'obratxikiak/berrikusi.html.twig',
            [
                'obratxikiak'  => $obratxikiak,
                'form' => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/{id}", name="obratxikiak_delete", methods={"DELETE"}, options = { "expose" = true })
     * @param Request     $request
     * @param Obratxikiak $obratxikiak
     *
     * @return Response
     */
    public function delete(Request $request, Obratxikiak $obratxikiak): Response
    {
        if ($this->isCsrfTokenValid('delete' . $obratxikiak->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($obratxikiak);
            $entityManager->flush();
        } elseif ($request->isXmlHttpRequest()) {
            $message = 'CSRF token error';
            $resp    = [
                'code' => 500,
                'data' => $message
            ];
            return new JsonResponse($resp, 500);
        } else {
            return $this->redirectToRoute('obratxikiak_index');
        }

        if ($request->isXmlHttpRequest()) {
            $resp = [
                'code' => 200,
                'data' => 'Ezabatua izan da'
            ];
            return new JsonResponse($resp);
        }

        return $this->redirectToRoute('obratxikiak_index');
    }

    /**
     * @Route("/print/{id}", name="obratxikiak_print", methods={"GET", "POST" })
     * @param Request     $request
     *
     * @param Obratxikiak $obratxikia
     * @param Pdf         $snappy
     *
     * @return Response
     */
    public function print(Request $request, Obratxikiak $obratxikia, Pdf $snappy): Response
    {
        $html     = $this->renderView('obratxikiak/pdf.html.twig', ['obratxikiak' => $obratxikia]);
        $filename = sprintf('obratxikia-%s.pdf', date('Y-m-d-hh-ss'));

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
