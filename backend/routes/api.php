<?php

use App\Http\Controllers\BicycleController;
use App\Http\Controllers\ManufacturersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {return $request->user();})->middleware('auth:sanctum');
Route::get('/bicycles', [BicycleController::class, 'index'])->name('bicycles.index');
Route::get('/bicycles/{bicycle}', [BicycleController::class, 'show'])->name('bicycles.show')->whereNumber('id');
Route::post('/bicycles', [BicycleController::class, 'store'])->name('bicycles.store');
Route::put('/bicycles/{bicycle}', [BicycleController::class, 'update'])->name('bicycles.update')->whereNumber('id');
Route::delete('/bicycles/{bicycle}', [BicycleController::class, 'destroy'])->name('bicycles.destroy')->whereNumber('id');

Route::get('/manufacturers', [ManufacturersController::class, 'index'])->name('manufacturers.index');
Route::get('/manufacturers/{manufacturer}', [ManufacturersController::class, 'show'])->name('manufacturers.show')->whereNumber('id');
Route::post('/manufacturers', [ManufacturersController::class, 'store'])->name('manufacturers.store');
Route::put('/manufacturers/{manufacturer}', [ManufacturersController::class, 'update'])->name('manufacturers.update')->whereNumber('id');
Route::delete('/manufacturers/{manufacturer}', [ManufacturersController::class, 'destroy'])->name('manufacturers.destroy')->whereNumber('id');
