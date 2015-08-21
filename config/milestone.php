<?php

return [

	/**
	 * How often should a milestone be created for the user?
	 * Values are exact numbers that will create a milestone
	 * Step is how often, for example: every 20 days
	 */
    'days' => [
    	'values' => [2,3,5,7,10,15],
    	'step' => 20
    ],

    'money' => [
    	'values' => [50,100],
    	'step' => 100
    ],

    'minutes' => [
    	'values' => [60],
    	'step' => 250
    ],

    'cigarettes' => [
    	'values' => [50],
    	'step' => 100
    ]
];