<?php
// SupabaseClient.php

namespace App;

use GuzzleHttp\Client;

class SupabaseClient
{
    private $client;
    private $url;
    private $key;

    public function __construct($url, $key)
    {
        $this->url = $url;
        $this->key = $key;
        $this->client = new Client();
    }

    public function fetchData($endpoint)
    {
        $response = $this->client->request('GET', $this->url . $endpoint, [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->key,
                'Content-Type' => 'application/json'
            ]
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function postData($endpoint, $data)
    {
        $response = $this->client->request('POST', $this->url . $endpoint, [
            'json' => $data,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->key,
                'Content-Type' => 'application/json'
            ]
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
