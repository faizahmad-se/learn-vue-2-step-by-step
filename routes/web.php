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
Route::get('skills', function () {
    return ['JS', 'Vue', 'PHP', 'HTML'];
});

Route::get('projects', 'ProjectsController@index');
Route::get('projects/all', 'ProjectsController@all');
Route::post('projects', 'ProjectsController@store');

Route::get('links', function () {
    return [
    	['text' => 'Documentation','href' => 'https://laravel.com/docs'],
    	['text' => 'Laracasts','href' => 'https://laracasts.com'],
    	['text' => 'News','href' => 'https://laravel-news.coms'],
    	['text' => 'GitHub','href' => 'https://github.com/laravel/laravel'],
    ];
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
