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

    // 天気予報
    protected $weatherService;
    protected $weatherData;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
        $this->weatherData = $this->weatherService->getWeatherData();
    }
    // 天気予報ここまで

    public function __invoke(Request $request)
    {
        // ブレードバージョン
        return view('index');

        // Vue.jsバージョン
        /*
        return Inertia::render('Hello', [
           'weatherData' => $this->weatherData
        ]);
        */
    }
}
