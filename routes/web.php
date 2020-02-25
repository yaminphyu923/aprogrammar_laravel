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
Route::get('/home','HomeController@index');

Route::get('/php','HomeController@phpPage');

Route::get('/js','HomeController@jsPage');

Route::get('/','ReceipeController@index');


/*Route::get('/', function () {
    return view('home',[
    	'name' => "Home Page Template",
    ]);
});*/


/*Route::get('/js',function(){
	return view('js',[
		'data' => array(
			'lesson1' => 'This is js lesson1',
			'lesson2' => 'This is js lesson2',
			'lesson3' => 'This is js lesson3'
		)
	]);
});*/
