<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/api/book', [BookController::class, 'index']);
Route::get('/api/book/{id}', [BookController::class, 'show']);
Route::post('/api/book', [BookController::class, 'store']);
Route::put('/api/book/{id}', [BookController::class, 'update']);
Route::delete('/book/{id}', [BookController::class, 'destroy']);
Route::get('/api/users', [UserController::class, 'index']);
Route::get('/book/new', [BookController::class, 'newView']);
Route::get('/book/edit/{id}', [BookController::class, 'editView']);
Route::get('/book/list', [BookController::class, 'listView']);

require __DIR__.'/auth.php';
