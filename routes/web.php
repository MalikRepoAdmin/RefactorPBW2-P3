<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TriaseController;

Route::get('/', function(){
    return redirect()->route('triase.index');
});

Route::get('/triase', [TriaseController::class, 'index'])->name('triase.index');

Route::post('/triase', [TriaseController::class, 'proses'])->name('triase.proses');
