<?php
namespace App\UseCases\ChatGPT;

use App\Services\OpenAI\Client as OpenAIClient;
use Illuminate\Support\Facades\View;

class ChatGPT
{
    protected OpenAIClient $openAIClient;

    protected string $language;

    protected View $view;

    public function __construct(string $language = 'ja')
    {
        $this->openAIClient = new OpenAIClient(config('OPENAI_API_KEY'));
        $this->language = $language;
        $this->view = View::make('templates.prompts');
    }

}