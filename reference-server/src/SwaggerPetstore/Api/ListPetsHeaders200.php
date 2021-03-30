<?php


namespace SwaggerPetstore\Api;


class ListPetsHeaders200 extends Headers {
  public function getXNext(): string {
    return $this->headersByName['x-next'];
  }

  public function setXNext(string $value): void {
    $this->headersByName['x-next'] = $value;
  }
}