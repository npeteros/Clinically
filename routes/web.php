<?php

use App\Models\User;
use App\Models\Doctor;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome', [
        'doctors' => Doctor::get(),
    ]);
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'admin'])->name('dashboard');

Route::resource('doctors', DoctorController::class)
    ->only(['index', 'show', 'store', 'create', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);;

Route::resource('appointments', AppointmentController::class)
    ->only(['index', 'store', 'create', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);


Route::middleware('admin')->group(function() {
    Route::prefix('patients')->group(function () {
        Route::name('patients.')->group(function () {
            Route::get('/', function () {
                return view('patients.index', [
                    'patients' => User::where('type', 'patient')->get(),
                ]);
            })->name('index');
        });
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
