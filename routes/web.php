<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AssessmentController;

// Rutas de recursos
Route::resource('assessments', AssessmentController::class);
Route::resource('students', StudentController::class);
Route::resource('teachers', TeacherController::class);
Route::resource('modules', ModuleController::class);
Route::resource('units', UnitController::class);

// Página principal
Route::get('/', [HomeController::class, 'index'])->name('home');
