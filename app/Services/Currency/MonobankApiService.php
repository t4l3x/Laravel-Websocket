<?php

namespace App\Services\Currency;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use JsonException;


class MonobankApiService  implements CurrencyServiceInterface
{
    /**
     * @var string
     */
    private string $apiUrl;

    /**
     * @var Client
     */
    private Client $httpClient;

    /**
     * MonobankApiService constructor.
     *
     * @param string $apiUrl
     * @param Client $httpClient
     */
    public function __construct(string $apiUrl, Client $httpClient)
    {
        $this->apiUrl = $apiUrl;
        $this->httpClient = $httpClient;
    }

    /**
     * Get the current currency rates.
     *
     * @return array
     * @throws JsonException|GuzzleException
     */
    public function getCurrencyRates(): array
    {
        $response = $this->httpClient->get($this->apiUrl);
        return json_decode($response->getBody(), true, 512, JSON_THROW_ON_ERROR);
    }
}
