<?php
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\FestivalController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

// Openbare routes voor gasten
Route::resource('festivals', FestivalController::class)->only(['index', 'show']);
Route::resource('buses', BusController::class)->only(['index', 'show']);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware('role:planner,admin')->group(function () {
        Route::get('festivals/create', [FestivalController::class, 'create'])->name('festivals.create');
        Route::post('festivals', [FestivalController::class, 'store'])->name('festivals.store');
        Route::get('buses/create', [BusController::class, 'create'])->name('buses.create');
        Route::post('buses', [BusController::class, 'store'])->name('buses.store');
        Route::resource('festivals', FestivalController::class)->except(['index', 'show', 'create', 'store']);
        Route::resource('buses', BusController::class)->except(['index', 'show', 'create', 'store']);
    });

    Route::resource('bookings', BookingController::class)->only(['index', 'create', 'store', 'destroy']);
    Route::resource('points', PointController::class)->only(['index', 'store', 'update', 'destroy']);
    Route::resource('users', UserController::class)->only(['index', 'edit', 'update', 'destroy']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';