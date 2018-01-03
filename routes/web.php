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
} )->name( 'root' );

//Route::get('/example', 'ExampleController@index')->name('example');


Route::resource( '/example', 'ExampleController' );


Route::resource( '/author', 'AuthorController' );
//Route::resource( '/book', 'BookController' );
Route::resource( '/publisher', 'PublisherController' );
Auth::routes();

Route::get( '/home', 'HomeController@index' )->name( 'home' );


Route::group( [ 'prefix' => 'book' ], function () {

	Route::get( '/', 'BookController@index' )
	     ->name( 'book.index' )
	     ->middleware( 'auth' );
	Route::get( '/create', 'BookController@create' )
	     ->name( 'book.create' )
	     ->middleware( 'can:create-book' );
	Route::post( '/', 'BookController@store' )
	     ->name( 'book.store' )
	     ->middleware( 'can:create-book' );
	Route::get( '/{book}', 'BookController@show' )
	     ->name( 'book.show' )
	     ->middleware( 'auth' );
	Route::get( '/{book}/edit', 'BookController@edit' )
	     ->name( 'book.edit' )
	     ->middleware( 'can:update-book,book' );
	Route::put( '/{book}', 'BookController@update' )
	     ->name( 'book.update' )
	     ->middleware( 'can:update-book,book' );
	Route::delete( '/{book}', 'BookController@destroy' )
	     ->name( 'book.destroy' )
	     ->middleware( 'can:destroy-book' );
} );


//| web                                          |
//|        | GET|HEAD  | book                         | book.index           | App\Http\Controllers\BookController@index                              | web                                          |
//|        | POST      | book                         | book.store           | App\Http\Controllers\BookController@store                              | web                                          |
//|        | GET|HEAD  | book/create                  | book.create          | App\Http\Controllers\BookController@create                             | web                                          |
//|        | GET|HEAD  | book/{book}                  | book.show            | App\Http\Controllers\BookController@show                               | web                                          |
//|        | PUT|PATCH | book/{book}                  | book.update          | App\Http\Controllers\BookController@update                             | web                                          |
//|        | DELETE    | book/{book}                  | book.destroy         | App\Http\Controllers\BookController@destroy                            | web                                          |
//|        | GET|HEAD  | book/{book}/edit             | book.edit            | App\Http\Controllers\BookController@edit                               | web                                          |
