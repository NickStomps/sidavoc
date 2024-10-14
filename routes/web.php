<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InschrijfController;


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

Route::middleware(['auth', 'role:1'])->group(function () {
    Route::get('/deelnemers/{id}', [InschrijfController::class, 'show'])->name('deelnemers');
});
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/', [App\Http\Controllers\ActiviteitController::class, 'index'])->name('home');
Route::get('/activiteiten', [App\Http\Controllers\ActiviteitController::class, 'show'])->name('activiteiten');

Route::get('/activiteitendetails/{id}', [App\Http\Controllers\InschrijfController::class, 'showActiviteit'])->name('activiteitendetails');
Route::post('/inschrijven/save', [App\Http\Controllers\InschrijfController::class, 'saveEmail'])->name('inschrijf.saveEmail');
Route::post('/uitschrijven', [App\Http\Controllers\InschrijfController::class, 'uitschrijven'])->name('uitschrijven');

Route::middleware('auth')->group(function () {
    Route::get('/overzicht', [\App\Http\Controllers\UsersController::class, 'show'])->name('overzicht');
    Route::middleware(['auth', 'role:1'])->group(function () {
        Route::get('/activiteitBeheer', [\App\Http\Controllers\ActiviteitBeheerController::class, 'index'])->name('activiteitBeheer');
        Route::post('/activiteitBeheer/save', [\App\Http\Controllers\ActiviteitBeheerController::class, 'store'])->name('activiteitBeheer.store');
    });
});
