<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/plans', [PlanController::class, 'index'])->name('plans.index');
Route::get('/plans/create', [PlanController::class, 'create'])->name('plans.create');
Route::get('/plans/{id}', [PlanController::class, 'getById'])->name('plans.show');
Route::post('/plans/submit', [PlanController::class, 'submit'])->name('plans.submit');

require __DIR__.'/auth.php';
