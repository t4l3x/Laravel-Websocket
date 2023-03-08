<?php

namespace App\Services\Currency;

interface CurrencyServiceInterface
{
    public function getCurrencyRates(): array;
}
