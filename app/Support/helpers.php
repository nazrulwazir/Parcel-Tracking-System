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
	                        'name'  => 'Post Laju Courier'
	                ],

	                '1' => [
	                        'value' => 'gdex',
	                        'name'  => 'GD Express Courier'
	                ],

	                '2' => [
	                        'value' => 'abxExpress',
	                        'name'  => 'Abx Express (Post Laju Courier)'
	                ],

	                '3' => [
	                        'value' => 'dhlExpress',
	                        'name'  => 'DHL Express Courier'
	                ],

	                '4' => [
	                        'value' => 'skynet',
	                        'name'  => 'SkyNet Express Courier'
	                ],

	            ];
    }
}