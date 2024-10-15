<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\AppointsmentsController;
use App\Http\Controllers\VehiclesController;
use App\Http\Controllers\InvoicesController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('services', ServicesController::class);
// Route::get('/services',[ServicesController::class, 'index']);
// Route::post('/services', [ServicesController::class, 'store']);
Route::apiResource('appointments', AppointsmentsController::class);
Route::apiResource('vehicles', VehiclesController::class);
Route::apiResource('invoices', InvoicesController::class);