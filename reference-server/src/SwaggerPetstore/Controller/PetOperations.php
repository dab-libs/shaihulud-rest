<?php


namespace SwaggerPetstore\Controller;


use SwaggerPetstore\Api\Pet;

class PetOperations {
  public static function mapToJsonData(Pet $pet): array {
    return [
      'id' => $pet->getId(),
      'name' => $pet->getName(),
      'tag' => $pet->getTag(),
    ];
  }
}