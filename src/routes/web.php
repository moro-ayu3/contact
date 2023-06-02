<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contacts/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');
Route::post('/contacts', [ContactController::class, 'store'])->name('contact.store');
Route::get('/searches', [ContactController::class, 'show'])->name('search.show');
Route::get('/searches/search', [ContactController::class, 'search'])->name('search.search');
Route::post('/searches/delete', [ContactController::class, 'delete'])->name('search.delete');