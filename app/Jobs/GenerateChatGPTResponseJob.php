<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\UseCases\ChatGPT\ChatGPT;

class GenerateChatGPTResponseJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected string $id;

    protected array $messages;

    /**
     * Create a new job instance.
     */
    public function __construct(string $id, array $messages)
    {
        $this->id = $id;
        $this->messages = $messages;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $chatGpt = new ChatGPT();
        $response = $chatGpt->requestChatResponse($this->messages);
    }
}
