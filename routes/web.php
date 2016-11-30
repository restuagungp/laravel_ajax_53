<?php

use App\Kendaraan;
use Illuminate\Support\Facades\Input;


Route::get('/', function () {
    return view('welcome');
});


//CRUD
Route::resource('kendaraan', 'KendaraanController');
	Route::post ('kendaraan/search', 'KendaraanController@search' );


//CRUD-AJAX-MODAL
Route::resource('kendaraan-ajax-modal', 'KendaraanAjaxModalController');
	Route::post ('additem-ajax-modal', 'KendaraanAjaxModalController@addItem' );
	Route::post ('edititem-ajax-modal', 'KendaraanAjaxModalController@editItem' );
	Route::post ('deleteitem-ajax-modal', 'KendaraanAjaxModalController@deleteItem' );
	Route::get('searchitem-ajax-modal','KendaraanAjaxModalController@search');


//CRUD-AJAX-SHOW-HIDE
Route::resource('kendaraan-ajax-show', 'KendaraanAjaxShowController');
	Route::get('login', 'KendaraanAjaxShowController@formlogin');
	Route::get('getlogin','KendaraanAjaxShowController@getlogin');
	Route::post ('additem-ajax-show', 'KendaraanAjaxShowController@addItem');
	Route::post ('edititem-ajax-show', 'KendaraanAjaxShowController@editItem');
	Route::post ('deleteitem-ajax-show', 'KendaraanAjaxShowController@deleteItem');
	Route::get ('search-ajax-show', 'KendaraanAjaxShowController@getkendaraan_info_by_search');


//GENERATE PDF
Route::get ('pdf-kendaraan', 'PdfController@get_kendaraan_pdf');