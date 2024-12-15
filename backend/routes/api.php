<?php

use App\Http\Controllers\BicycleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {return $request->user();})->middleware('auth:sanctum');
Route::get('/bicycles', [BicycleController::class, 'index'])->name('bicycles.index');
Route::get('/bicycles/{bicycle}', [BicycleController::class, 'show'])->name('bicycles.show')->whereNumber('id');
Route::post('/bicycles', [BicycleController::class, 'store'])->name('bicycles.store');
Route::put('/bicycles/{bicycle}', [BicycleController::class, 'update'])->name('bicycles.update')->whereNumber('id');
Route::delete('/bicycles/{bicycle}', [BicycleController::class, 'destroy'])->name('bicycles.destroy')->whereNumber('id');
