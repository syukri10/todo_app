<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', [TodoController::class, 'index'])->name('todo.index');
Route::post('/store', [TodoController::class, 'store'])->name('todo.store');
Route::get('/delete/{index}', [TodoController::class, 'destroy'])->name('todo.delete');
Route::get('/edit/{index}', [TodoController::class, 'edit'])->name('todo.edit');
Route::post('/update/{index}', [TodoController::class, 'update'])->name('todo.update');


Route::post('/clear-session', function () {
    session()->forget('todos');
    return response()->noContent();
});
