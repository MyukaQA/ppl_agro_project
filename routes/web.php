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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'checkRole:admin,users']], function () {  
  // dashboard
  Route::get('/dashboard', 'DashboardController@index')->name('dashboard-user');
  Route::get('/dashboard/kendala', 'DashboardController@kendala')->name('dashboard-kendala');
  Route::get('/dashboard/hasil', 'DashboardController@hasil')->name('dashboard-hasil');
  
  // tanaman
  Route::get('/dashboard/tanaman', 'DashboardController@tanaman')->name('dashboard-tanaman');
  Route::post('/dashboard/tanaman/create', 'DashboardController@create')->name('create-tanaman');
  Route::get('/dashboard/tanaman/detail/{tanaman}', 'DashboardController@detailtanaman')->name('dashboard-tanaman-detail');
  Route::get('/dashboard/tanaman/edit/{id}', 'DashboardController@edittanaman')->name('edit-tanaman');
  Route::post('/dashboard/tanaman/update/{id}', 'DashboardController@updatetanaman')->name('update-tanaman');
  Route::get('/dashboard/tanaman/hapus/{id}', 'DashboardController@hapustanaman')->name('hapus-tanaman');

  // Penjadwalan
  Route::get('/dashboard/penjadwalan', 'PenjadwalanController@index')->name('dashboard-penjadwalan');
  
  // forum
  Route::get('/dashboard/forum', 'ForumController@index')->name('forum-index');
  Route::post('/dashboard/forum/create', 'ForumController@store')->name('forum-create');
  Route::get('/dashboard/forum/detail/{forum}', 'ForumController@detail')->name('forum-index-detail');
  Route::post('/dashboard/forum/detail/{forum}', 'ForumController@postKomentar')->name('forum-index-detail');
});


