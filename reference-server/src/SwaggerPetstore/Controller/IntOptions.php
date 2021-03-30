<?php


namespace SwaggerPetstore\Controller;


class IntOptions {
  /** @var string */
  private $varName;

  /** @var int|null */
  private $minimum;
  
  /** @var int|null */
  private $exclusiveMinimum;
  
  /** @var int|null */
  private $maximum;
  
  /** @var int|null */
  private $exclusiveMaximum;
  
  /** @var int|null */
  private $multipleOf;

  /**
   * IntOptions constructor.
   * @param string $name
   */
  public function __construct(string $name) {
    $this->varName = $name;
  }

  public function getVarName(): string {
    return $this->varName;
  }

  public function setVarName(string $varName): self {
    $this->varName = $varName;
    return $this;
  }

  public function getMinimum(): ?int {
    return $this->minimum;
  }

  public function setMinimum(int $minimum): self {
    $this->minimum = $minimum;
    return $this;
  }

  public function getExclusiveMinimum(): ?int {
    return $this->exclusiveMinimum;
  }

  public function setExclusiveMinimum(int $exclusiveMinimum): self {
    $this->exclusiveMinimum = $exclusiveMinimum;
    return $this;
  }

  public function getMaximum(): ?int {
    return $this->maximum;
  }

  public function setMaximum(int $maximum): self {
    $this->maximum = $maximum;
    return $this;
  }

  public function getExclusiveMaximum(): ?int {
    return $this->exclusiveMaximum;
  }

  public function setExclusiveMaximum(int $exclusiveMaximum): self {
    $this->exclusiveMaximum = $exclusiveMaximum;
    return $this;
  }

  public function getMultipleOf(): ?int {
    return $this->multipleOf;
  }

  public function setMultipleOf(int $multipleOf): self {
    $this->multipleOf = $multipleOf;
    return $this;
  }
}