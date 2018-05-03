<?php


return [
    'header' => [
        'prefix' => env('API_HEADER_PREFIX', 'ParcelTrackingSystem'),
        'accept' => 'application/vnd.' . env('API_HEADER_PREFIX', 'ParcelTrackingSystem') . '.' . env('API_VERSION', 'v1') . '+json',
    ],
    'version' => env('API_VERSION', 'v1'),
];
