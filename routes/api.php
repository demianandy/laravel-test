<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EpisodesController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/episodes', [EpisodesController::class, "showEpisodes"]);
Route::get('/characters', [EpisodesController::class, "showCharacters"]);
Route::get('/quotes', [EpisodesController::class, "showQuotes"]);
Route::get('/episode/{id}', [EpisodesController::class, "showEpisode"]);
Route::get('/character/{id}', [EpisodesController::class, "showCharacter"]);
Route::get('/quote/{id}', [EpisodesController::class, "showQuote"]);
Route::get('/characters/random', [EpisodesController::class, "randomCharacter"]);