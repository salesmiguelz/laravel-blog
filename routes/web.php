<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriesController;
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


Route::middleware(['auth'])->group(function () {
    Route::get('/', function(){
        return redirect('posts');
    });
    
    Route::get('/post/{slug}', [PostController::class, 'show']);
    Route::resource('posts', PostController::class);
    Route::get('/posts/user/{user}', [PostController::class, 'postsByUser'])->name('postsByUser');

    Route::resource('/users', UserController::class)->middleware('admin');
    Route::resource('/categories', CategoriesController::class)->middleware('admin');
});



require __DIR__.'/auth.php';
