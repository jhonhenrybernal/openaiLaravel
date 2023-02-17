<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

use Illuminate\Http\Request;

class aiController extends Controller
{
    public function index(){
        $guzzle = new \GuzzleHttp\Client([
            'verify' => false,
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . env('KEY_OPEIA', ''),
            ]],
        );
        $url = 'https://api.openai.com/v1/completions';
        
        $client = $guzzle->post($url, [
            'json' => [
                'prompt' => 'Say this is a test',
                'max_tokens' => 20,
                'temperature' => 0,
                'model' => 'text-davinci-002'
            ]
        ]);
        $result = json_decode($client->getBody()->getContents());
        return $result;
        
    }
}
