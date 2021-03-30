<?php


namespace SwaggerPetstore\Api;


abstract class ActionResult {
  /** @var int */
  protected $statusCode;

  /** @var string */
  protected $description;

  /** @var Headers|null */
  protected $headers = null;

  /** @var object|null */
  protected $content = null;

  protected function __construct(int $statusCode, string $description, ?Headers $headers, ?object $content) {
    $this->statusCode = $statusCode;
    $this->description = $description;
    $this->headers = $headers;
    $this->content = $content;
  }

  public function getStatusCode(): int {
    return $this->statusCode;
  }

  public function getDescription(): string {
    return $this->description;
  }
}