<?php

use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\TeacherController;
use App\Http\Controllers\Api\UnitController;
use App\Http\Controllers\Api\ModuleController;
use App\Http\Controllers\Api\AssessmentController;


Route::apiResource('students', StudentController::class);
Route::apiResource('teachers', TeacherController::class);
Route::apiResource('units', UnitController::class);
Route::apiResource('modules', ModuleController::class);
Route::apiResource('assessments', AssessmentController::class);


