<?php
/**
 * Конфигурации для интеграций со сторонними сервисами
 * @docs https://github.com/laravel/laravel/blob/11.x/config/services.php
 */

return [
    'dummy_json' => [
        'api_base_url' => env('DUMMY_API_BASE_URL', 'https://dummyjson.com'),
        'api_username' => env('DUMMY_API_USERNAME', ''),
        'api_password' => env('DUMMY_API_PASSWORD', ''),
    ]
];
