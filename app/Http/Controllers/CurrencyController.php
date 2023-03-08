<?php

namespace App\Http\Controllers;

use App\Events\CurrencyUpdated;
use App\Services\Currency\CurrencyService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    /**
     * @var CurrencyService
     */
    private CurrencyService $currencyService;

    /**
     * CurrencyController constructor.
     *
     * @param CurrencyService $currencyService
     */
    public function __construct(CurrencyService $currencyService)
    {
        $this->currencyService = $currencyService;
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function show(Request $request): JsonResponse
    {
        $response = $this->currencyService->getCurrentRates();
        return response()->json($response);
    }
}
