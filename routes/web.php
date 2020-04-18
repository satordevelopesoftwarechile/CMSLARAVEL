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
    return view('welcome');
});

//Router Auth
Route::get('/login', 'connectController@getLogin')->name('login');
//POST LOGIN
Route::post('/login', 'connectController@postLogin')->name('login');
//registrar
Route::get('/register', 'connectController@getRegister')->name('register');
//POST REGISTRAR
Route::post('/register', 'connectController@postRegister')->name('register');

//LOGOUT USER
Route::get('/logout','connectController@getLogout')->name('logout');
