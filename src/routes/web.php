<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [ContactController::class, 'index']);
Route::post('/contacts/confirm', [ContactController::class, 'confirm']);
Route::get('/contacts/confirm', [ContactController::class, 'confirm']);
Route::patch('/contacts', [ContactController::class, 'store']);
Route::get('/contacts', [ContactController::class, 'store']);
Route::get('/searches', [ContactController::class, 'show']);
Route::get('/searches/search', [ContactController::class, 'search']);
Route::post('/searches/delete', [ContactController::class, 'delete']);