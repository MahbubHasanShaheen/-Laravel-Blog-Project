<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingController;
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

//Route::get('/', function () {
    //return view('welcome');
//});
//public route
Route::get('/', [HomeController::class, 'index']);
Route::get('/details/{id}', [HomeController::class, 'details']);
Route::get('/all-categories', [HomeController::class, 'all_category']);
Route::get('/category/{id}', [HomeController::class, 'category']);
Route::post('/save-comment/{id}', [HomeController::class, 'save_comment']);
Route::get('/save-post-form', [HomeController::class, 'save_post_form']);
Route::post('/save-post-form', [HomeController::class, 'save_post_data']);
//manage post
Route::get('/manage-posts', [HomeController::class, 'manage_posts']);
//admin route
//User
Route::get('admin/user', [AdminController::class, 'users']);
Route::get('admin/user/delete/{id}', [AdminController::class, 'delete_user']);
//comment
Route::get('admin/comment', [AdminController::class, 'comments']);
Route::get('admin/comment/delete/{id}', [AdminController::class, 'delete_comment']);

//login
Route::get('/admin/login', [AdminController::class, 'login']);
Route::post('/admin/login', [AdminController::class, 'submit_login']);
Route::get('/admin/logout', [AdminController::class, 'logout']);
Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);

Route::get('admin/category/{id}/delete', [CategoryController::class,'destroy']);
Route::resource('admin/category', CategoryController::class);
Route::get('/admin/category/add', [CategoryController::class, 'create']);

Route::get('admin/post/{id}/delete', [PostController::class,'destroy']);
Route::resource('admin/post', PostController::class);
Route::get('/admin/post/add', [PostController::class, 'create']);


//Setting
Route::get('/admin/setting', [SettingController::class, 'index']);
Route::post('/admin/setting', [SettingController::class, 'save_setting']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
