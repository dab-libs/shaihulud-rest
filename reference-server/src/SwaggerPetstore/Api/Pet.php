<?php


namespace SwaggerPetstore\Api;


class Pet {
  /** @var int */
  private $id;

  /** @var string */
  private $name;

  /** @var string */
  private $tag;

  public function __construct(int $id, string $name, string $tag) {
    $this->id = $id;
    $this->name = $name;
    $this->tag = $tag;
  }

  public function getId(): int {
    return $this->id;
  }

  public function getName(): string {
    return $this->name;
  }

  public function getTag(): string {
    return $this->tag;
  }

}