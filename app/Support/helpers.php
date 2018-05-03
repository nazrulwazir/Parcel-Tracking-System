<?php

/*
 * list parcel
 * @return list parcel
 */
if (! function_exists('list_parcel')) {
    function list_parcel()
    {
        return [
	                '0' => [
	                        'value' => 'poslaju',
	                        'name'  => 'Post Laju Courier',
	                        'src'   => '1',
	                        'img'   => 'poslaju',
	                ],

	                '1' => [
	                        'value' => 'gdExpress',
	                        'name'  => 'GD Express Courier',
	                        'src'   => '1',
	                        'img'   => 'gdExpress',
	                ],

	                '2' => [
	                        'value' => 'abxExpress',
	                        'name'  => 'Abx Express (Post Laju Courier)',
	                        'src'   => '1',
	                        'img'   => 'abxExpress',
	                ],

	                '3' => [
	                        'value' => 'dhlExpress',
	                        'name'  => 'DHL Express Courier',
	                        'src'   => '1',
	                        'img'   => 'dhlExpress',
	                ],

	                '4' => [
	                        'value' => 'skynet',
	                        'name'  => 'SkyNet Express Courier',
	                        'src'   => '1',
	                        'img'   => 'skynet',
	                ],

	                '4' => [
	                        'value' => 'skynet',
	                        'name'  => 'SkyNet Express Courier',
	                        'src'   => '1',
	                        'img'   => 'skynet',
	                ],

	                '5' => [
	                        'value' => 'unknown',
	                        'name'  => 'Unknown (Not sure what courier)',
	                        'src'   => '0',
	                        'img'   => 'unknown',
	                ],

	            ];
    }
}
