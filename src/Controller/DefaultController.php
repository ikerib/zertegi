<?php

namespace App\Controller;

use Doctrine\DBAL\Driver\Connection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

class DefaultController extends AbstractController
{

    /**
     * @Route("/debug1", name="debug1", methods={"GET"})
     * @param Request $request
     */
    public function debug1(Request $request)
    {
        new Response("OK");
    }

    /**
     * @Route("/debug", name="debug", methods={"GET"})
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function debug(Request $request)
    {
        $user = $this->getUser();
        $user = "iibarguren";
        /**
         * User objectu berria sortu, rol berriekin
         */
        $token = new UsernamePasswordToken(
            $user,
            null,
            'main',
            ["ROLE_ADMIN"]
        );
        $this->get( 'security.token_storage' )->setToken( $token );

        /** @var Session $session */
        $session = $request->getSession();

        /* Localea zehaztu */

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
