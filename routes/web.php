<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskTrashController;

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

Route::view('/', 'welcome');

Route::resource('user', UserController::class, ['only' => ['index','destroy']])->middleware(['auth']);
Route::get('/user/{user}', [UserController::class, 'show'])->name('user.show')->withTrashed()->middleware(['auth']);
Route::patch('/user/{user}/restore', [UserController::class, 'restore'])->name('user.restore')->withTrashed()->middleware(['auth']);

Route::resource('user.task', TaskController::class, ['only' => ['index', 'store', 'destroy']])->shallow()->middleware(['auth']);
Route::get('/user/{user}/trash', [TaskTrashController::class, 'index'])->name('user.task.trash')->middleware(['auth']);
Route::patch('/task/{task}/restore', [TaskTrashController::class, 'restore'])->name('task.restore')->withTrashed()->middleware(['auth']);
Route::delete('/task/{task}/forceDelete', [TaskTrashController::class, 'forceDelete'])->name('task.forceDelete')->withTrashed()->middleware(['auth']);

Route::resource('setting', SettingController::class, ['only' => ['index','update']])->middleware(['auth']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
