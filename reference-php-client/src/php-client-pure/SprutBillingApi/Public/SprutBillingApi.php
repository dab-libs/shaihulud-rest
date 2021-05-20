<?php declare(strict_types=1);

namespace SprutBillingApi\Public;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\UriTemplate\UriTemplate;
use Psr\Http\Message\ResponseInterface;
use SprutBillingApi\TypeOperation\IntOperations;
use SprutBillingApi\TypeOperation\ArrayOperations;
use SprutBillingApi\TypeOperation\GetCatalogPricesResult200Operations;
use SprutBillingApi\TypeOperation\GetCatalogPricesResultDefaultOperations;


class SprutBillingApi {
  private int $timeout = 30;

  /**
   * Возвращает список элементов каталога с рассчитанной ценой
   * @param int $companyId
   * @param int|null $counteragentId
   * @param CatalogPriceProductQuery[] $products
   * @return GetCatalogPricesResult200 | GetCatalogPricesResultDefault
   * @throws Exception
   */
  public function getCatalogPrices(
    int $companyId,
    ?int $counteragentId,
    array $products,
  ): GetCatalogPricesResult200|GetCatalogPricesResultDefault {
    $client = new Client([
                           'base_uri' => 'http://httpbin.org',
                           'timeout' => $this->timeout,
                         ]);

    $path = [];
    $path['companyId'] = IntOperations::encodeSimple($companyId);
    $query = [];
    $query['counteragentId'] = IntOperations::encodeSimple($counteragentId);
    $query['products'] = ArrayOperations::encodeSimple($products);
    $header = [];
    $coockie = [];
    $uri = UriTemplate::expand('/catalog-prices/company/{companyId}', $path);
    $response = $client->request(
      'POST', $uri,
      [
        RequestOptions::QUERY => $query,
        RequestOptions::HEADERS => $header,
        RequestOptions::COOKIES => $coockie,
      ]
    );
    $statusCode = $response->getStatusCode();
    if ($statusCode == 200) {
      return GetCatalogPricesResult200Operations::decodeJson($response->getBody());
    }
    return new GetCatalogPricesResultDefault($statusCode, ErrorOperations::decodeJson($response->getBody()));
  }

  public function getTimeout(): int {
    return $this->timeout;
  }

  public function setTimeout(int $timeout): void {
    $this->timeout = $timeout;
  }
}
