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
  Route::post('/dashboard/create', 'DashboardController@create')->name('dashboard-user-create');
  

  // profile
  Route::get('/dashboard/profile', 'ProfileController@index')->name('dashboard-profile');
  Route::post('/dashboard/profile/update', 'ProfileController@updateUser')->name('dashboard-profile-update');

  // kendala
  Route::get('/dashboard/kendala', 'KendalaController@kendala')->name('dashboard-kendala');
  Route::post('/dashboard/kendala/create', 'KendalaController@create')->name('create-kendala');
  Route::get('/dashboard/kendala/edit/{id}', 'KendalaController@editkendala')->name('edit-kendala');
  Route::post('/dashboard/kendala/update/{id}', 'KendalaController@updatekendala')->name('update-kendala');
  Route::get('/dashboard/kendala/hapus/{id}', 'KendalaController@hapuskendala')->name('hapus-kendala');
  Route::get('/dashboard/hasil', 'KendalaController@hasil')->name('dashboard-kendala-hasil');
  Route::post('/dashboard/hasil', 'KendalaController@validasi')->name('dashboard-kendala-validasi');
  Route::post('/dashboard/kendala', 'KendalaController@back')->name('dashboard-kendala-kembali');

  // pengajuan kendala
  Route::get('/dashboard/kendala/pengajuan', 'PengajuanController@pengajuan')->name('dashboard-data-pengajuan');
  Route::post('/dashboard/forum/pengajuan', 'PengajuanController@store')->name('ajukan-kendala');
  
  // tanaman
  Route::get('/dashboard/tanaman', 'TanamanController@tanaman')->name('dashboard-tanaman');
  Route::post('/dashboard/tanaman/create', 'TanamanController@create')->name('create-tanaman');
  Route::get('/dashboard/tanaman/detail/{tanaman}', 'TanamanController@detailtanaman')->name('dashboard-tanaman-detail');
  Route::get('/dashboard/tanaman/edit/{id}', 'TanamanController@edittanaman')->name('edit-tanaman');
  Route::post('/dashboard/tanaman/update/{id}', 'TanamanController@updatetanaman')->name('update-tanaman');
  Route::get('/dashboard/tanaman/hapus/{id}', 'TanamanController@hapustanaman')->name('hapus-tanaman');

  //penjadwalan
  Route::get('dashboard/penjadwalan', 'PenjadwalanController@index')->name('dashboard-penjadwalan');
  Route::post('/dashboard/penjadwalan/create', 'PenjadwalanController@store')->name('dashboard-penjadwalan-store');
  Route::get('dashboard/penjadwalan/edit/{id}', 'PenjadwalanController@edit')->name('dashboard-penjadwalan-edit');
  Route::get('dashboard/penjadwalan/detail/{id}', 'PenjadwalanController@detail')->name('dashboard-penjadwalan-detail');
  Route::post('dashboard/penjadwalan/update/{id}', 'PenjadwalanController@update')->name('dashboard-penjadwalan-update');
  Route::get('dashboard/penjadwalan/delete/{id}', 'PenjadwalanController@destroy')->name('dashboard-penjadwalan-hapus');
  
  //catatan penjadwalan
  Route::post('/dashboard/penjadwalan/catatan/create', 'CatatanJadwalController@store')->name('catatan-penjadwalan-store');
  
  // forum
  Route::get('/dashboard/forum', 'ForumController@index')->name('forum-index');
  Route::get('/dashboard/list', 'ForumController@listforum')->name('forum-list');
  
  Route::get('/dashboard/forum/marketing', 'ForumController@chooseMarketing')->name('forum-choose-marketing');
  Route::get('/dashboard/forum/tanaman', 'ForumController@choosetanaman')->name('forum-choose-tanaman');
  Route::get('/dashboard/forum/hama', 'ForumController@chooseHama')->name('forum-choose-hama');


  Route::post('/dashboard/forum/create', 'ForumController@store')->name('forum-create');
  // Route::post('/dashboard/forum', 'ForumController@index')->name('forum-ajukan-kendala');
  Route::get('/dashboard/forum/detail/{forum}', 'ForumController@detail')->name('forum-index-detail');
  Route::post('/dashboard/forum/detail/{forum}', 'ForumController@postKomentar')->name('forum-index-detail');
  Route::get('/dashboard/forum/hapus/{id}', 'ForumController@hapusforum')->name('hapus-forum');
});
 

