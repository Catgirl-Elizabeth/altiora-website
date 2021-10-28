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

Route::get('/', 'GeneralController@welcome')->name('welcome');

Auth::routes();


Route::get('/backend', 'HomeController@index')->name('home')->middleware('auth');

Route::get('/about-us', 'GeneralController@about')->name('about-us');
Route::get('/legal-notice', 'GeneralController@legal')->name('legal-notice');
Route::get('/privacy-policy', 'GeneralController@showPolicy')->name('privacy-policy');
Route::get('/contact', 'GeneralController@contact')->name('contact');
Route::get('/feedback', 'GeneralController@feedback')->name('contact.feedback');

Route::get('/applications', 'GeneralController@applications')->name('contact.applications');
Route::get('/applications/altiora', 'ApplicationController@altiora')->name('contact.applications.altiora');
Route::get('/applications/staff', 'ApplicationController@staff')->name('contact.applications.staff');
Route::get('/applications/team', 'ApplicationController@team')->name('contact.applications.team');

Route::post('/applications/altiora', 'ApplicationController@postAltiora')->name('applications.altiora.send');
Route::post('/applications/staff', 'ApplicationController@postStaff')->name('applications.staff.send');
Route::post('/applications/team', 'ApplicationController@postTeam')->name('applications.team.send');

Route::get('/staff', 'StaffController@index')->name('staff');
Route::get('/staff/create', 'StaffController@create')->name('staff.create')->middleware('auth');
Route::post('/staff', 'StaffController@store')->name('staff.store')->middleware('auth');
Route::post('/staff/{staff}', 'StaffController@show')->name('staff.show');

Route::get('/teams', 'TeamController@index')->name('teams');
Route::get('/teams/create', 'TeamController@create')->name('teams.create')->middleware('auth');
Route::post('/teams', 'TeamController@store')->name('teams.store')->middleware('auth');
Route::get('/teams/{team}', 'TeamController@show')->name('teams.show');
Route::get('/teams/{team}/edit', 'TeamController@edit')->name('teams.edit')->middleware('auth');
Route::put('/teams/{team}', 'TeamController@update')->name('teams.update')->middleware('auth');
Route::delete('/teams/{team}', 'TeamController@destroy')->name('teams.destroy')->middleware('auth');

Route::get('/documents', 'FileController@index')->name('downloads');
Route::get('/documents/upload', 'FileController@create')->name('downloads.create')->middleware('auth');
Route::post('/documents', 'FileController@store')->name('downloads.store')->middleware('auth');

Route::get('/wallpapers', 'WallpaperController@index')->name('wallpapers');
Route::get('/wallpapers/upload', 'WallpaperController@create')->name('wallpapers.create')->middleware('auth');
Route::post('/wallpapers', 'WallpaperController@store')->name('wallpapers.store')->middleware('auth');

Route::get('/make-user', 'HomeController@createUser')->name('user.create')->middleware('auth');
Route::get('/test', 'GeneralController@test')->name('test')->middleware('auth');
Route::get('/ban-appeal', 'GeneralController@banAppeal')->name('test');
Route::post('/ban-appeal', 'GeneralController@banAppeal')->name('test');

Route::redirect('/PrideCupHandbook', '/storage/uploads/1622581448_AltioraPrideCup.pdf');
