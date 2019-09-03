<?php

namespace App\Controller;

use Doctrine\DBAL\Driver\Connection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{

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
