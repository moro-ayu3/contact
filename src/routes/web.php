<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SearchController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contacts/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');
Route::post('/contacts', [ContactController::class, 'store'])->name('contact.store');

Route::get('/searches', [SearchController::class, 'show'])->name('search.show');
Route::post('/searches/search', [SearchController::class, 'search'])->name('search.search');
Route::post('/searches/delete', [SearchController::class, 'delete'])->name('search.delete');