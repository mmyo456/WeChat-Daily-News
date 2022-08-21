<?php

require_once("./Curl.php");

class Levi_Gaode
{
    const KEY = '39ef17cf4a8314e7f949e0e05e3d4bd7';

    const URL_LIST = array(
        'getWeather' => 'https://restapi.amap.com/v3/weather/weatherInfo'
    );

    public static function getBaseWeather($abCode = '330302')
    {
        $params = [
            'key' => self::KEY,
            'city' => $abCode,
            'extensions' => 'base',
            'output' => 'JSON',
        ];
        $weatherInfo = Util_Curl::httpGet(self::URL_LIST['getWeather'], $params);

        return $weatherInfo['lives'][0];
    }

    public static function getAllWeather($abCode = '330302')
    {
        $params = [
            'key' => self::KEY,
            'city' => $abCode,
            'extensions' => 'all',
            'output' => 'JSON',
        ];
        $weatherInfo = Util_Curl::httpGet(self::URL_LIST['getWeather'], $params);

        return $weatherInfo['forecasts'];
    }
}