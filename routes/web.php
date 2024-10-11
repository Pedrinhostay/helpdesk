<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Middleware\CheckingLogin;
use App\Http\Middleware\CheckIsNotLogging;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;

Route::middleware([CheckIsNotLogging::class])->group(function(){

    Route::get('/login', [AuthController::class , 'login']);
    Route::post('/loginSubmit', [AuthController::class, 'loginSubmit']);
});



Route::middleware([CheckingLogin::class])->group(function(){

    Route::get('/', [MainController::class , 'index'])->name('home');
    Route::get('/newTicket', [MainController::class , 'newTickets'])->name('newTicket');
    Route::get('/logout', [AuthController::class , 'Logout'])->name('logout');

});
