<?php
namespace App\Services\GitHub;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

class Client
{
    protected PendingRequest $client;

    public function __construct()
    {
        $headers = [
            'Authorization' => 'token ' . config('github.token'),
        ];

        $this->client = Http::withHeaders($headers);
    }

    public function get(string $url, ?array $headers = []) : Response
    {
        $response = $this->client->get($url, $headers);
        return $response;
    }

}