<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', function () {
    return view('todo.index');
});

Route::post('/store', [TodoController::class, 'store'])->name('todo.store');
