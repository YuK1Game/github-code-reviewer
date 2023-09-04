<?php
namespace App\Services\OpenAI;

use OpenAI;
use OpenAI\Client as OpenAIClient;
use OpenAI\Responses\Chat\CreateResponse;
use OpenAI\Responses\StreamResponse;

class Client
{
    protected OpenAIClient $openAIClient;

    public function __construct()
    {
        $this->openAIClient = OpenAI::client(config('openai.api_key'));
    }

    public function generateChatResponse(array $messages) : CreateResponse
    {
        $chatResponse = $this->openAIClient->chat()->create([
            'model' => config('openai.chatgpt.model'),
            'messages' => $messages,
        ]);

        return $chatResponse;
    }
}