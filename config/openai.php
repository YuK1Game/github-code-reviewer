<?php

return [

    'openai' => [
        'api_key' => env('OPENAI_API_KEY'),
    ],

    'chatgpt' => [
        'model' => env('CHATGPT_MODEL', 'gpt-4'),
    ],

];