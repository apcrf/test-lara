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

///////////////////////////////////////////////////////////////////////////

Route::get('/', function () {
    return view('homepage');
})->name('homepage');

Route::get('/about', function () {
    return view('about');
})->name('about');

///////////////////////////////////////////////////////////////////////////

// Издатель - Добавление
Route::get('/publisher/add', function () {
    return view('publisher_add');
})->name('publisher-add');

// Издатель - Сохранение записи
/*
Route::post('/publisher/save', function () {
    //return "Okey";
    //return Request::all();
    return dd(Request::all());
})->name('publisher-save');
*/
// Издатель - Сохранение записи
Route::post('/publisher/save', 'App\Http\Controllers\PublisherController@save')->name('publisher-save');

// Издатель - Список записей
Route::get('/publisher/listing', 'App\Http\Controllers\PublisherController@listing')->name('publisher-listing');

// Издатель - Просмотр
Route::get(
	'/publisher/view/{id}', 
	'App\Http\Controllers\PublisherController@view'
)->name('publisher-view');

// Издатель - Правка
Route::get(
	'/publisher/edit/{id}', 
	'App\Http\Controllers\PublisherController@edit'
)->name('publisher-edit');

// Издатель - Сохранение правки
Route::post(
	'/publisher/update/{id}', 
	'App\Http\Controllers\PublisherController@update'
)->name('publisher-update');

// Издатель - Удаление
Route::get(
	'/publisher/delete/{id}', 
	'App\Http\Controllers\PublisherController@delete'
)->name('publisher-delete');

///////////////////////////////////////////////////////////////////////////

// Артист - Show list view
Route::get(
	'/artists',
	'App\Http\Controllers\ArtistController@index'
)->name('artist-index');

///////////////////////////////////////////////////////////////////////////

// Стандартная страница нового проекта Laravel
Route::get('/welcome', function () {
    return view('welcome');
});

///////////////////////////////////////////////////////////////////////////
