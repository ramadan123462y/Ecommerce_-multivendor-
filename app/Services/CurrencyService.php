<?php


namespace App\Services;

use App\Services\HttpService;



class CurrencyService
{
    public $http;


    public function __construct(HttpService  $Http)
    {
        $this->http = $Http;
    }



    public function Convert_Currency(string $from_currence, string $to_currence)
    {


        $response = $this->http->send_request(
            "https://api.freecurrencyapi.com/v1/latest",
            'get',
            [
                'apikey' =>env('Currency_apikey')
            ],
            [

                'base_currency' => $from_currence,
                'currencies' => $to_currence
            ]




        );
        return $response['data'][$to_currence];
    }
}
