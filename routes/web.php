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

Route::get('/', 'PagesController@home');
Route::get('/about', 'AboutController@index');
Route::get('/portfolio', 'PortfolioController@index');

// Bagian students
Route::get('/students', 'StudentsController@index');
Route::get('students/create', 'StudentsController@create');
Route::get('/students/{student}', 'StudentsController@show');
Route::post('/students', 'StudentsController@store');
Route::delete('/students/{student}', 'StudentsController@destroy');

// bagian Mahasiswa
Route::get('/mahasiswa', 'PraktikumsController@index');
Route::get('/mahasiswa/create', 'PraktikumsController@create');
Route::get('/mahasiswa/{praktikum}', 'PraktikumsController@show');
Route::post('/mahasiswa', 'PraktikumsController@store');

Route::delete('/mahasiswa/{praktikum}', 'PraktikumsController@destroy');



