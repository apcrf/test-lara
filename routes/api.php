<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

///////////////////////////////////////////////////////////////////////////

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

///////////////////////////////////////////////////////////////////////////

// http://test-lara/api/artists
// http://test-lara/api/artists/2
$controllerName = 'App\Http\Controllers\ArtistController';
Route::get('artists', $controllerName . '@index');
Route::get('artists/{id}', $controllerName . '@show');
Route::post('artists', $controllerName . '@store');
Route::put('artists/{id}', $controllerName . '@update');
Route::delete('artists/{id}', $controllerName . '@delete');

///////////////////////////////////////////////////////////////////////////
