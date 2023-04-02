<?php

namespace kirillreutski\PolygonStocksApi; 

use kirillreutski\PolygonStocksApi\RequestParams as RequestParams; 
class StocksDataClass {

    public static string $apiKey; 
    private static string $url = 'https://api.polygon.io/v1/';
    private static function getRSIUrl(){
        return static::$url . 'indicators/rsi/';
    }

    public static function getRSI(RequestParams $rp) {
        $url =  static::getRSIUrl() . $rp->ticker . 
                '?timespan=' . $rp->timespan . 
                (($rp->length !== null)      ? '&window=' . $rp->length              : '') . 
                (($rp->series_type !== null) ? '&series_type=' . $rp->series_type    : '') . 
                (($rp->order !== null)       ? '&order=' . $rp->order                : '') . 
                (($rp->limit !== null)       ? '&limit=' . $rp->limit                : '') . 
                '&apiKey=' . static::$apiKey; 

        return static::doGetRequest($url);
    }

    // public static function getRSI(string $ticker, string $timespan = 'day', int $length = 14, string $series_type = 'close', int $limit = 2, string $order = 'desc'){
    //     //indicators/rsi/AAPL?timespan=hour&window=14&series_type=close&expand_underlying=true&order=desc&limit=2&apiKey='; 
        
    //     $url = static::getRSIUrl() . $ticker . '?timespan=' . static::getTimespan($timespan) . '&window=' . $length . '&series_type=' . $series_type . '&order=' . $order . '&apiKey=' . static::$apiKey; 

    //     return static::doGetRequest($url);
    // }


    private static function doGetRequest(string $url, array $data = []){
        return json_decode(file_get_contents($url), true);
    }
}