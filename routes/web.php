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

Auth::routes();

Route::get('403', ['as' => '403', 'uses' => 'ErrorController@forbitten']);
Route::get('404', ['as' => '404', 'uses' => 'ErrorController@notfound']);
Route::get('500', ['as' => '500', 'uses' => 'ErrorController@fatal']);


Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'Admin'], function () {

        Route::get('/', 'HomeController@index');
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
        Route::get('/tasks/createFromProject/{id}', 'TaskController@createFromProject');
        Route::post('/tasks/store', 'TaskController@store')->name('tasks_store');
        Route::get('/tasks/show/{id}', 'TaskController@show');
        Route::get('/projects/tasks/show-info/{id}', 'TaskController@showInfo');
        Route::put('/tasks/edit/{id}', 'TaskController@edit');
        Route::get('/tasks/delete/{id}', 'TaskController@delete');
        Route::get('/tasks/addTime/{id}', 'TimeController@store');




// <-- ajax -->
        //getting users
        Route::get('/tasks/getUsers/', 'TaskController@getUsers');

        // actions in task
        Route::post('/tasks/addTask', 'TaskController@addTask');
        Route::post('/tasks/removeTask/', 'TaskController@removeTask');
        Route::post('/tasks/updateStatus/', 'TaskController@updateStatus');        
        // edit
        Route::get('/tasks/editNote/', 'TaskController@edit');
        Route::get('/tasks/editTime/', 'TaskController@edit');
        // add 
        Route::post('/tasks/addNote/', 'NoteController@store');
        Route::post('/tasks/addFile/', 'FileController@store');
        Route::post('/tasks/addTime/', 'TimeController@store');
        // delete
        Route::post('/tasks/removeTime/', 'TimeController@destroy');
        Route::post('/tasks/removeNote/', 'NoteController@destroy');
        Route::post('/tasks/removeFile/', 'FileController@destroy');
        //reports
        Route::post('/report/post/date-for-project','ReportController@date_for_project');
        Route::post('/report/post/time-users-for-project','ReportController@time_users_for_project');
        Route::post('/report/post/project-for-users-times','ReportController@project_for_users_times');
        Route::post('/report/post/finish-task-user-project','ReportController@finish_task_user_project');



// <-- users -->
        Route::get('/users', 'UserController@index')->name('users');
        Route::get('/users/create', 'UserController@create')->name('users_create');
        Route::post('/users/store', 'UserController@store')->name('users_store');
        Route::get('/users/show/{id}', 'UserController@show');
        Route::get('/users/show-info/{id}', 'UserController@showInfo');
//        Route::put('/users/edit/{id}', 'UserController@edit');
        Route::post('/users/edit', 'UserController@edit')->name('users_edit');
        Route::get('/users/delete/{id}', 'UserController@delete');

        Route::get('/user/image/{id}', 'UserController@getImage');



// <-- financials -->
        Route::get('/financials', 'FinancialController@index')->name('financials');
        Route::get('/financials/create', 'FinancialController@create')->name('financials_create');
        Route::post('/financials/store', 'FinancialController@store')->name('financials_store');
        Route::get('/financials/show/{id}', 'FinancialController@show');
        Route::put('/financials/edit/{id}', 'FinancialController@edit')->name('financial_edit');
        Route::get('/financials/delete/{id}', 'FinancialController@delete');

// <-- Relatórios -->


        Route::get('/report','ReportController@index')->name('report');
        
        Route::get('/report/date-for-project','ReportController@index_date_for_project')->name('report_date_for_project');
        Route::get('/report/time-users-for-project','ReportController@index_time_users_for_project')->name('report_time_users_for_project');
        Route::get('/report/project-for-users-times','ReportController@index_project_for_users_times')->name('report_project_for_users_times');
        Route::get('/report/finish-task-user-project','ReportController@index_finish_task_user_project')->name('report_finish_task_user_project');

    });

});
