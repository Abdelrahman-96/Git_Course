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


Route::group(['prefix' => '/', 'middleware' => 'auth'], function () {
    Route::get('',
        [
            'uses' => 'Users@getIndex',
            'as' => 'user.index'
        ]);
    Route::get('create',
        [
            'middleware' => 'isblocked',
            'uses' => 'Users@getUserCreate',
            'as' => 'user.create'
        ]);
    Route::post('create',
        [
            'middleware' => 'isblocked',
            'uses' => 'Users@postUserCreate',
            'as' => 'user.create'
        ]);
    Route::get('edit/{id}',
        [
            'middleware' => 'isblocked',
            'uses' => 'Users@getUserEdit',
            'as' => 'user.edit'
        ]);
    Route::post('edit',
        [
            'middleware' => 'isblocked',
            'uses' => 'Users@postUserUpdate',
            'as' => 'user.update'
        ]);
    Route::get('delete/{id}',
        [
            'middleware' => 'isblocked',
            'uses' => 'Users@getUserDelete',
            'as' => 'user.delete'
        ]);
});

Route::group(['prefix' => 'admin', 'middleware' => 'isadmin'], function () {
    Route::get('', [
        'uses' => 'Admins@getIndex',
        'as' => 'admin.index'
    ]);
    Route::get('/{id}', [
        'uses' => 'Admins@block',
        'as' => 'admin.block'
    ]);
    Route::get('/unblock/{id}', [
        'uses' => 'Admins@unblock',
        'as' => 'admin.unblock'
    ]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
