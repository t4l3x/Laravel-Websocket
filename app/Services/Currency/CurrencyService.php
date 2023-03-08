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
     * @var WebSocketService
     */
    private \App\Services\WebSocketService $webSocketService;

    /**
     * CurrencyService constructor.
     *
     * @param MonobankApiService $monobankApiService
     * @param WebSocketService $webSocketService
     */
    public function __construct(MonobankApiService $monobankApiService, WebSocketService $webSocketService)
    {
        $this->monobankApiService = $monobankApiService;
        $this->webSocketService = $webSocketService;
    }

    /**
     * Get the current currency rates from cache or save it to cache for 5 the minutes.
     *
     * @return array
     */
    public function getCurrentRates(): array
    {
//        $this->webSocketService->broadcast('currency_rates_updated', 'test');
//        broadcast(new CurrencyUpdated($rates);
//        $cachedRates = Cache::get('monobank_currency_rates');
//
//        if ($cachedRates) {
//            return $cachedRates;
//        }

        $rates = $this->monobankApiService->getCurrencyRates();
//        $currencyObjects = [];
//
//        foreach ($rates as $currency) {
//            $currencyObjects[] = new Currency($currency['currencyCodeA'], $currency['rateBuy'], $currency['rateSell']);
//        }

        Cache::put('monobank_currency_rates', $rates, 5);

//
        event(new CurrencyUpdated($rates));

        return $rates;
    }
}
