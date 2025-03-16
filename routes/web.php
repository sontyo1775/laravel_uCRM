<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\InertiaTestContller;
use App\Http\Controllers\ItemController;

// 20250316 add ItemController No40
Route::resource('/items',ItemController::class)
->middleware(['auth', 'verified']);

// 20250311 追加 N018
Route::get('/inertia-test', function () {
    return Inertia::render('InertiaTest');
    }
);
Route::get('/inertia/index',[InertiaTestContller::class, 'index'])->name('inertia.index');

// 20250312 追加　No19 パラメータ渡し
Route::get('/inertia/show/{id}',[InertiaTestContller::class, 'show'])->name('inertia.show');
Route::post('/inertia',[InertiaTestContller::class, 'store'])->name('inertia.store');
Route::get('/inertia/show/{id}',[InertiaTestContller::class, 'show'])->name('inertia.show');
Route::get('/inertia/create/',[InertiaTestContller::class, 'create'])->name('inertia.create');

// 20250315 追加 No30 リスト削除
Route::delete('/inertia/{id}',[InertiaTestContller::class, 'delete'])->name('inertia.delete');

// 20250315 add No33 コンポーネント
Route::get('/component-test', function () {
    return Inertia::render('ComponentTest');
    }
);


















Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
