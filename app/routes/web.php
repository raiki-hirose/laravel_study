<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::group(['middleware' => 'auth'], function() {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/folders/{folder}/tasks', 'TaskController@index')->name('tasks.index');
    Route::get('/folders/create', 'FolderController@showCreateForm')->name('folders.create');
    Route::post('/folders/create', 'FolderController@create');
    Route::get('/folders/{folder}/delete', 'FolderController@showDeleteForm')->name('folders.delete');
    Route::post('/folders/{folder}/delete', 'FolderController@delete');
    Route::get('/folders/refresh', 'FolderController@showRefreshForm')->name('folders.refresh');
    Route::post('/folders/refresh', 'FolderController@refresh');

    Route::get('/folders/{folder}/tasks/create', 'TaskController@showCreateForm')->name('tasks.create');
    Route::post('/folders/{folder}/tasks/create', 'TaskController@create');
    Route::get('/folders/{folder}/tasks/{task}/edit', 'TaskController@showEditForm')->name('tasks.edit');
    Route::post('/folders/{folder}/tasks/{task}/edit', 'TaskController@edit');
    Route::get('/folders/{folder}/tasks/{task}/delete', 'TaskController@showDeleteForm')->name('tasks.delete');
    Route::post('/folders/{folder}/tasks/{task}/delete', 'TaskController@delete');
});

Auth::routes();
