<?php

return [
    'name' => 'ItkPrometheus',
    'redisconnection' => [
        'host' => env('DATABASE_REDIS_HOST', 'redis'),
        'password' => env('DATABASE_REDIS_PASSWORD', null),
        'username' => env('DATABASE_REDIS_USERNAME', null)
    ]
];
