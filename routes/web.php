<?php

use App\Http\Controllers\ActiviteitController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\AuthController;

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
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/', function () {
    return view('home');
});

Route::get('/activiteit', function () {
    return view('activiteitendetails');
});


Route::get('/activiteitBeheer', [\App\Http\Controllers\ActiviteitBeheerController::class, 'index'])->name('activiteitBeheer');
Route::post('/activiteitBeheer/save',[\App\Http\Controllers\ActiviteitBeheerController::class,'store'])->name('activiteitBeheer.store');

Route::get('/', [ActiviteitController::class, 'index']);
Route::resource('activiteiten', ActiviteitController::class);

Route::get('/account', function () {
    if(!Auth::check()) 
    {
        return view('login');
    }
    else
    {
        return view('account');
    }
});

