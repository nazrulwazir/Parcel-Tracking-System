<?php


return [
    'header' => [
        'prefix' => env('API_HEADER_PREFIX', 'MrsmBalikPulau'),
        'accept' => 'application/vnd.' . env('API_HEADER_PREFIX', 'MrsmBalikPulau') . '.' . env('API_VERSION', 'v1') . '+json',
    ],
    'version' => env('API_VERSION', 'v1'),
];
