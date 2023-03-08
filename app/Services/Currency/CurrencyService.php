<?php

namespace App\Services\Currency;

use App\Events\CurrencyUpdated;
use App\Models\Currency;
use App\Services\WebSocketService;
use BeyondCode\LaravelWebSockets\Facades\WebSocketsRouter;
use Illuminate\Support\Facades\Cache;

class CurrencyService
{
    /**
     * @var CurrencyServiceInterface
     */
    private $monobankApiService;


    /**
     * CurrencyService constructor.
     *
     * @param MonobankApiService $monobankApiService
     */
    public function __construct(MonobankApiService $monobankApiService)
    {
        $this->monobankApiService = $monobankApiService;
    }

    /**
     * Get the current currency rates from cache or save it to cache for 5 the minutes.
     *
     * @return array
     */
    public function getCurrentRates(): array
    {
        $cachedRates = Cache::get('monobank_currency_rates');

        if ($cachedRates) {
            return $cachedRates;
        }

        $rates = $this->monobankApiService->getCurrencyRates();


        Cache::put('monobank_currency_rates', $rates, 300);

//
        event(new CurrencyUpdated($rates));

        return $rates;
    }
}
