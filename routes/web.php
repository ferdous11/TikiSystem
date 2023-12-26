<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TripController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');
Route::get('/', [TripController::class, 'index'])->name('trips.index');

Route::get('/trips', [TripController::class, 'index'])->name('trips.index');
Route::post('/trips', [TripController::class, 'store']);

// Route::middleware(['auth'])->group(function () {
//     Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');
//     Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');
// });

Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');
Route::post('/tickets', [TicketController::class, 'store']);


Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users/store', [UserController::class, 'store'])->name('users.store');