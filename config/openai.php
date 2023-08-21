<?php

return [

    'api_key' => env('OPENAI_API_KEY'),

    'chatgpt' => [
        'model' => env('CHATGPT_MODEL', 'gpt-4'),
        'messages' => [
            'rules' => [
                'Is the code readable?',
                'Is the existing framework\'s functionality being utilized to its fullest extent?',
                'Does the code contain any sensitive information that should not be made public?',
                'Does the code include any potential sources of bugs?',
            ],
        ],
    ],

];