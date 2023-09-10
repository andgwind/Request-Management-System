<?php

use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function () {
    Route::middleware('auth.basic')->group(function () {
        Route::get('/tickets', [TicketController::class, 'index']);
        Route::put('/tickets/{ticket}', [TicketController::class, 'update']);
    });
    Route::post('/tickets', [TicketController::class, 'store']);
});
