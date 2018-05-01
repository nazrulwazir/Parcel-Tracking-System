<?php


return [
    'header' => [
        'prefix' => env('API_HEADER_PREFIX', 'PosLajuTrackingSystem'),
        'accept' => 'application/vnd.' . env('API_HEADER_PREFIX', 'PosLajuTrackingSystem') . '.' . env('API_VERSION', 'v1') . '+json',
    ],
    'version' => env('API_VERSION', 'v1'),
];
