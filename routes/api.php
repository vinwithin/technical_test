<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\divisionsController;
use App\Http\Controllers\employeesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::middleware('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/divisions', [divisionsController::class, 'index']);
    Route::get('/employees', [employeesController::class, 'index']);
    Route::post('/employees', [employeesController::class, 'store']);
    Route::put('/employees/{id}', [employeesController::class, 'update']);
    Route::delete('/employees/{id}', [employeesController::class, 'destroy']);
});
