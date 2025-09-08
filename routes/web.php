<?php

use Illuminate\Http\Request;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CatalogController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog'); // pública

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/books', [BookController::class, 'store'])->name('books.store');
});

Route::post('/language/change', function (Request $request) {
    $lang = $request->input('language_code');
    if (in_array($lang, ['en', 'es'])) {
        session(['locale' => $lang]);
        app()->setLocale($lang);
    }
    return back();
})->name('language.change');

require __DIR__.'/auth.php';