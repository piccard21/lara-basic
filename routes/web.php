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

Route::get( '/', function () {
	return view( 'welcome' );
} )->name( 'home' );

//Route::get('/example', 'ExampleController@index')->name('example');


Route::resource( '/example', 'ExampleController' );



Route::resource( '/author', 'AuthorController' );
Route::resource( '/book', 'BookController' );
Route::resource( '/publisher', 'PublisherController' );