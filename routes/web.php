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



Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'Role:admin']], function(){
Route::resource('/task', 'TasksController');
Route::resource('/customer', 'CustomerController');
Route::resource('/employee', 'EmployeeController');
Route::resource('/services', 'ServicesController');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::resource('/categories', 'CategoriesController');
Route::resource('/job', 'JobsController');
Route::get('/job-task' , 'JobsController@jobTask')->name('job.task');
Route::get('job-task-remove/{id}', 'JobsController@jobTasksRemove')->name('job.task.remove');
Route::get('job-task-edit-remove/{id}', 'JobsController@jobTasksEditRemove')->name('job.task.edit.remove');

});

Route::group(['prefix' => 'employee' , 'as' => 'employee.' , 'middleware' => ['auth' , 'Role:employee']],function(){
	Route::get('dashboard' , 'employee\TaskController@index')->name('dashboard');
	Route::get('/dashboard/pending/{id}' , 'employee\TaskController@pending')->name('pending');
	Route::get('/dashboard/completed/{id}' , 'employee\TaskController@completed')->name('completed');
	Route::get('/dashboard/emp-tasks/{id}' , 'employee\TaskController@showJobTasks')->name('tasks');
	
});



Route::get('/home', 'HomeController@index')->name('home');
