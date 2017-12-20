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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/createUserDays', [
  'uses' => 'UserController@createDays',
  'as' => 'create.user.days',
  'middleware' => 'auth'
]);

Route::get('/calendar', [
  'uses' => 'DayController@show',
  'as' => 'days.show',
  'middleware' => 'auth'
]);

Route::post('/day.edit', [
  'uses' => 'DayController@editDay',
  'as' => 'day.edit',
  'middleware' => 'auth'
]);
