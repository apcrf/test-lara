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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*
|--------------------------------------------------------------------------
| REST API Артистов
| http://test-lara/api/artists
| http://test-lara/api/artists/2
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\ArtistController;

Route::get('/artists', [ArtistController::class, 'index']);
Route::get('/artists/{id}', [ArtistController::class, 'get']);
Route::post('/artists', [ArtistController::class, 'post']);
Route::put('/artists/{id}', [ArtistController::class, 'put']);
Route::delete('/artists/{id}', [ArtistController::class, 'delete']);
