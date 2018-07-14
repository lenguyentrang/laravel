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


Route::get('/films',['as' => 'films.list', 'uses' =>  'FilmController@get']);
Route::get('/films/create', ['as' => 'films.create.get', 'uses' =>  'FilmController@createView']);
Route::get('/films/{slugFilmName}', ['as' => 'films.detail', 'uses' =>  'FilmController@detail']);
Route::post('/films/create', ['as' => 'films.create.post', 'uses' =>  'FilmController@create']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
