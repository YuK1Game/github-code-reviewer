<?php
namespace App\Services\GitHub\WebHooks;

use Illuminate\Support\Collection;

class PullRequest
{
    protected Collection $data;

    public function __construct(array $data)
    {
        $this->data = collect($data);
    }

    public function getPullRequestUrl() : ?string
    {
        return data_get($this->data, 'pull_request.url');
    }

    public function getPullRequestDiffUrl() : ?string
    {
        return data_get($this->data, 'pull_request.diff_url');
    }

}