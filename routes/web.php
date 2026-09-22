<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TriaseController;

Route::get('/', function(){
    return redirect()->route('traise.index');
});

Route::get('/traise', [TriaseController::class, 'index'])->name('traise.index');

Route::post('/traise', [TriaseController::class, 'store'])->name('traise.store');
