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

Route::get('/', function () {
    return view('welcome');
});
//
//Route::group(['prefix' => 'filemanager', 'middleware' => 'App\Http\Middleware\CheckLoggedAdmin'], function () {
//    \UniSharp\LaravelFilemanager\Lfm::routes();
//});


Route::get('/home', 'App\Http\Controllers\StoryController@show_home')->name('home');

/**
 * -------------------------------------------------------------------------------
 * ------------------------------ START ADMIN--------------------------------------
 * -------------------------------------------------------------------------------
 */
Route::group(['middleware' => 'App\Http\Middleware\CheckAdmin'], function () {
    // Show
    Route::get('/quan-tri-vien', function() {
        return view('admin.show_admin');
    });
});
/**
 * ------------------------------ END ADMIN--------------------------------------
 */

/**
 * --------------------------------------------------------------------------
 * ------------------------------START STORY---------------------------------
 * --------------------------------------------------------------------------
 */
Route::group(['middleware' => 'App\Http\Middleware\CheckLoggedAdmin'], function () {
    //Show them the loai
    Route::get('/them-the-loai', 'App\Http\Controllers\CategoryController@category');
    // Them truyen
    Route::get('/them-truyen', 'App\Http\Controllers\StoryController@show_add_story');
    // Show
    Route::get('/truyen', 'App\Http\Controllers\StoryController@story')->name('all-story');
    // Tim kiem
    Route::get('/tim-truyen','App\Http\Controllers\StoryController@search');
    // Update
    Route::get('/truyen/edit/{story_id}', 'App\Http\Controllers\StoryController@show_edit_story');
    // Xem truyen
    Route::get('/truyen-{story_id}/full', 'App\Http\Controllers\StoryController@show_chapter');

});
// Doc truyen
Route::get('/truyen-{story_id}.html', 'App\Http\Controllers\StoryController@get_story');
/**
 * ------------------------------ END STORY--------------------------------------
 */

//show trang dang nhap
Route::get('/login-admin', function(){
    return view('admin.login');
})->middleware('App\Http\Middleware\CheckLoginAdmin')->name('login-admin');

//Dang nhap
Route::post('/login-admin', 'App\Http\Controllers\AdminController@Login');

//Dang xuat
Route::get('/logout','App\Http\Controllers\AdminController@Logout');
