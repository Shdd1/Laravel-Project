<?php

use App\Http\Controllers\ComputerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\staticController;
use App\Http\Controllers\ProjectController;
use Symfony\Component\Routing\Generator\CompiledUrlGenerator;


use App\Http\Controllers\OvertimeController;
use App\Http\Controllers\LocationControllers;

//overtimes employee
Route::get('/overtimes/create', [OvertimeController::class, 'create'])->name('overtimes.create');
Route::post('/overtimes', [OvertimeController::class, 'store'])->name('overtimes.store');
Route::get('/overtimes', [OvertimeController::class, 'index'])->name('overtimes.index');

//Admin
//Route::middleware(['auth', 'admin'])->group(function () {
Route::get('/admin/overtimes', [OvertimeController::class, 'adminIndex'])->name('admin.overtimes.index');
Route::get('/admin/overtimes/{overtime}/edit', [OvertimeController::class, 'edit'])->name('admin.overtimes.edit');
Route::put('/admin/overtimes/{overtime}', [OvertimeController::class, 'update'])->name('admin.overtimes.update');
//});

//Location
//Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/locations', [LocationControllers::class, 'index'])->name('admin.locations.index');
    Route::get('/admin/locations/create', [LocationControllers::class, 'create'])->name('admin.locations.create');
    Route::post('/admin/locations', [LocationControllers::class, 'store'])->name('admin.locations.store');
    Route::get('/admin/locations/{location}/edit', [LocationControllers::class, 'edit'])->name('admin.locations.edit');
    Route::put('/admin/locations/{location}', [LocationControllers::class, 'update'])->name('admin.locations.update');
    Route::delete('/admin/locations/{location}', [LocationControllers::class, 'destroy'])->name('admin.locations.destroy');
//});
//Project
Route::get('/admin/projects', [ProjectController::class, 'index'])->name('admin.projects.index');
    Route::get('/admin/projects/create', [ProjectController::class, 'create'])->name('admin.projects.create');
    Route::post('/admin/projects', [ProjectController::class, 'store'])->name('admin.projects.store');
    Route::get('/admin/projects/{project}/edit', [ProjectController::class, 'edit'])->name('admin.projects.edit');
    Route::put('/admin/projects/{project}', [ProjectController::class, 'update'])->name('admin.projects.update');
    Route::delete('/admin/projects/{project}', [ProjectController::class, 'destroy'])->name('admin.projects.destroy');
    Route::delete('/admin/projects/{project}', [ProjectController::class, 'show'])->name('admin.projects.show');
    Route::get('/fixed-phases/{projectType}', [ProjectController::class, 'getFixedPhases']);
    
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/filter', [ProjectController::class, 'filter'])->name('projects.filter');
Route::post('/projects/update-progress', [ProjectController::class, 'updateProgress'])->name('projects.updateProgress');




Route::get('/dashboard', function () {
    return view(view: 'dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', action: [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', action: [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', action: [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
