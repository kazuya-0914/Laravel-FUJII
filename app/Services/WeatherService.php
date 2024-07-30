<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WeatherService
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = env('OPENWEATHERMAP_API_KEY');
    }

    public function getWeatherData()
    {
        // 天気情報の格納場所
        $weatherData = [];

        // 対象地域
        $cities = [
            'tokyo' => '東京都',
            'osaka' => '大阪府',
            'okinawa' => '沖縄県',
            'akita' => '秋田県',
        ];

        // OprnWeather API
        foreach ($cities as $city => $japaneseName) {
            $response = Http::get('https://api.openweathermap.org/data/2.5/weather', [
                'q' => $city,
                'appid' => $this->apiKey,
                'units' => 'metric',
                'lang' => 'ja',
            ]);
            $weather = $response->json();
            $weather['japanese_name'] = $japaneseName;
            $weatherData[$city] = $weather;
        }

        // AppServiceProvider.phpに戻す
        return $weatherData;
    }
}