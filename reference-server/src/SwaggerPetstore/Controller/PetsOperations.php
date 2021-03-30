<?php


namespace SwaggerPetstore\Controller;


use SwaggerPetstore\Api\Pet;

class PetsOperations {
  /**
   * @param Pet[] $pets
   * @return array
   */
  public static function mapToJsonData(array $pets): array {
    $data = [];
    foreach ($pets as $pet) {
      $data[] = PetOperations::mapToJsonData($pet);
    }
    return $data;
  }
}