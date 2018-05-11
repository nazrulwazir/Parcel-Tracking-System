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
	                        'name'  => 'Post Laju',
	                        'src'   => '1',
	                        'img'   => 'poslaju',
	                ],

	                '1' => [
	                        'value' => 'gdExpress',
	                        'name'  => 'GD Express',
	                        'src'   => '1',
	                        'img'   => 'gdExpress',
	                ],

	                '2' => [
	                        'value' => 'abxExpress',
	                        'name'  => 'Abx Express',
	                        'src'   => '1',
	                        'img'   => 'abxExpress',
	                ],

	                '3' => [
	                        'value' => 'dhlExpress',
	                        'name'  => 'DHL Express',
	                        'src'   => '1',
	                        'img'   => 'dhlExpress',
	                ],

	                '4' => [
	                        'value' => 'skynet',
	                        'name'  => 'SkyNet Express',
	                        'src'   => '1',
	                        'img'   => 'skynet',
	                ],

	                '5' => [
	                        'value' => 'cityLink',
	                        'name'  => 'City Link Express',
	                        'src'   => '1',
	                        'img'   => 'cityLink',
	                ],

	                '6' => [
	                        'value' => 'fedEx',
	                        'name'  => 'FedEx Express',
	                        'src'   => '1',
	                        'img'   => 'fedEx',
	                ],

	                '7' => [
	                        'value' => 'lelExpress',
	                        'name'  => 'Lazada E-Logistic',
	                        'src'   => '1',
	                        'img'   => 'lelExpress',
	                ],

	                '8' => [
	                        'value' => 'unknown',
	                        'name'  => 'Unknown (Not sure what courier)',
	                        'src'   => '0',
	                        'img'   => 'unknown',
	                ],

	            ];
    }
}

/*
 * Date Format
 * @return date format
 */
if (! function_exists('date_conventer')) {
    function date_conventer($date)
    {	
    	return date('d M Y , h:i:s A', strtotime($date));
    }
}
