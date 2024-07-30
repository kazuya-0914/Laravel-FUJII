<?php
// 教材コード
use App\Http\Controllers\HelloController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\WeatherController;

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('top');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// --- 教材コード
Route::get('/hello', HelloController::class)->name('hello');

Route::prefix('products')->group(function() {
    Route::get('', [ProductController::class, 'index'])->name('products');
    Route::get('create', [ProductController::class, 'create'])->name('products.create');
    Route::post('store', [ProductController::class, 'store'])->name('products.store');
    Route::get('{id}', [ProductController::class, 'show']);
});
Route::prefix('vendors')->group(function () {
    Route::get('create', [VendorController::class, 'create'])->name('vendors.create');
    Route::post('store', [VendorController::class, 'store'])->name('vendors.store');
    Route::get('{id}', [VendorController::class, 'show']);
    Route::get('1', [VendorController::class, 'show'])->name('vendors');
});
Route::prefix('requests')->group(function () {
    Route::get('create', [RequestController::class, 'create'])->name('requests');
    Route::get('confirm', function () {
        abort(404);
    });
    Route::post('confirm', [RequestController::class, 'confirm'])->name('requests.confirm');
});
Route::prefix('sign-in')->group(function () {
    Route::get('', [SignInController::class, 'create'])->name('sign-in');
    Route::post('', [SignInController::class, 'store'])->name('sign-in.store');
});

// --- 天気予報
Route::get('/weather', WeatherController::class)->name('weather');