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
//TODO JWT TO APP
//serviços

//Rotas autentiticadas
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/team/index', 'TeamController@index')->name('team');
Route::post('/team/store', 'TeamController@store')->name('team.store');

Route::get('/game/index', 'GameController@index')->name('game');
Route::post('/game/store', 'GameController@store')->name('game.store');
Route::post('/game/games', 'GameController@getGames')->name('game.games');

Route::get('/statistics', 'StatisticsController@index')->name('statistics');