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

  // kendala
  Route::get('/dashboard/kendala', 'KendalaController@kendala')->name('dashboard-kendala');
  Route::post('/dashboard/kendala/create', 'KendalaController@create')->name('create-kendala');
  Route::get('/dashboard/kendala/edit/{id}', 'KendalaController@editkendala')->name('edit-kendala');
  Route::post('/dashboard/kendala/update/{id}', 'KendalaController@updatekendala')->name('update-kendala');
  Route::get('/dashboard/kendala/hapus/{id}', 'TanamanController@hapuskendala')->name('hapus-kendala');
  Route::get('/dashboard/hasil', 'KendalaController@hasil')->name('dashboard-hasil');
  
  // tanaman
  Route::get('/dashboard/tanaman', 'TanamanController@tanaman')->name('dashboard-tanaman');
  Route::post('/dashboard/tanaman/create', 'TanamanController@create')->name('create-tanaman');
  Route::get('/dashboard/tanaman/detail/{tanaman}', 'TanamanController@detailtanaman')->name('dashboard-tanaman-detail');
  Route::get('/dashboard/tanaman/edit/{id}', 'TanamanController@edittanaman')->name('edit-tanaman');
  Route::post('/dashboard/tanaman/update/{id}', 'TanamanController@updatetanaman')->name('update-tanaman');
  Route::get('/dashboard/tanaman/hapus/{id}', 'TanamanController@hapustanaman')->name('hapus-tanaman');

  // Penjadwalan
  // Route::get('/dashboard/penjadwalan', function () {
  //     return view('dashboard.penjadwalan');
  // });
  Route::get('dashboard/penjadwalan', 'PenjadwalanController@index')->name('dashboard-penjadwalan');
  // Route::get('/dashboard/penjadwalan/json', 'PenjadwalanController@list')->name('list-jadwal');
  Route::post('/dashboard/penjadwalan/create', 'PenjadwalanController@store')->name('dashboard-penjadwalan-store');
  Route::get('dashboard/penjadwalan/delete/{id}', 'PenjadwalanController@destroy')->name('dashboard-penjadwalan-hapus');

  // forum
  Route::get('/dashboard/forum', 'ForumController@index')->name('forum-index');
  Route::post('/dashboard/forum/create', 'ForumController@store')->name('forum-create');
  Route::get('/dashboard/forum/detail/{forum}', 'ForumController@detail')->name('forum-index-detail');
  Route::post('/dashboard/forum/detail/{forum}', 'ForumController@postKomentar')->name('forum-index-detail');
});
 

