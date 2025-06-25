<?php

return [

<<<<<<< HEAD:config/cors.php
=======
    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

>>>>>>> 8c353f1d1edc9446e23d902a6fe9b1f1773e0b9b:vendor/laravel/framework/config/cors.php
    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'],

<<<<<<< HEAD:config/cors.php
    'allowed_origins' => ['http://localhost:5173'],
=======
    'allowed_origins' => ['*'],
>>>>>>> 8c353f1d1edc9446e23d902a6fe9b1f1773e0b9b:vendor/laravel/framework/config/cors.php

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

<<<<<<< HEAD:config/cors.php
    'supports_credentials' => true,
=======
    'supports_credentials' => false,
>>>>>>> 8c353f1d1edc9446e23d902a6fe9b1f1773e0b9b:vendor/laravel/framework/config/cors.php

];
