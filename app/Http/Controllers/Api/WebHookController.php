<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\UseCases\GitHubPullRequest\Source as GitHubPullRequestSource;
use App\UseCases\ChatGPT\ChatGPT;

class WebHookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $githubPullRequestSource = new GitHubPullRequestSource($request->all());
        $sources = $githubPullRequestSource->getSources();

        $chatGpt = new ChatGPT();
        $templates = $chatGpt->getTemplatesBySources($sources);
        dd($templates);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
