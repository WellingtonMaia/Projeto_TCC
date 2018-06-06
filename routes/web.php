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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// <-- projects -->
Route::get('/projects', 'ProjectController@index')->name('projects');
Route::get('/projects/create', 'ProjectController@create')->name('projects_create');
Route::post('/projects/store', 'ProjectController@store')->name('projects_store');
Route::get('/projects/show/{id}', 'ProjectController@show');
Route::get('/projects/show-info/{id}', 'ProjectController@showInfo');
Route::put('/projects/edit/{id}', 'ProjectController@edit');
Route::get('/projects/delete/{id}', 'ProjectController@delete');


// <-- tasks -->
Route::get('/tasks', 'TaskController@index')->name('tasks');
Route::get('/tasks/create', 'TaskController@create')->name('tasks_create');
Route::post('/tasks/store', 'TaskController@store')->name('tasks_store');
Route::get('/tasks/show/{id}', 'TaskController@show');
Route::get('/tasks/show-info/{id}', 'TaskController@showInfo');
Route::put('/tasks/edit/{id}', 'TaskController@edit');
Route::get('/tasks/delete/{id}', 'TaskController@delete');

// <-- users -->
Route::get('/users', 'UserController@index')->name('users');
Route::get('/users/create', 'UserController@create')->name('users_create');
Route::post('/users/store', 'UserController@store')->name('users_store');
Route::get('/users/show/{id}', 'UserController@show');
Route::get('/users/show-info/{id}', 'UserController@showInfo');
Route::put('/users/edit/{id}', 'UserController@edit');
Route::get('/users/delete/{id}', 'UserController@delete');

// <-- financials -->
Route::get('/financials', 'FinancialController@index')->name('financials');
Route::get('/financials/create', 'FinancialController@create')->name('financials_create');
Route::post('/financials/store', 'FinancialController@store')->name('financials_store');
Route::get('/financials/show/{id}', 'FinancialController@show');
Route::put('/financials/edit/{id}', 'FinancialController@edit');
Route::get('/financials/delete/{id}', 'FinancialController@delete');