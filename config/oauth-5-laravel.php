<?php

return [

	/*
	|--------------------------------------------------------------------------
	| oAuth Config
	|--------------------------------------------------------------------------
	*/

	/**
	 * Storage
	 */
	'storage' => 'Session',

	/**
	 * Consumers
	 */
	'consumers' => [

		'Google' => [
			'client_id'     => '755152748058-p6h0ghkvbsk7uipkuq5ees7t14so07ot.apps.googleusercontent.com',
			'client_secret' => 'mLeVxUl4gpsIrp6yH4NRdlpY',
			'scope'         => ['userinfo_email', 'userinfo_profile'],
		],

	]

];