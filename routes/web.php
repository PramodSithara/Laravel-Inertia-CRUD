<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;



Route::get('/', [HomeController::class, 'index']);

Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
Route::get('student',[StudentController::class,'index'])->name('student.index');
Route::post('student',[StudentController::class, 'store']);
Route::delete('student/{student}',[StudentController::class, 'destroy']);
Route::get('/student/{student}/edit',[StudentController::class,'edit']);
Route::put('/student/{student}',[StudentController::class,'update']);

Route::get('/student/image/{filename}', 'StudentController@showImage')->name('student.image');


Route::get('/dashboard', [StudentController::class, 'goto'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');




// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
