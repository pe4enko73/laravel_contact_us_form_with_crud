<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::any('/', ['uses'=>'App\Http\Controllers\TodolistController@index','as'=>'home']);
Route::post('/submit',['uses'=>'App\Http\Controllers\TodolistController@submit'])->name('task-form');
Route::post('task/{id}/edit',['uses'=>'App\Http\Controllers\TodolistController@update_submit'])->name('update_task-form');
Route::get('task/{id}/completed',['uses'=>'App\Http\Controllers\TodolistController@completed_task'])->name('completed_task');
Route::get('task/{id}/uncompleted',['uses'=>'App\Http\Controllers\TodolistController@uncompleted_task'])->name('uncompleted_task');
Route::get('task/{id}/delete',['uses'=>'App\Http\Controllers\TodolistController@delete_task'])->name('delete_task');
Route::get('task/{id}/edit',['uses'=>'App\Http\Controllers\TodolistController@edit','as'=>'task.edit'])->where(['id'=>'[0-9]+']);
