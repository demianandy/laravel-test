<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\CharacterController;

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
    return view('welcom');
})->name('home');


Route::group(['prefix' => 'admin', 'namespace' => 'admin', 'middleware' => 'admin'], function(){
    Route::get('/', 'MainController@index')->name('admin.index');
    Route::resource('/characters', 'CharacterController');
    Route::resource('/quotes', 'QuoteController');
    Route::resource('/episodes', 'EpisodeController');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', 'UserController@create')->name('register.create');
    Route::post('/register', 'UserController@store')->name('register.store');
    
    Route::get('/login', 'UserController@loginForm')->name('login.create');
    Route::post('/login', 'UserController@login')->name('login');
});


Route::get('/logout', 'UserController@logout')->name('logout')->middleware('auth');


Route::get('/episodes', function () {
    return view('api/episodes');
});
Route::get('/characters', function () {
    return view('api/characters');
});
Route::get('/quotes', function () {
    return view('api/quotes');
});

Route::get('/episode/{id}', function ($id) {
    return view('api/episode', ['id' => $id]);
});
Route::get('/character/{id}', function () {
    return view('api/character');
});
Route::get('/quote/{id}', function () {
    return view('api/quote');
});
Route::get('/characters/random', function () {
    return view('api/character');
});
