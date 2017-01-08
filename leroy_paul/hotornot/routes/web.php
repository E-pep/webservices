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
    return view('auth/login');
});

Route::get('/home','HomeController@index')->middleware('auth');

Route::post('owncode/addcode','OwncodeController@addcode')->middleware('auth');

Route::get('owncode', 'OwncodeController@index')->middleware('auth');

Route::get('pic/{id}', 'OwncodeController@viewpic')->middleware('auth');

Route::post('newcode/like', 'NewcodeController@likecode')->middleware('auth');

Route::post('newcode/dislike', 'NewcodeController@dislikecode')->middleware('auth');

Route::get('newcode', 'NewcodeController@index')->middleware('auth');

Route::get('viewcode/{id}','ViewcodeController@index')->middleware('auth');

Route::get('top5','top5controller@index')->middleware('auth');









Auth::routes
();
