<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer;

Route::get('/', [Customer::class, 'index']);
Route::get('/create', [Customer::class, 'create']);
Route::post('/create', [Customer::class, 'create']);
Route::get('/delete/{id}', [Customer::class, 'delete']);
Route::get('/update/{id}', [Customer::class, 'update']);
Route::post('/update/{id}', [Customer::class, 'update']);