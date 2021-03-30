<?php declare(strict_types=1);


namespace SwaggerPetstore\Controller;


use SwaggerPetstore\Api\ActionResult;
use SwaggerPetstore\Api\ListPetsResult200;
use SwaggerPetstore\Api\ListPetsResultDefault;
use SwaggerPetstore\Api\TypeException;
use Symfony\Component\HttpFoundation\Response;

class ListPetsResultOperations {
  /** @throws TypeException */
  public static function createResponse(ActionResult $result): Response {
    $response = new Response();
    $response->setStatusCode($result->getStatusCode(), $result->getDescription());

    if ($result->getStatusCode() == 200) {
      if (!($result instanceof ListPetsResult200)) {
        throw new TypeException('Wrong action result type');
      }
      $response->headers->add($result->getHeaders()->getHeadersByName());
      $contentData = PetsOperations::mapToJsonData($result->getContent());
      $response->setContent(json_encode($contentData));
    }
    else {
      if (!($result instanceof ListPetsResultDefault)) {
        throw new TypeException('Wrong action result type');
      }
      $contentData = ErrorOperations::mapToJsonData($result->getContent());
      $response->setContent(json_encode($contentData));
    }

    return $response;
  }
}