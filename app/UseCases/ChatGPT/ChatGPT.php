<?php
namespace App\UseCases\ChatGPT;

use App\Services\OpenAI\Client as OpenAIClient;
use OpenAI\Responses\Chat\CreateResponse;
use Illuminate\Support\Facades\View;

class ChatGPT
{
    protected OpenAIClient $openAIClient;

    protected string $language;

    protected string $templateName = 'templates.prompts';

    public function __construct(string $language = 'ja')
    {
        $this->openAIClient = new OpenAIClient(config('OPENAI_API_KEY'));
        $this->language = $language;
    }

    public function getClient() : OpenAIClient
    {
        return $this->openAIClient;
    }

    public function getTemplatesWithSources(array $sources) : array
    {
        $templates = collect($sources)->map(function(string $source) {
            $view = View::make($this->templateName, ['source' => $source]);
            $renderedView = $view->render();
            return $renderedView;
        });
        
        return $templates->all();
    }

    public function requestChatResponse(array $messages) : CreateResponse
    {
        return $this->openAIClient->generateChatResponse($messages);
    }
}