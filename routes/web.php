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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/home');
})->middleware('auth');

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');


Route::group([

    'middleware' => ['auth'],

], function ($router) {

    Route::get('/home', 'HomeController@index');
    Route::get('/survei/new', 'HomeController@newSurveiGet');
    Route::post('/survei/new', 'HomeController@newSurveiPost');
    Route::post('/survei/edit', 'HomeController@editSurvei');
    Route::get('/survei/select/{uid_survei}', 'HomeController@selectSurvei');

    Route::get('/survei/start', 'HomeController@startSurvei');
    Route::get('/survei/delete', 'HomeController@hapusSurvei');
    Route::get('/survei/back', 'HomeController@kembaliSurvei');


    Route::get('/kuesioner/{idKues}', 'Kuesioner@index');
    Route::post('/kuesioner/{idKues}/addBarang', 'Kuesioner@addBarang');
    Route::post('/kuesioner/{idKues}/addKualitas', 'Kuesioner@addKualitas');
    Route::post('/kuesioner/{idKues}/action', 'Kuesioner@action');
    Route::post('/kuesioner/{idKues}/deleteBarang', 'Kuesioner@deleteBarang');
    Route::post('/kuesioner/{idKues}/deleteKualitas', 'Kuesioner@deleteKualitas');

    Route::get('/petugas', 'Petugas@index');
    Route::post('/petugas/addPetugas', 'Petugas@addPetugas');
    Route::post('/petugas/deletePetugas', 'Petugas@deletePetugas');
    Route::post('/petugas/ubahPetugas', 'Petugas@ubahPetugas');
    Route::post('/petugas/uploadPhoto', 'Petugas@uploadPhoto');
    Route::post('/petugas/getPetugas', 'Petugas@getPetugas');

    Route::get('/responden', 'Responden@index');
    Route::post('/responden/addResponden', 'Responden@addResponden');
    Route::post('/responden/deleteResponden', 'Responden@deleteResponden');
    Route::post('/responden/ubahResponden', 'Responden@ubahResponden');
    Route::post('/responden/uploadPhoto', 'Responden@uploadPhoto');
    Route::post('/responden/getResponden', 'Responden@getResponden');
    Route::post('/responden/getPetugas', 'Responden@getPetugas');

    Route::get('/pemeriksaan', 'Pemeriksa@index');
    Route::get('/progress', 'Progress@index');
});


