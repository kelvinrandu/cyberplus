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

// routes exclusively for admin resource


Route::resource('resource', 'AdminController');
Route::get('admin', 'AdminController@index');
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


// routes exclusively for store owner resource

Route::resource('resource', 'StoreOwnerController');
Route::get('owner', 'StoreOwnerController@index');
Route::get('/owner/add/store', [
    'uses' => 'StoreOwnerController@getAddStorePage',
    'as' => 'owner.get.add.store.page'
    ]);
//post add store
Route::post('/owner/add/owner/', [
    'uses' => 'StoreOwnerController@createStore',
    'as' => 'owner.add.store'
    ]);
Route::get('/owner/get/stores/', [
    'uses' => 'StoreOwnerController@showStores',
    'as' => 'owner.get.stores'
    ]);


// routes exclusively for admin resource
Route::resource('resource', 'StoreAttendantController');