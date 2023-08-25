<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebHookController extends Controller
{
    public function handle(Request $request)
    {
        // ログの出力
        logger()->debug($request->all());
    }
}
