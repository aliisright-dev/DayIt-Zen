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
  'uses' => 'DayController@showCalendar',
  'as' => 'days.show',
  'middleware' => 'auth'
]);

Route::post('/day.edit', [
  'uses' => 'DayController@editDay',
  'as' => 'day.edit',
  'middleware' => 'auth'
]);

Route::post('/task.add', [
  'uses' => 'TaskController@addTask',
  'as' => 'task.add',
  'middleware' => 'auth'
]);

Route::post('/task.delete', [
  'uses' => 'TaskController@deleteTask',
  'as' => 'task.delete',
  'middleware' => 'auth'
]);

Route::post('/task.modify', [
  'uses' => 'TaskController@modifyTask',
  'as' => 'task.modify',
  'middleware' => 'auth'
]);

Route::post('/task.status', [
  'uses' => 'TaskController@statusTask',
  'as' => 'task.status',
  'middleware' => 'auth'
]);

Route::get('/cardtitle.delete/{dayId}', [
  'uses' => 'DayController@deleteMessage',
  'as' => 'cardtitle.delete',
  'middleware' => 'auth'
]);


