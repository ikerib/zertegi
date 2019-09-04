<?php

namespace App\Controller;

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
     * @param Connection $connection
     *
     * @return Response
     */
    public function adminindex(Connection $connection): Response
    {
        $sql = "SELECT table_name, table_rows from INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'zertegi';";

        /** @var []  $tables */
        $tables = $connection->fetchAll($sql);

        return $this->render('default/adminindex.html.twig', [
            'tables' => $tables
        ]);
    }
}
