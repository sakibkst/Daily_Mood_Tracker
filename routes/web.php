use App\Http\Controllers\MoodController;
use App\Http\Controllers\StreakController;

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [StreakController::class, 'show'])->name('dashboard');
    Route::get('/moods', [MoodController::class, 'index'])->name('moods.index');
    Route::get('/moods/create', [MoodController::class, 'create'])->name('moods.create');
    Route::post('/moods', [MoodController::class, 'store'])->name('moods.store');
    Route::get('/moods/{mood}/edit', [MoodController::class, 'edit'])->name('moods.edit');
    Route::put('/moods/{mood}', [MoodController::class, 'update'])->name('moods.update');
    Route::delete('/moods/{mood}', [MoodController::class, 'destroy'])->name('moods.destroy');
    Route::post('/moods/restore/{id}', [MoodController::class, 'restore'])->name('moods.restore');
});

