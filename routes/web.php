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

Route::get('/home', [
  'uses' => 'HomeController@index',
  'as' => 'show.home',
  'middleware' => 'auth'
]);

Route::get('/office', [
  'uses' => 'OfficeController@index',
  'as' => 'show.office',
  'middleware' => 'auth'
]);

Route::post('/createUserCalendar', [
  'uses' => 'CalendarController@createCalendar',
  'as' => 'create.calendar',
  'middleware' => 'auth'
]);

Route::get('/calendar/{year}/{monthId}', [
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

/////////////////////

Route::get('/requestfriend/{friendId}', [
  'uses' => 'UserController@requestFriend',
  'as' => 'request.friend',
  'middleware' => 'auth'
]);

Route::get('/acceptfriend/{friendId}', [
  'uses' => 'UserController@acceptFriend',
  'as' => 'accept.friend',
  'middleware' => 'auth'
]);

Route::get('/removerequest/{friendId}', [
  'uses' => 'UserController@removeRequest',
  'as' => 'remove.request',
  'middleware' => 'auth'
]);
