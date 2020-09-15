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

Route::get('/','PageController@index');
Route::get('/homework','HomeworkController@index')->name('homework');
Route::post('/homework','HomeworkController@store');
Route::get('/history','HomeworkController@history')->name('history');


Route::get('/homework/{id}/{status}','HomeworkController@update_status');

// Add Rote to delete here
Route::get('/clear_homework/{id}','HomeworkController@clear')->name('clear_homework');

//Auth
//Middleware
