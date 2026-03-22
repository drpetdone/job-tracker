<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Job_tController;

Route::get('/', function () {
    return view('welcome');
});

//protect job tracker routes
Route::middleware('auth')->group(function()
{
    //Job Tracker Index
    Route::get('/job_t',[Job_tController::class,'index']);
    //post to save job data
    Route::post('/job_t',[Job_tController::class,'store']);
    //delete job
    Route::delete('/job_t/{id}', [Job_tController::class, 'destroy']);
    //for editing job
    Route::get('/job_t/{id}/edit',[Job_tController::class, 'edit']);
    //update info
    Route::put('/job_t/{id}', [Job_tController::class, 'update']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
