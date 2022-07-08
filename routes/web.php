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
Route::get('/create', "ScheduleController@create");
Route::post('/store', 'ScheduleController@store');
Route::get('/post/{date}', 'ScheduleController@date');
Route::post('/delete','ScheduleController@destroy');
Route::post('/postmenu', 'ScheduleController@postMenu');


});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');