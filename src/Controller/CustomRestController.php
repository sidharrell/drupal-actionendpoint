<?php

namespace Drupal\actionendpoint\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
* Class CustomRestController.
*/
class CustomRestController extends ControllerBase {

 /**
 * @param \Drupal\Core\Entity\Query\QueryFactory $entityQuery
 * The entity query factory.
 */
 public function __construct() {
 }

 /**
 * {@inheritdoc}
 */
 public static function create(ContainerInterface $container) {
   return new static();
 }

 /**
 *
 * @return \Symfony\Component\HttpFoundation\JsonResponse
 * The formatted JSON response.
 */
 public function getLatestNodes() {

   $requestBody = file_get_contents('php://input');
   $json = json_decode($requestBody);
#   var_dump($json);

   $response_array = [];
   if ($json->queryResult->queryText == "add item to list") {
     $response_array = ['fulfillmentText' => 'item added to list'];
   } else {
     $response_array = ['fulfillmentText' => 'No new nodes.'];
   }
   $response = new JsonResponse($response_array);

   return $response;
 }

}

