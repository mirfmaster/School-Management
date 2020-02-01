<?php

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
	return view('auth.login');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::resource('kelas', 'KelasController', ['except' => ['show']]);
	Route::resource('mapel', 'MapelController', ['except' => ['show']]);
	Route::resource('ujian', 'UjianController', ['except' => ['show', 'index']]);
	Route::get('ujian/{kelas_id}/mapel', ['as' => 'ujian.mapel', 'uses' => 'UjianController@mapel']);
	Route::get('ujian/{kelas_id}/mapel/{mapel_id}', ['as' => 'ujian.index', 'uses' => 'UjianController@index']);
	Route::get('rapot/{kelas_id}', ['as' => 'ujian.rapot', 'uses' => 'UjianController@rapot']);
	Route::get('murid/create/{id}', ['as' => 'murid.create', 'uses' => 'MuridController@create']);
	Route::get('murid/{id}', ['as' => 'murid.index', 'uses' => 'MuridController@index']);
	Route::resource('murid', 'MuridController', ['except' => ['show', 'index']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});
