<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/', function () {
    return view('welcome');
});

// 📖 Catálogo público
Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog');

// 📌 Dashboard y todo lo interno con prefijo
Route::middleware(['auth', 'verified'])->prefix('dashboard')->group(function () {
    
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    // 👤 Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 📚 Libros
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/books', [BookController::class, 'store'])->name('books.store');

    // 📑 Reservas
    Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');

    // 💳 Préstamos
    Route::resource('loans', LoanController::class);

    // 👥 Miembros
    Route::resource('members', MemberController::class);
});

// 🌐 Cambiar idioma
Route::post('/language/change', function (Request $request) {
    $lang = $request->input('language_code');
    if (in_array($lang, ['en', 'es'])) {
        session(['locale' => $lang]);
        app()->setLocale($lang);
    }
    return back();
})->name('language.change');

require __DIR__.'/auth.php';