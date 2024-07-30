<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class WeatherController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $cities = [
            'tokyo' => '東京都',
            'osaka' => '大阪府',
            'okinawa' => '沖縄県',
            'akita' => '秋田県',
        ];
        $apiKey = env('OPENWEATHERMAP_API_KEY');
        $weatherData = [];

        foreach ($cities as $city => $japaneseName) {
            $response = Http::get('https://api.openweathermap.org/data/2.5/weather', [
                'q' => $city,
                'appid' => $apiKey,
                'units' => 'metric',
                'lang' => 'ja',
            ]);
            $weather = $response->json();
            $weather['japanese_name'] = $japaneseName;
            $weatherData[$city] = $weather;
        }

        // return $weatherData;
        return Inertia::render('Weather', [
           'weatherData' => $weatherData
        ]);
    }
}
