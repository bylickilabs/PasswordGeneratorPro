<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasswordController;

Route::get('/passwords', [PasswordController::class, 'index']);
Route::post('/passwords', [PasswordController::class, 'store']);
Route::put('/passwords/{id}', [PasswordController::class, 'update']);
Route::delete('/passwords/{id}', [PasswordController::class, 'destroy']);
