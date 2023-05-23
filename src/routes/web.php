<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [ContactController::class, 'index']);
Route::get('/contacts/confirm', [ContactController::class, 'confirm']);
Route::post('/contacts/confirm', [ContactController::class, 'confirm']);
Route::get('/contacts', [ContactController::class, 'store']);
Route::patch('/contacts', [ContactController::class, 'store']);
Route::get('/contacts/search', [ContactController::class, 'search']);
Route::post('contacts/delete', [ContactController::class, 'delete']);