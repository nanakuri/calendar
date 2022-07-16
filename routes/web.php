<?php

use Illuminate\support\Facades\Route;
use App\Http\Controllers\ScheduleController;
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

Route::group(['middleware' => ['auth']], function(){
    
Route::get("/", 'ScheduleController@schedule')->middleware('auth');
Route::get('/menus', "ScheduleController@getAllMenus");
Route::post('/store/{date}', 'ScheduleController@store');
Route::get('/post/{date}', 'ScheduleController@date');
Route::get('/show/{menu}', 'ScheduleController@show');            



});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');