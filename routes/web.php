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

Route::get('/', 'HomeController@index');
Route::get('/login', 'Auth\LoginController@index')->name('login');
Route::get('/logout', 'Auth\LoginController@logout');
Route::post('/login', 'Auth\LoginController@check_login');

Route::middleware(['auth'])->group(function () {
  Route::get('/dashboard', 'DashboardController@index');
  Route::get('/assignments/list', 'AssignmentsController@list');
  Route::get('/calendar', 'CalendarController@index');
  Route::get('/calendar/events', 'CalendarController@events');
  Route::get('/upcoming', 'UpcomingController@index');

  Route::get('/contacts/{id?}', 'ContactsController@index')->where('id', '[0-9]+');
  Route::get('/contacts/list', 'ContactsController@list');

  Route::get('/messages/{talkingTo}', 'ChatController@fetch')->where('talkingTo', '[0-9]+');
  Route::post('/messages', 'ChatController@send');
  Route::post('/messages/seen', 'ChatController@seen');
  Route::get('/messages/unread', 'ChatController@unread');

  Route::get('/students', 'ContactsController@index');
  Route::get('/students/list', 'ContactsController@list');

  Route::get('/lessons/list', 'LessonsController@list');

  Route::get('/resources', 'ResourceController@index');
  Route::get('/resources/list', 'ResourceController@list');
  Route::post('/resources', 'ResourceController@store');
  Route::post('/resources/{id}/students', 'ResourceController@add_student');

  Route::get('/subjects/list', 'SubjectsController@list');  
  Route::post('/subjects', 'SubjectsController@create');

  Route::get('/submissions', 'SubmissionsController@index');
  Route::get('/submissions/progress', 'SubmissionsController@progress');  
  Route::post('/submissions', 'SubmissionsController@create');
  Route::get('/submissions/list', 'SubmissionsController@list');

  Route::post('/lessons', 'LessonsController@create');

  Route::post('/notifications/clear', 'NotificationsController@clear');
  Route::get('/notifications/{type}', 'NotificationsController@index');

  Route::get('/feedback/{submission}', 'FeedbackController@index');
  Route::get('/feedback/{submission}/list', 'FeedbackController@list');
  Route::post('/feedback/{submission}', 'FeedbackController@save');
  Route::get('/feedback/{id}/pages', 'FeedbackController@pages');
  Route::post('/feedback/{submission}/finish', 'FeedbackController@finish');
});


