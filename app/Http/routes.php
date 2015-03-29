<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

#Route::get('/', 'WelcomeController@index');
Route::any('admin', 'AdminController@test');
Route::any('/', 'AppController@index');
Route::group(['prefix'=>'modules','middleware' => 'Server'], function()
{//prefix 'modules' start
Route::group(['prefix'=>'V1'], function()
{//prefix 'V1' start

Route::group(['prefix'=>'HR'], function()
{//prefix 'HR' start

Route::post('login','HrController@postLogin');

});//prefix 'HR' end

Route::group(['prefix'=>'UI','middleware' => 'User'], function()
{//prefix 'UI' start

Route::get('cp','UIController@index');

});//prefix 'UI' end



});//prefix 'V1' end
});//prefix 'modules' end