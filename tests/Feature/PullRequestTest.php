<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PullRequestTest extends TestCase
{
    public function testWebhookEndpoint()
    {
        $headers = [
            'Accept' => '*/*',
            'content-type' => 'application/json',
        ];
    
        $payload = json_decode(file_get_contents(storage_path('test/pullrequest.json')), true);
    
        $response = $this->postJson('/api/webhook', $payload, $headers);
    
        // 応答のアサーション
        $response->assertStatus(200);
    }
    
}
