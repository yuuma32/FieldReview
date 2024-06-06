<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\ReviewController;
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
// localhostにアクセスした際にFieldControllerのhomeメソッドが実行される。
Route::get('/', [FieldController::class, 'home'])->name('home');

// ログイン後のリダイレクト先
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ログインしているユーザーのみアクセス可能なルート
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/field/{id}/review', [ReviewController::class, 'store'])->name('review.store');
    Route::put('/field/{id}/review', [ReviewController::class, 'update'])->name('review.update');
});

// 管理者のみがアクセス可能なルート
Route::middleware(['auth', 'can:admin'])->group(function () {
    Route::get('/field/create', [FieldController::class, 'create'])->name('field.create');
    Route::get('/field/{id}/edit', [FieldController::class, 'edit'])->name('field.edit');
    Route::post('/field', [FieldController::class, 'store'])->name('field.store');
    Route::put('/field/{id}', [FieldController::class, 'update'])->name('field.update');
    Route::delete('/field/{id}', [FieldController::class, 'destroy'])->name('field.destroy');
});

// フィールドの詳細ページへのルート
Route::get('/field/{id}', [FieldController::class, 'show'])->name('field.show');


require __DIR__.'/auth.php';