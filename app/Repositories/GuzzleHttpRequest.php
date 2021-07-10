<?php 

namespace App\Repositories;

use GuzzleHttp\Client;

class GuzzleHttpRequest
{
    protected $client;
    public function __construct(Client  $client)
    {
        $this->client = $client;

    } 

    protected function get($metod)
    {
        $response = $this->client->request('GET', $metod);
        //imprime el resultado
        // dd(json_decode($response->getBody()->getContents()));
       return json_decode($response->getBody()->getContents()); 
    }
    protected function post($metod, $param)
    {
        //dd($this->client);
        $response = $this->client->post( $metod, ['headers' => ['Content-Type' => 'application/json'],'body' => json_encode($param)]);
        //imprime el resultado
        // dd(json_decode($response->getBody()->getContents()));
       return json_decode($response->getBody()->getContents()); 
    }
}