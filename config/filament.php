<?php

return [
    'path' => 'admin',
    'domain' => null,
    'home_url' => '/',
    'brand' => 'Jewelry Store',
    'favicon' => null,
    'auth' => [
        'guard' => 'web',
        'pages' => [
            'login' => \Filament\Pages\Auth\Login::class,
        ],
    ],
    'layout' => [
        'sidebar' => [
            'is_collapsible_on_desktop' => true,
            'groups' => [
                'are_collapsible' => true,
            ],
            'width' => '250px',
            'collapsed_width' => '80px',
        ],
        'content' => [
            'max_content_width' => 'full',
        ],
    ],
    'theme' => [
        'colors' => [
            'primary' => [
                50 => '240, 249, 255',  // navy-50
                100 => '224, 242, 254', // navy-100
                200 => '186, 230, 253', // navy-200
                300 => '125, 211, 252', // navy-300
                400 => '56, 189, 248',  // navy-400
                500 => '14, 165, 233',  // navy-500
                600 => '2, 132, 199',   // navy-600
                700 => '13, 33, 71',    // navy-700
                800 => '6, 19, 50',     // navy-800
                900 => '2, 8, 29',      // navy-900
                950 => '1, 4, 14',      // navy-950
            ],
            'gray' => [
                50 => '249, 250, 251',
                100 => '243, 244, 246',
                200 => '229, 231, 235',
                300 => '209, 213, 219',
                400 => '156, 163, 175',
                500 => '107, 114, 128',
                600 => '75, 85, 99',
                700 => '55, 65, 81',
                800 => '31, 41, 55',
                900 => '17, 24, 39',
                950 => '3, 7, 18',
            ],
        ],
    ],
]; 