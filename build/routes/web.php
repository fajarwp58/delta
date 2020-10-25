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

Route::group(['prefix' => 'home'], function () {
    Route::get('/', 'DashboardController@index')->name('home');
    Route::get('jenis', 'DashboardController@alljenis');
});

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

    Route::group(['prefix' => 'booking'], function () {
        Route::get('databooking', 'BookingController@dataBooking')->name('databooking');
        Route::get('databooking/data', 'BookingController@data');
        Route::post('databooking/update/{id}', 'BookingController@update');
        Route::get('databooking/delete2/{id}', 'BookingController@delete2');
        Route::get('databooking/listwaktu', 'BookingController@listwaktu');
    });


});

Route::group(['middleware' => ['auth', 'roles'], 'roles' => ['Dokter']], function () {

    Route::group(['prefix' => 'penyakit'], function () {
        Route::get('/', 'PenyakitController@index')->name('penyakit');
        Route::get('data', 'PenyakitController@data');
        Route::post('create', 'PenyakitController@create');
        Route::post('update/{id}', 'PenyakitController@update');
        Route::get('delete/{id}', 'PenyakitController@delete');
        Route::get('listjenispenyakit', 'PenyakitController@listjenispenyakit');
    });

    Route::group(['prefix' => 'obat'], function () {
        Route::get('/', 'ObatController@index')->name('obat');
        Route::get('data', 'ObatController@data');
        Route::post('create', 'ObatController@create');
        Route::post('update/{id}', 'ObatController@update');
        Route::get('delete/{id}', 'ObatController@delete');
    });

    Route::group(['prefix' => 'layanan'], function () {
        Route::get('/', 'LayananController@index')->name('layanan');
        Route::get('data', 'LayananController@data');
        Route::post('create', 'LayananController@create');
        Route::post('update/{id}', 'LayananController@update');
        Route::get('delete/{id}', 'LayananController@delete');
        Route::get('listpenyakit', 'LayananController@listpenyakit');
    });

    Route::group(['prefix' => 'rekammedis'], function () {
        Route::get('/', 'RekammedisController@index')->name('rekammedis');
        Route::get('datahewan', 'RekammedisController@datahewan');
        Route::get('data', 'RekammedisController@data');
        Route::get('view/{id}', 'RekammedisController@view');
        Route::get('addrekammedis/{id}', 'RekammedisController@addrekammedis');
        Route::post('create', 'RekammedisController@create');
        Route::post('update/{id}', 'RekammedisController@update');
        Route::get('delete/{id}', 'RekammedisController@delete');
    });

    Route::group(['prefix' => 'dokterlayanan'], function () {
        Route::get('/', 'TransaksilayananController@index')->name('dokterlayanan');
        Route::get('dataLayanan', 'TransaksilayananController@dataLayanan');
        Route::get('dataKeranjang', 'TransaksilayananController@dataKeranjang');
        Route::post('store', 'TransaksilayananController@store');
        Route::post('update', 'TransaksilayananController@update');
        Route::get('delete/{id}', 'TransaksilayananController@delete');
    });

    Route::group(['prefix' => 'dokterobat'], function () {
        Route::get('/', 'TransaksiobatController@index')->name('dokterobat');
        Route::get('dataObat', 'TransaksiobatController@dataObat');
        Route::get('dataKeranjang', 'TransaksiobatController@dataKeranjang');
        Route::post('store', 'TransaksiobatController@store');
        Route::post('update', 'TransaksiobatController@update');
        Route::post('carapakai/{id}', 'TransaksiobatController@carapakai');
        Route::get('delete/{id}', 'TransaksiobatController@delete');
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

    Route::group(['prefix' => 'booking'], function () {
        Route::get('/', 'BookingController@index')->name('booking');
        Route::get('addjadwal/{id}', 'BookingController@addbooking');
        Route::get('listhewan', 'BookingController@listhewan');
        //Route::get('data', 'BookingController@data');
        Route::post('create', 'BookingController@create');
        //Route::post('update/{id}', 'BookingController@update');
        //Route::get('delete/{id}', 'BookingController@delete');
        Route::get('databookinguser', 'BookingController@databookingUser')->name('databookinguser');;
        Route::get('databooking/dataUser', 'BookingController@dataUser');
        Route::get('databooking/delete/{id}', 'BookingController@delete');
    });

    Route::group(['prefix' => 'historytransaksi'], function () {
        Route::get('/', 'HistoryController@index')->name('historytransaksi');
    });


});

Route::group(['middleware' => ['auth', 'roles'], 'roles' => ['Dokter','Pasien']], function () {

    Route::group(['prefix' => 'contacts'], function () {
        Route::get('/chat', 'ContactsController@index')->name('chat');
        Route::get('/', 'ContactsController@get');
        Route::get('/conversation/{id}', 'ContactsController@getMessagesFor');
        Route::post('/conversation/send', 'ContactsController@send');
    });

});

Route::group(['middleware' => ['auth', 'roles'], 'roles' => ['Admin','Dokter','Pasien']], function () {
    Route::group(['prefix' => 'transaksilainnya'], function () {
        Route::get('/', 'TransaksilainnyaController@index')->name('transaksilainnya');
        Route::get('download', 'TransaksilainnyaController@download')->name('downloadlaporan');
        Route::post('download', 'TransaksilainnyaController@refresh')->name('laporan.refresh');
        Route::get('download/laporan/data/{awal}/{akhir}', 'TransaksilainnyaController@listData')->name('laporan.data');
        Route::get('download/laporan/pdf/{awal}/{akhir}', 'TransaksilainnyaController@exportPDF');
        Route::get('data', 'TransaksilainnyaController@data');
        Route::get('dataHistory', 'TransaksilainnyaController@dataHistory');
        Route::get('create', 'TransaksilainnyaController@create');
        Route::post('update/{id}', 'TransaksilainnyaController@update');
        Route::get('delete/{id}', 'TransaksilainnyaController@delete');
        Route::get('cetak/{id}', 'TransaksilainnyaController@cetak');
    });

});
