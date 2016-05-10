<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
});

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function($api) {
	// Login
	$api->post('login', [
		'as' => 'login',
		'uses' => 'App\Http\Controllers\V1\LoginController@index'
	]);

	// All requests must be authorized
	$api->group([
			'middleware' => 'api.auth',
			'providers' => ['jwt'],
			'namespace' => 'App\Http\Controllers\V1'
		], function($api) {
			/**
			 * User resources
			 */
			$api->get('/users', 		'UserController@index');
			$api->post('/users', 		'UserController@store');
			$api->get('/users/{id}', 	'UserController@show');
			$api->put('/users/{id}', 	'UserController@update');
			$api->delete('/users/{id}', 'UserController@destroy');


	});
});
