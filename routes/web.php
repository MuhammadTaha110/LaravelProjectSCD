<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

use Illuminate\Support\Facades\Auth;

// Redirect authenticated users from welcome page
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('home'); // Redirect to home if logged in
    }
    return view('welcome'); // Show welcome page if not logged in
})->name('layout');

// Protected route for your custom home page (only accessible after login)
Route::get('/home', function () {
    return view('home'); 
})->middleware('auth')->name('home');

// Group routes that require authentication
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::resource('tasks', TaskController::class);
    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit'); // Edit task
    Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update'); // Update task
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy'); // Delete task
});


Route::middleware('auth')->group(function () {
    Route::get('/tasks/{task}/assign', [TaskController::class, 'showAssignForm'])->name('tasks.assign.form');
    Route::post('/tasks/{task}/assign', [TaskController::class, 'assign'])->name('tasks.assign');
});


require __DIR__.'/auth.php';
