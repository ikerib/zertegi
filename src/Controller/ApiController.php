<?php

namespace App\Controller;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Utils\Utility;

/**
 *
 * @Route("/api")
 */
class ApiController extends AbstractFOSRestController
{


    /**
     * @Rest\Post(path="/clear/selection", name="api_clear_selection", options={ "expose" = true }, locale="")
     * @param SessionInterface $session
     *
     * @return JsonResponse
     */
    public function clearselection(SessionInterface $session): JsonResponse
    {
        $session->remove('zertegi-selection');

        return new JsonResponse('Ok', 200);

    }

    /**
     * @Rest\Post(path="/save/selection/{table}/{id}", name="api_save_selection", options={ "expose" = true }, locale="")
     * @param Utility          $utility
     * @param SessionInterface $session
     * @param                  $table
     * @param                  $id
     *
     * @return JsonResponse
     */
    public function saveselection(Utility $utility, SessionInterface $session, $table, $id): JsonResponse
    {
        // Check if table and value is stored in the session. If so, remove. Otherwise, add it.
        /** @var [] $mySelection */
        $mySelection = $session->get('zertegi-selection');

        // Begiratu ea $table key bezela dagoen
        if ( ($mySelection !== null) && $utility->check_key_value_is_in_array($table, $id, $mySelection)) {
            // key => $value is in array, to delete it
            foreach ($mySelection[$table] as $key=>$value) {
                if ( $value === $id ) {
                    unset($mySelection[ $table ][$key]);
                }
            }
        } else {
            // add $key and $value to the session

            if ($mySelection === null) {
                $mySelection[$table] = [$id];
            } else {
                $mySelection[$table][] = $id;
            }
        }

        $session->set( 'zertegi-selection',$mySelection);

        $resp = [
            'result' => 'Ok',
            'count'  => array_sum(array_map("count", $mySelection))
        ];
        return new JsonResponse($resp, 200);

    }
}
