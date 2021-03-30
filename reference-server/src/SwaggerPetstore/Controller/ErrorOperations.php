<?php


namespace SwaggerPetstore\Controller;


use SwaggerPetstore\Api\Error;

class ErrorOperations {
  public static function mapToJsonData(Error $error): array {
    return [
      'code' => $error->getCode(),
      'message' => $error->getMessage(),
    ];
  }
}