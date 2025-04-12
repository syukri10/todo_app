<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', [TodoController::class, 'index'])->name('todo.index');
Route::post('/store', [TodoController::class, 'store'])->name('todo.store');

Route::post('/clear-session', function () {
    session()->forget('todos');
    return response()->noContent();
});
