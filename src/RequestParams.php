<?php

namespace kirillreutski\PolygonStocksApi; 

class RequestParams {
    public string $ticker;
    public string $timespan;
    public int    $length;
    public string $series_type;
    public int    $limit;
    public string $order;
    public static array $timespans = ['day', 'hour', 'minute', 'week', 'month'];
    public static array $series = ['close', 'open', 'high','low'];
    public function __construct(
        string $ticker, 
        string $timespan = 'day', 
        int $length = 14, 
        string $series_type = 'close', 
        int $limit = 2, 
        string $order = 'desc'){


            $this->ticker = $ticker; 
            $this->timespan = $timespan; 
            $this->length = $length; 
            $this->series_type = $series_type; 
            $this->limit = $limit; 
            $this->order = $order; 

            if (in_array($this->timespan, static::$timespans) === false) {
                $this->timespan = 'day';
            }

            if (in_array($this->series_type, static::$series) === false) {
                $this->timespan = 'close';
            }
            
        }
}