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

// <-- projects -->
Route::get('/projects', 'ProjectController@index')->name('projects');
Route::get('/projects/create', 'ProjectController@create')->name('projects_create');
Route::post('/projects/store', 'ProjectController@store')->name('projects_store');

// <-- tasks -->
Route::get('/tasks', 'TaskController@index')->name('tasks');
Route::get('/tasks/create', 'TaskController@create')->name('tasks_create');
Route::post('/tasks/store', 'TaskController@store')->name('tasks_store');

// <-- users -->
Route::get('/users', 'UserController@index')->name('users');
Route::get('/users/create', 'UserController@create')->name('users_create');
Route::post('/users/store', 'UserController@store')->name('users_store');

// <-- financials -->
Route::get('/financials', 'FinancialController@index')->name('financials');
Route::get('/financials/create', 'FinancialController@create')->name('financials_create');
Route::post('/financials/store', 'FinancialController@store')->name('financials_store');