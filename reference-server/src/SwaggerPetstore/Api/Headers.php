<?php


namespace SwaggerPetstore\Api;


abstract class Headers {
  protected $headersByName = [];

  /** @return string[] */
  public function getHeadersByName(): array {
    return $this->headersByName;
  }
}