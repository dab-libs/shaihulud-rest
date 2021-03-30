<?php declare(strict_types=1);

namespace SwaggerPetstore\Api;

use Exception;

interface ListPetsActionInterface {
  /**
   * @param int $offset It is a number of the first item to return
   * @param int|null $limit How many items to return at one time (max 100)
   * @return ActionResult
   * @throws Exception
   */
  public function listPets(
    int $offset,
    ?int $limit
  ): ActionResult;

  public function createExceptedResponse(Exception $exception): ActionResult;
}