<?php

namespace App\Services;

use GuzzleHttp\Client;


class  HttpService
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function send_request($url, $method, $headers, $body = [])
    {

        $request = new \GuzzleHttp\Psr7\Request($method, $url, $headers);
        if (!$body) {

            return false;
        }


        $response =$this->client->send($request, [
            'json' => $body
        ]);


        if ($response->getStatusCode() != 200) {

            return false;
        }

        $responseData = json_decode($response->getBody(), true);
        return $responseData;

    }
}
