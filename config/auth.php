<?php

return [

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'), // ⬅️ CAMBIAR a 'web'
        'passwords' => env('AUTH_PASSWORD_BROKER', 'psychologists'), // ⬅️ CAMBIAR
    ],

    'guards' => [
        'web' => [ // ⬅️ AGREGAR ESTE GUARD
            'driver' => 'session',
            'provider' => 'psychologists',
        ],
        
        'admin' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        
        'psychologist' => [
            'driver' => 'session',
            'provider' => 'psychologists',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
        'admins' => [
            'driver' => 'eloquent',
            'model' => env('AUTH_MODEL', App\Models\User::class),
        ],
        'psychologists' => [
            'driver' => 'eloquent',
            'model' => App\Models\Psychologist::class,
        ],
    ],

    'passwords' => [
        'users' => [ 
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
        
        'admins' => [
            'provider' => 'admins',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
        
        'psychologists' => [
            'provider' => 'psychologists',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];