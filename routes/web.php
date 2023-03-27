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
    return view('homepage');
})->name('homepage');

Route::get('/about', function () {
    return view('about');
})->name('about');

// Стандартная страница нового проекта Laravel
Route::get('/welcome', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Справочник Издателей
|--------------------------------------------------------------------------
*/

// Издатель - Список записей
Route::get(
	'/publisher/list',
	'App\Http\Controllers\PublisherController@list'
)->name('publisher-list');

// Издатель - Просмотр
Route::get(
	'/publisher/view/{id}', 
	'App\Http\Controllers\PublisherController@view'
)->name('publisher-view');

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
	'/publisher/del/{id}', 
	'App\Http\Controllers\PublisherController@del'
)->name('publisher-del');

/*
|--------------------------------------------------------------------------
| Справочник Артистов
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\ArtistController;

// Артист - Список записей - simplePaginate
Route::get('/artist/list-simple', [ArtistController::class, 'listSimple'])->name('artist-list-simple');

// Артист - Список записей - paginate
Route::get('/artist/list', [ArtistController::class, 'list'])->name('artist-list');

Route::get('/artist/add', [ArtistController::class, 'add'])->name('artist-add');
Route::post('/artist/save', [ArtistController::class, 'save'])->name('artist-save');
Route::get('/artist/edit/{id}', [ArtistController::class, 'edit'])->name('artist-edit');
Route::post('/artist/update/{id}', [ArtistController::class, 'update'])->name('artist-update');
Route::get('/artist/del/{id}', [ArtistController::class, 'del'])->name('artist-del');

/*
|--------------------------------------------------------------------------
| Диски
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\DiskController;

// Диски - Список записей
Route::get('/disks', [DiskController::class, 'disks'])->name('disks');
