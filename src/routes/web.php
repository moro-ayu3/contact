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
Route::get('/thanks', [ContactController::class,'show']);

Route::get('/searches', [SearchController::class, 'index']);
Route::get('/searches/search', [SearchController::class, 'search']);
Route::post('/searches/delete', [SearchController::class, 'delete']);