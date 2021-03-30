<?php declare(strict_types=1);


namespace SwaggerPetstore\Controller;


use Exception;
use SwaggerPetstore\Api\ListPetsActionInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ListPetsController {
  /** @var ListPetsActionInterface */
  private $action;

  public function __construct(ListPetsActionInterface $action) {
    $this->action = $action;
  }

  public function listPets(Request $request): Response {
    try {
      $offset = IntOperations::parseAndValidate(
        $request->query->get('offset', 0), 
        (new IntOptions('offset'))
          ->setMinimum(0)
      );
      $limit = IntOperations::parseAndValidate(
        $request->query->get('limit', 0), 
        (new IntOptions('limit'))
          ->setMinimum(0)
      );

      $listPetsResponse = $this->action->listPets($offset, $limit);
    }
    catch (Exception $exception) {
      $listPetsResponse = $this->action->createExceptedResponse($exception);
    }

    return ListPetsResultOperations::createResponse($listPetsResponse);
  }

}