<?php declare(strict_types=1);


namespace SprutBillingApi\Domain;


use Exception;

class ArrayOperations {
  /**
   * @param ?string $value
   * @return mixed
   */
  public static function decodeJson(?string $value): mixed {
    if ($value === null) {
      return null;
    }
    return json_decode($value);
  }

  /**
   * @param ?array $value
   * @return ?string
   */
  public static function encodeJson(?array $value): ?string {
    if ($value === null) {
      return null;
    }
    return json_encode($value);
  }

  /**
   * @param string[]|null $value
   * @return ?array
   */
  public static function decodeSimple(?array $value): ?array {
    if ($value === null) {
      return null;
    }
    $decoded = [];
    foreach ($value as $item) {
      $jsonDecoded = json_decode($item);
      if ($jsonDecoded === null) {
        $decoded[] = $item;
      }
      else {
        $decoded[] = $jsonDecoded;
      }
    }
    return $decoded;
  }

  /**
   * @param ?array $value
   * @return ?array
   */
  public static function encodeSimple(?array $value): ?array {
    if ($value === null) {
      return null;
    }
    $encoded = [];
    foreach ($value as $item) {
      if (is_string($item)) {
        $encoded[] = $item;
      }
      else {
        $encoded[] = json_encode($item);
      }
    }
    return $encoded;
  }

  /**
   * @param array|null $decoded
   * @param string $name
   * @param bool $required
   * @param int $minItems
   * @param int|null $maxItems
   * @param callable $validateItem
   * @return void
   * @throws Exception
   */
  public static function validate(?array $decoded, string $name, bool $required,
                                  int $minItems, ?int $maxItems,
                                  callable $validateItem): void {
    if ($decoded === null) {
      if ($required === true) {
        throw new Exception($name . ' is not found');
      }
    }

    if (!is_array($decoded)) {
      throw new Exception($name . ' is not a array');
    }

    self::validateMinItems($decoded, $name, $minItems);
    self::validateMaxItems($decoded, $name, $maxItems);
    self::validateItems($decoded, $name, $validateItem);
  }

  public static function create(mixed $decoded, callable $createItem): ?array {
    if ($decoded === null) {
      return null;
    }
    $array = [];
    foreach ($decoded as $item) {
      $array[] = $createItem($item);
    }
    return $array;
  }

  /**
   * @param array $value
   * @param string $name
   * @param int $minItems
   * @throws Exception
   */
  private static function validateMinItems(array $value, string $name, int $minItems): void {
    if (count($value) < $minItems) {
      throw new Exception($name . ' is too short. Its length is littler then ' . $minItems);
    }
  }

  /**
   * @param array $value
   * @param string $name
   * @param int|null $maxItems
   * @throws Exception
   */
  private static function validateMaxItems(array $value, string $name, ?int $maxItems): void {
    if ($maxItems !== null && count($value) > $maxItems) {
      throw new Exception($name . ' is too long. Its length is greater then ' . $maxItems);
    }
  }

  /**
   * @param array $value
   * @param string $name
   * @param callable $validateItem
   * @throws Exception
   */
  private static function validateItems(array $value, string $name, callable $validateItem): void {
    try {
      foreach ($value as $i => $item) {
        $validateItem($item, (string)$i);
      }
    }
    catch (Exception $e) {
      throw new Exception($name . '\'s item is not valid. ' . $e->getMessage(), $e);
    }
  }
}
