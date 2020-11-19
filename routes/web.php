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

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('login');
});


//Route::get('/', 'MonitorController@login');

Route::get('google', function (){
    return view('googleAuth');
});
// temper
Route::get('auth/google', 'LoginController@redirectToGoogle');
//Route::get('auth/google', 'LoginController@index');
// temper end
Route::get('auth/google/callback', 'LoginController@handleGoogleCallback');

//Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

Route::get('monitor', 'MonitorController@index');

Route::get('login', function () {
    return view('login');
});

Route::get('login', [ 'as' => 'login', 'uses' => 'LoginController@login']);

//Route::get('select', 'SelectController@index');
Route::get('setting', 'SettingController@index');
Route::post('select/check', 'SelectController@check');
//Route::post('monitor/printers', 'MonitorController@printers');
//Route::post('monitor/delete', 'MonitorController@delete');
Route::post('monitor/status', 'MonitorController@status');
Route::post('monitor/image', 'MonitorController@getImage');
Route::post('upload/image', 'UploadController@setImage');

Route::post('setting/add', 'SettingController@add');
Route::post('setting/update', 'SettingController@update');
Route::post('setting/delete', 'SettingController@delete');

Route::get('download/overview', 'DownloadController@index');
Route::get('download/currentVersion', 'DownloadController@currentVersion');
Route::get('download/currentGELVersion', 'DownloadController@currentGELVersion');

Route::get('download/currentSurferBuddyVersion', 'DownloadController@currentSurferBuddyVersion');
Route::get('download/currentSurferBuddyUrl', 'DownloadController@currentSurferBuddyUrl');
Route::get('download/SurferBuddy', 'DownloadController@downloadSurferBuddy');
Route::get('download/currentSurferFullInfo', 'DownloadController@currentSurferFullInfo');

Route::get('download/currentRepetrelVersion', 'DownloadController@currentRepetrelVersion');
Route::get('download/currentRepetrelUrl', 'DownloadController@currentRepetrelUrl');
Route::get('download/Repetrel', 'DownloadController@downloadRepetrel');
Route::get('download/currentRepetrelFullInfo', 'DownloadController@currentRepetrelFullInfo');
