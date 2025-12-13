<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookmarkController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public routes
Route::get('/', function () {
    return redirect()->route('courses.index'); // Redirect homepage to courses list
});

Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');

// Instructor routes must be above dynamic route
Route::middleware(['auth', 'instructor'])->group(function () {
    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
    Route::get('/courses/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');
    Route::put('/courses/{course}', [CourseController::class, 'update'])->name('courses.update');
    Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');
});

// Dynamic route must come **after** static routes
Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');

// Dashboard
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Student routes
    Route::middleware('student')->group(function () {
        Route::post('/bookmarks/{course}', [BookmarkController::class, 'toggle'])->name('bookmarks.toggle');
        Route::post('/bookmarks/{course}/complete', [BookmarkController::class, 'complete'])->name('bookmarks.complete');
    });
});

// Test route
Route::get('/test', function () {
    return 'Routes work!';
});

// Authentication routes
require __DIR__.'/auth.php';
    