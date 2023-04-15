<?php

namespace App\Helpers;

use GuzzleHttp\Client;

class ConsumeApi {

    private $method;
    private $url;

    public function __construct($method,$url)
    {
        $this->method = $method;
        $this->url = $url;
    }

    public function apiResource()
    {
        $client = new Client([
            'base_uri' =>  env('API_ENDPOINT')
            ]);

           $response = $client->request( $this->method,$this->url);

           $data = json_decode($response->getBody()->getContents());

           return $data;
    }
}