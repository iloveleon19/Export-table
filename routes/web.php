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

Route::get('tasks', function () {
    return array("laravel", "vue", "axio");
});

Route::get('/profile/{id}', 'ProfileController@showID');
Route::get('/profile/list', 'ProfileController@list');

// 使用 resource method 以後，Laravel 會自動對應到相對的 action
Route::resource('data','DataController');