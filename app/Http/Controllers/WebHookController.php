<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebHookController extends Controller
{
    public function handle(Request $request)
    {
        // コメントの追加テスト
        logger()->debug($request->all());
    }
}
