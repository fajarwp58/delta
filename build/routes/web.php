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
    return redirect('login');
});

Auth::routes();
Route::get('logout', function(){
    Auth::logout();
    return redirect('login');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'user'], function () {
    Route::get('register', 'UserController@register');
    Route::post('create', 'UserController@create');
    Route::get('listrole', 'UserController@listrole');
});

Route::group(['middleware' => ['auth', 'roles'], 'roles' => ['Admin']], function () {

    Route::group(['prefix' => 'kelolauser'], function () {
        Route::get('/', 'UserController@index')->name('dokter');
        Route::get('pasien', 'UserController@pasien')->name('pasien');
        Route::get('data', 'UserController@data');
        Route::get('dataPasien', 'UserController@dataPasien');
        Route::post('printCard', 'UserController@printCard');
        Route::post('create', 'UserController@create');
        Route::post('update/{id}', 'UserController@update');
        Route::get('delete/{id}', 'UserController@delete');
        Route::get('listrole', 'UserController@listrole');
        Route::get('listrolePasien', 'UserController@listrolePasien');
    });

    Route::group(['prefix' => 'waktubooking'], function () {
        Route::get('/', 'WakbookingController@index')->name('waktubooking');
        Route::get('data', 'WakbookingController@data');
        Route::post('create', 'WakbookingController@create');
        Route::post('update/{id}', 'WakbookingController@update');
        Route::get('delete/{id}', 'WakbookingController@delete');
    });

    Route::group(['prefix' => 'kandang'], function () {
        Route::get('/', 'KandangController@index')->name('kandang');
        Route::get('data', 'KandangController@data');
        Route::post('create', 'KandangController@create');
        Route::get('delete/{id}', 'KandangController@delete');
        Route::post('cetak', 'KandangController@printBarcode');
    });


});

Route::group(['middleware' => ['auth', 'roles'], 'roles' => ['Pasien']], function () {

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', 'ProfileController@index')->name('profile');
        Route::get('dataPasien', 'ProfileController@dataPasien');
        Route::post('printCard', 'ProfileController@printCard');
        Route::post('update/{id}', 'ProfileController@update');
    });

    Route::group(['prefix' => 'hewan'], function () {
        Route::get('/', 'HewanController@index')->name('hewan');
        Route::get('data', 'HewanController@data');
        Route::post('create', 'HewanController@create');
        Route::post('update/{id}', 'HewanController@update');
        Route::get('delete/{id}', 'HewanController@delete');
        Route::get('listjenis', 'HewanController@listjenis');
    });


});
