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

    'paystack' => [
        'redirect' => env('PYS_REDIRECT_URL', 'http://127.0.0.1:8000/products'),
        'domain' => env('PYS_DOMAIN', 'https://api.paystack.co'),
        'public' => env('PYS_PUBLIC_KEY', 'pk_test_c06caf6bba471ec1592161aa1c1f5c3d20f1b3b0'),
        'secret' => env('PYS_SECRET_KEY', 'sk_test_78fc1f8442279593782d413af0fd07f645f36e82'),
    ],

];
