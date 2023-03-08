<?php

namespace App\Services\Currency;

use GuzzleHttp\Client;


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
     */
    public function getCurrencyRates(): array
    {
        $cv = '[
        {
            "currencyCodeA": 840,
            "currencyCodeB": 980,
            "date": 1677880874,
            "rateBuy": 36.65,
            "rateCross": 0,
            "rateSell": 37.4406
        },
        {
            "currencyCodeA": 978,
            "currencyCodeB": 980,
            "date": 1677913207,
            "rateBuy": 39,
            "rateCross": 0,
            "rateSell": 40
        },
        {
            "currencyCodeA": 978,
            "currencyCodeB": 840,
            "date": 1677880874,
            "rateBuy": 1.054,
            "rateCross": 0,
            "rateSell": 1.069
        }
    ]';
        $currencyRates = json_decode($cv, true, 512, JSON_THROW_ON_ERROR);

//        $currencyObjects = [];
//        foreach ($currencyRates as $currency) {
//            $currencyObjects[] = new Currency(
//                $currency['currencyCodeA'],
//                $currency['rateBuy'],
//                $currency['rateSell']
//            );
//        }

        return $currencyRates;

        $response = $this->httpClient->get($this->apiUrl);
        return json_decode($response->getBody(), true, 512, JSON_THROW_ON_ERROR);
    }
}
