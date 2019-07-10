<?php

namespace App\Controller\Api;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Utils;

class ApiController extends AbstractFOSRestController
{

    /**
     * @*Route("/save/selection/{table}/{id}", name="save_selection", methods={"POST"}, options = { "expose" = true })
     * @Rest\Post(path="/save/selection/{table}/{id}")
     * @param SessionInterface $session
     * @param                  $table
     * @param                  $id
     *
     * @return JsonResponse
     */
    public function saveselection(SessionInterface $session, $table, $id): JsonResponse
    {
        // Check if table and value is stored in the session. If so, remove. Otherwise, add it.
        $mySelection = $session->get('zertegi-selection');

        /** @var Utils\Utils $util */
        $util = $this->get('app.utils');

        // Begiratu ea $table key bezela dagoen
        if ($util->check_key_value_is_in_array($table, $id, $mySelection)) {
            // key => $value is in array, to delete it

        } else {
            // add $key and $value to the session
            $session->set(
                'zertegi-selection',
                [
                    $table => [$id],
                ]
            );
        }



        return new JsonResponse('Ok', 200);

    }
}
