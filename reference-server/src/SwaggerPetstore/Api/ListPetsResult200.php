<?php declare(strict_types=1);


namespace SwaggerPetstore\Api;


class ListPetsResult200 extends ActionResult {
  public static function create(int $statusCode, string $description,
                                   ListPetsHeaders200 $headers, Pets $content): ListPetsResult200 {
    return new ListPetsResult200($statusCode, $description, $headers, $content);
  }

  /** @throws TypeException */
  public function getContent(): Pets {
    if ($this->content instanceof Pets) {
      return $this->content;
    }
    else {
      throw new TypeException('Wrong content type');
    }
  }

  /** @throws TypeException */
  public function getHeaders(): ListPetsHeaders200 {
    if ($this->headers instanceof ListPetsHeaders200)
    return $this->headers;
    else
      throw new TypeException('Wrong headers type');
  }
}