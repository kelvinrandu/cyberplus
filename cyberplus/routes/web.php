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
Route::resource('resource', 'StoreAttendantController');
Route::resource('resource', 'StoreOwnerController');
Route::resource('resource', 'AdminController');
Route::get('/admin/add/', [
    'uses' => 'AdminController@getAddUserPage',
    'as' => 'admin.get.add.user.page'
    ]);
//post add storeowner
Route::post('/admin/add/owner/', [
    'uses' => 'AdminController@createOwner',
    'as' => 'admin.add.owner'
    ]);
Route::get('/admin/get/owners/', [
    'uses' => 'AdminController@showOwners',
    'as' => 'admin.get.owners'
    ]);