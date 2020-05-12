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
    Route::get('register', function() { return view('auth.register'); });
    Route::post('create', 'UserController@create');
    Route::post('update/{id}', 'UserController@update');
    Route::post('delete/{id}', 'UserController@delete');
    Route::get('listrole', 'UserController@listrole');
    Route::get('listpangkat', 'UserController@listpangkat');

});
