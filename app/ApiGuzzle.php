<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class ApiGuzzle extends Model
{
    //
    public function getGuzzleRequest($url, $request)
    {
        $url = $url . '?' . $request;
        $response = Http::get($url);
        return $response->body();
    }

    public function postGuzzleRequest($url, $request)
    {
        $client = new \GuzzleHttp\Client();
        $request = $client->post($url,  ['body'=>$request]);
        $response = $request->send();
        return $response;
    }
}
