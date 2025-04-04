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

// Test routes
Route::prefix('test')->group(function () {
    Route::get('festivals/create', [FestivalController::class, 'create'])->name('test.festivals.create');
    Route::post('festivals', [FestivalController::class, 'store'])->name('test.festivals.store');
    Route::get('festivals/{festival}/edit', [FestivalController::class, 'edit'])->name('test.festivals.edit'); 
    Route::put('festivals/{festival}', [FestivalController::class, 'update'])->name('test.festivals.update'); 
    Route::delete('festivals/{festival}', [FestivalController::class, 'destroy'])->name('test.festivals.destroy');
});

// Routes voor ingelogde gebruikers
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');    
    // Routes voor normale gebruikers (boekingen, punten, profiel)
    Route::resource('bookings', BookingController::class)->only(['index', 'create', 'destroy']);
    Route::post('bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::resource('points', PointController::class)->only(['index', 'store', 'update', 'destroy']);
    Route::post('points/redeem', [PointController::class, 'redeem'])->name('points.redeem')->middleware('auth');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Routes voor admins en planners (festivals en bussen beheren)
    Route::middleware([\App\Http\Middleware\CheckRole::class.':planner|admin'])->group(function () {
        // Routes voor festivals
        Route::get('festivals/create', [FestivalController::class, 'create'])->name('festivals.create');
        Route::post('festivals', [FestivalController::class, 'store'])->name('festivals.store');
        Route::get('festivals/{festival}/edit', [FestivalController::class, 'edit'])->name('festivals.edit');
        Route::put('festivals/{festival}', [FestivalController::class, 'update'])->name('festivals.update');
        Route::delete('festivals/{festival}', [FestivalController::class, 'destroy'])->name('festivals.destroy');
        
        // Routes voor bussen
        Route::get('buses/create', [BusController::class, 'create'])->name('buses.create');
        Route::post('buses', [BusController::class, 'store'])->name('buses.store');
        Route::resource('buses', BusController::class)->except(['index', 'show', 'create', 'store']);
    });
});

// ALGEMENE openbare routes LAATSTE!
Route::resource('festivals', FestivalController::class)->only(['index', 'show']);
Route::resource('buses', BusController::class)->only(['index', 'show']);

// Tijdelijke route om de fout op te lossen
Route::get('/users', function() {
    return redirect('/dashboard');
})->name('users.index')->middleware('auth');

// Route voor muntjes pagina
Route::get('/my-points', function() {
    $user = auth()->user();
    $points = App\Models\Point::firstOrCreate(
        ['user_id' => $user->id],
        ['amount' => 0]
    );
    $bookings = App\Models\Booking::where('user_id', $user->id)
                        ->orderBy('created_at', 'desc')
                        ->get();
    
    return view('points.index', compact('points', 'bookings'));
})->middleware(['auth', 'verified'])->name('my-points');


require __DIR__.'/auth.php';