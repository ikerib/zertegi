<?php

namespace App\Controller;

use App\Service\DbHelperService;
use Doctrine\DBAL\Driver\Connection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class DefaultController extends AbstractController
{

    /**
     * @Route("/debug", name="admin_finder", methods={"GET"})
     * @param Request               $request
     * @param TokenStorageInterface $tokenStorage
     *
     * @return RedirectResponse
     */
    public function debug(Request $request, TokenStorageInterface $tokenStorage)
    {

        /**
         * User objectu berria sortu, rol berriekin
         */
        $token = new UsernamePasswordToken(
            "iibarguren",
            null,
            'main',
            ['ROLE_ADMIN']
        );

        $tokenStorage->setToken($token);

        /** @var Session $session */
        $session = $request->getSession();

        $request->setLocale('eu');


        return $this->redirectToRoute('admin_home');
    }

    /**
     * @Route("/admin/finder", name="admin_finder", methods={"GET"})
     *
     */
    public function adminfinder()
    {

        return $this->render('default/adminfinder.html.twig', [

        ]);
    }

    /**
     * @Route("/", name="home", methods={"GET"})
     *
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/admin", name="admin_home", methods={"GET"})
     *
     * @param DbHelperService $dbhelper
     *
     * @return Response
     */
    public function adminindex(DbHelperService $dbhelper): Response
    {
        return $this->render('default/adminindex.html.twig', [
            'tables' => $dbhelper->getAllTables()
        ]);
    }
}
