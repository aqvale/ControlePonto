<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login', ['uses' => 'Controller@login']);
Route::post('/login', ['as' => 'uses.login', 'uses' => 'DashboardController@auth']);
//Route::post('/login', ['as' => 'uses.login', 'uses' => 'DashboardController@index']);