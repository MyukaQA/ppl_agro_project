<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'DashboardController@landing');

// dashboard
Route::get('/dashboard', 'DashboardController@index')->name('dashboard-user');
Route::get('/dashboard/tanaman', 'DashboardController@tanaman')->name('dashboard-tanaman');
Route::post('/dashboard/create', 'DashboardController@create');
Route::get('/dashboard/kendala', 'DashboardController@kendala')->name('dashboard-kendala');
Route::get('/dashboard/penjadwalan', 'DashboardController@penjadwalan')->name('dashboard-penjadwalan');
Route::get('/dashboard/hasil', 'DashboardController@hasil')->name('dashboard-hasil');

// forum
Route::get('/dashboard/forum', 'ForumController@index')->name('forum-index');
Route::post('/dashboard/forum/create', 'ForumController@store')->name('forum-create');
Route::get('/dashboard/forum/detail/{forum}', 'ForumController@detail')->name('forum-index-detail');
Route::post('/dashboard/forum/detail/{forum}', 'ForumController@postKomentar')->name('forum-index-detail');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
