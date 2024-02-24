<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
Route::get('items', [ItemController::class, 'index']);
Route::post('items', [ItemController::class, 'store']);
Route::get('items/delete/{id}', [ItemController::class, 'destroy']);
Route::post('items/update/{id}', [ItemController::class, 'update']);