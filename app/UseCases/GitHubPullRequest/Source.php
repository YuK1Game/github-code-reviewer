<?php
namespace App\UseCases\GitHubPullRequest;

use App\Services\GitHub\WebHooks\PullRequest as PullRequest;
use App\Services\GitHub\Client as GitHubClient;
use Illuminate\View\View;

class Source
{
    protected GitHubClient $client;

    protected array $webhookPayload;

    public function __construct(array $webhookPayload)
    {
        $this->client = new GitHubClient();
        $this->webhookPayload = $webhookPayload;
    }

    public function getSources() : array
    {
        $pullRequest = new PullRequest($this->webhookPayload);
        $response = $this->client->get($pullRequest->getPullRequestDiffUrl());
        $source = $response->body();

        $files = collect(explode("\n", $source))->reduce(function ($carry, $line) {
            if (strpos($line, 'diff --git') === 0) {
                if ($carry['currentFile']->isNotEmpty()) {
                    $carry['files']->push($carry['currentFile']->implode("\n"));
                    $carry['currentFile'] = collect();
                }
            }
            $carry['currentFile']->push($line);
            return $carry;
        }, ['files' => collect(), 'currentFile' => collect()]);

        if ($files['currentFile']->isNotEmpty()) {
            $files['files']->push($files['currentFile']->implode("\n"));
        }

        return $files['files']->all();

    }

}