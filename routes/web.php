<?php

use Illuminate\Support\Facades\Route;

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
    return redirect('/global');
});

Route::group(['middleware' => 'admin'], function () {
    // Route Dashboard
    Route::get('/dashboard', 'AdminController@dashboard');

    Route::get('/covid', 'AdminController@covid');
    Route::get('/covid/create', 'AdminController@createCovid');
    Route::post('/covid', 'AdminController@storeCovid');
    Route::get('/covid/{id}/edit', 'AdminController@editCovid');
    Route::put('/covid/{id}', 'AdminController@updateCovid');
    Route::get('/covid/{id}', 'AdminController@destroyCovid');


    Route::get('/cegah', 'AdminController@cegah');
    Route::get('/cegah/create', 'AdminController@createCegah');
    Route::post('/cegah', 'AdminController@storeCegah');
    Route::get('/cegah/{id}/edit', 'AdminController@editCegah');
    Route::put('/cegah/{id}', 'AdminController@updateCegah');
    Route::get('/cegah/{id}', 'AdminController@destroyCegah');


    Route::get('/hospital', 'AdminController@hostpital');
    Route::get('/hospital/create', 'AdminController@createHostpital');
    Route::post('/hospital', 'AdminController@storeHostpital');
    Route::get('/hospital/{id}/edit', 'AdminController@editHostpital');
    Route::put('/hospital/{id}', 'AdminController@updateHostpital');
    Route::get('/hospital/{id}', 'AdminController@destroyHostpital');

    Route::get('/message/{id}', 'AdminController@destroyMessage');


});




// Route Covid-19
Route::get('/global', 'CovidController@global');
Route::get('/indonesia', 'CovidController@indonesia');
Route::get('/covid19', 'CovidController@covid19');
Route::get('/pencegahan', 'CovidController@pencegahan');
Route::get('/rumah-sakit', 'CovidController@hospital');
Route::post('/message', 'CovidController@message');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
