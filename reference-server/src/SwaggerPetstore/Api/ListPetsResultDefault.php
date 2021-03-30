<?php


namespace SwaggerPetstore\Api;


class ListPetsResultDefault extends ActionResult {
  public static function create(int $statusCode, string $description,
                                Error $content): ListPetsResultDefault {
    return new ListPetsResultDefault($statusCode, $description, null, $content);
  }

  /** @throws TypeException */
  public function getContent(): Error {
    if ($this->content instanceof Error) {
      return $this->content;
    }
    else {
      throw new TypeException('Wrong content type');
    }
  }
}