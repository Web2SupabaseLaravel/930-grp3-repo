<?php

return [

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    // إضافة Supabase (اختياري إذا ما استخدمته بـ config())
    'supabase' => [
        'url' => 'https://hmfximxdcfimmnsgiuwg.supabase.co',
        'key' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9...', // المفتاح كاملاً هنا
    ],

];
