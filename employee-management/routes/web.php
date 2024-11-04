<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EmployeeController::class, 'index']);
Route::get('/create', [EmployeeController::class, 'create'])->name('create');
Route::post('/store', [EmployeeController::class, 'store'])->name('store');
Route::get('/edit{id}', [EmployeeController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [EmployeeController::class, 'update'])->name('update');
Route::get('/delete/{id}', [EmployeeController::class, 'destroy'])->name('destroy');