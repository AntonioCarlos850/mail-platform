<?php

use App\Http\Controllers\MailController;
use Illuminate\Http\Request;
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

Route::prefix('mails')->as('mails.')->middleware('auth.bearer')->group(function() {
    Route::get('/', [MailController::class, 'index'])->name('index');
    Route::post('/', [MailController::class, 'store'])->name('store');
    Route::get('/{mail}', [MailController::class, 'show'])->name('show');
});
