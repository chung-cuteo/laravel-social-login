<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'facebook' => [
        'client_id' => '1576402706119658',
        'client_secret' =>'a2f8bddf41368d633d4248a983ea22f0',
        'redirect' => '/auth/facebook/callback',
    ],

    'google' => [
        'client_id' => '1013245496820-n800jcqpu0284c332hal4d82geamt0bs.apps.googleusercontent.com',
        'client_secret' =>'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',
        'redirect' => '/auth/google/callback',
    ],

    'github' => [
        'client_id' => 'Iv1.5e426618d0c27b97',
        'client_secret' =>'8aae0dd7da4d522584f6e23d3f4a3b8ea32936ab',
        'redirect' => '/auth/github/callback',
    ],

];
