<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('courses', 'Courses@getCourses');
Route::get('courses/{id}', 'Courses@getCourse');
Route::post('courses', 'Courses@saveCourse');
Route::put('courses/{id}', 'Courses@updateCourse');
Route::delete('courses/{id}', 'Courses@deleteCourse');
Route::get('admin', 'Admins@getIndex');
Route::get('admin/block/{id}', 'Admins@block');
Route::get('admin/unblock/{id}', 'Admins@unBlock');


