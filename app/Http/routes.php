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

Route::get('/', function () {
    return view('index');
});
Route::get('/albumes', function () {
    return view('albumes');
});
Route::get('/artistas', function () {
    return view('artistas');
});

//albumes routes
Route::get('/api/v1/album/{id?}', 'AlbumesController@index');
Route::post('/api/v1/album', 'AlbumesController@store');
Route::post('/api/v1/album/{id}', 'AlbumesController@update');
Route::delete('/api/v1/album/{id}', 'AlbumesController@destroy');
//artistas routes
Route::get('/api/v1/artista/{id?}', 'ArtistasController@index');
Route::post('/api/v1/artista', 'ArtistasController@store');
Route::post('/api/v1/artista/{id}', 'ArtistasController@update');
Route::delete('/api/v1/artista/{id}', 'ArtistasController@destroy');