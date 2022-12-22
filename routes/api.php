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


/**
 * --------------------------------------------------------------------------
 * ------------------------------START ADMIN---------------------------------
 * --------------------------------------------------------------------------
 */

// Hiển thị tài khoản
Route::get('/nhan-vien','App\Http\Controllers\AdminController@show_tk_admin');
//Thêm tài khoản
Route::post('/add-admin','App\Http\Controllers\AdminController@add_admin');
// Xóa tài khoản
Route::post('/delete-admin','App\Http\Controllers\AdminController@destroy');
// Khóa tài khoản
Route::post('/lock-admin','App\Http\Controllers\AdminController@lock');
// Mở khóa
Route::post('/unlock-admin','App\Http\Controllers\AdminController@unlock');

/**
 * ------------------------------END ADMIN---------------------------------
 */


/**
 * --------------------------------------------------------------------------
 * ------------------------------START CATEGORY---------------------------------
 * --------------------------------------------------------------------------
 */

// Them the loai
Route::post('/add-category','App\Http\Controllers\CategoryController@add_category');
// Show the loai
Route::get('/show-category','App\Http\Controllers\CategoryController@show_category');
// Xoa the loai
Route::post('/destroy-category','App\Http\Controllers\CategoryController@destroy_category');

/**
 * ------------------------------END CATEGORY---------------------------------
 */


/**
 * --------------------------------------------------------------------------
 * ------------------------------START STORY---------------------------------
 * --------------------------------------------------------------------------
 */

// Them truyen
Route::post('/add-story','App\Http\Controllers\StoryController@add_story');
// Xoa
Route::post('/destroy-story','App\Http\Controllers\StoryController@destroy_story');
// Edit
Route::post('/edit-story','App\Http\Controllers\StoryController@edit_story');
 /**
 * ------------------------------END STORY---------------------------------
 */


 /**
  * -----------------------------USER---------------------------------------
  */
Route::group(
    [
        'prefix' => 'user',
        'namespace'=>'App\Http\Controllers\UserController'
    ],function($router){
    Route::get('list','App\Http\Controllers\UserController\StoriesController@index');
});
Route::get('stories/{category_id}','App\Http\Controllers\UserController\StoriesController@getWithCategory');
Route::get('category','App\Http\Controllers\UserController\CategoriesController@getAllCategories');
Route::get('/search-story/{key}','App\Http\Controllers\UserController\StoriesController@search_story');
