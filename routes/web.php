<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
    Route::resource('posts', PostController::class)->middleware(['auth']);
    Route::get('/posts/user/{user}', [PostController::class, 'postsByUser'])->middleware(['auth'])->name('postsByUser');
    Route::resource('users', UserController::class)->middleware(['auth']);
});



require __DIR__.'/auth.php';
