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
Route::any('/', ['uses'=>'App\Http\Controllers\ContactusController@index','as'=>'home']);
Route::post('/submit',['uses'=>'App\Http\Controllers\ContactusController@submit'])->name('contactus-form');
Route::post('contacts_db/contact/{id}/edit',['uses'=>'App\Http\Controllers\ContactusController@update_submit'])->name('update_contact-form');
Route::get('contacts_db',['uses'=>'App\Http\Controllers\ContactusController@index_db'])->name('contacts_db');
Route::get('contacts_db/contact/{id}',['uses'=>'App\Http\Controllers\ContactusController@contact_view'])->name('contact_view');
Route::get('contact/{id}/delete',['uses'=>'App\Http\Controllers\ContactusController@delete_contact'])->name('delete_contact');
Route::get('contacts_db/contact/{id}/edit',['uses'=>'App\Http\Controllers\ContactusController@edit','as'=>'contact.edit'])->where(['id'=>'[0-9]+']);
