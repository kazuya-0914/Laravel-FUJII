<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WeatherService;
use Inertia\Inertia;

class HelloController extends Controller
{
    /**
     * Handle the incoming request.
     */
    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function __invoke(Request $request)
    {
        // 天気予報
        $weatherData = $this->weatherService->getWeatherData();

        return Inertia::render('Hello', [
           'weatherData' => $weatherData
        ]);
    }
}
