<?php

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
    return view('home');
});
Route::get('/activiteitBeheer', [\App\Http\Controllers\ActiviteitBeheerController::class, 'index'])->name('activiteitBeheer');
Route::post('/activiteitBeheer/save',[\App\Http\Controllers\ActiviteitBeheerController::class,'store'])->name('activiteitBeheer.store');

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