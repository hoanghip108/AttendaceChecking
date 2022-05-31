<?php

use App\Http\Controllers\MajorController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::resource('majors', MajorController::class)->except([
    'show',
]);
Route::get('majors/api', [MajorController::class, 'api'])->name('majors.api');
Route::get('teachers/api', [TeacherController::class, 'api'])->name('teachers.api');
Route::get('/', function () {
    return view('layout.master');
});

Route::resource('teachers', TeacherController::class)->except([
    'show',
]);
