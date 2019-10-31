<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//testing
Route::get(‘guzzle’, function () {
	//echo '<pre>'; // Use this for JSON or ARRAY purposes
	$client = new \GuzzleHttp\Client();
	$request = $client->request('GET', 'https://www.google.co.in');
	print_r($request->getBody()->getContents());
});