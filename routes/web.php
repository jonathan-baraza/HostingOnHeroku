<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Mail\NewUserMail;

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

Route::get('/email',function (){
	return new NewUserMail();
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/home',[PostController::class,'home'])->name('homepage');
Route::get('/logouts',[LogoutController::class,'logouts'])->name('logouts');
Route::get('/authors',[ProfileController::class,'authors'])->name('authors');
Route::get('/profile/{id}',[ProfileController::class,'index'])->name('user_profile');
Route::post('/profile/',[ProfileController::class,'update'])->name('profile_update');
Route::get('/add-post',[PostController::class,'addPost'])->name('add-post')->middleware('auth');
Route::post('/add-post',[PostController::class,'submitPost']);
Route::get('/post/{id}/',[PostController::class,'editPost'])->name('edit-post')->middleware('auth');
Route::post('/post/{id}/',[PostController::class,'updatePost']);
Route::get('/post/{id}/delete',[PostController::class,'confirmDeletePost'])->name('post-confirm-delete')->middleware('auth');
Route::post('/post/{id}/delete',[PostController::class,'deletePost'])->name('post-delete')->middleware('auth');

Route::get('/post-by-user/{id}',[PostController::class,'postByUser'])->name('post_by_user');