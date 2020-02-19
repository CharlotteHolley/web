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

/*
GET /deadlines (index)
GET /deadlines/create (create)
GET /deadline/1 (show)
POST /deadlines (store)
GET /deadline/1/edit (edit)
PATCH /deadlines/1 (update)
DELETE /deadlines/1 (destroy)
*/

Route::get ('/', 'PagesController@home');
Route::get ('/modules', 'PagesController@modules');
Route::get ('/rooms', 'PagesController@rooms');

Route::resource('/deadlines','deadlineController')->middleware('auth');

//Route::get ('/deadlines/', 'deadlineController@index');
//Route::get ('/deadlines/create', 'deadlineController@create');
//Route::post ('/deadlines', 'deadlineController@store');
//Route::get ('/deadlines/{deadline}','deadlineController@show');
//Route::get ('/deadlines/{deadline}/edit','deadlineController@edit');
//Route::patch ('/deadlines/{deadline}','deadlineController@show');
//Route::delete ('/deadlines/{deadline}','deadlineController@delete');

Route::post('/deadlines/{deadline}/tasks', 'ProjectTasksController@store');
//Route::patch('/tasks/{task}', 'ProjectTasksController@update');

Route::post('completed-tasks/{task}', 'CompletedTasksController@store');
Route::delete('completed-tasks/{task}', 'CompletedTasksController@destroy');

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/modules', function () {
    
  //  $module =[
   // 'Advanced Software Engineering',
  //  'Production Project',
  //  'Developing Mobile Applications',
   // 'Digital Security'
 //   ];
    
 //   return view('about', [
 //   'modules' => $module]);
//});

//Route::get('/contact', function () {
  //  return view('contact');
//});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
