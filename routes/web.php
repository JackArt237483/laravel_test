<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function (){
    Route::get('\todos',[TodoController::class, 'index'])->name('todos.index');
    Route::post('\todos', [TodoController::class, 'store'])->name('todos.store');
    Route::post('\todos\{todo}\toggle', [TodoController::class, 'toggle'])->name('todos.toggle');
    Route::put('\todos\{todo}', [TodoController::class, 'update'])->name('todos.update');
    Route::delete('\todos\{todo}', [TodoController::class, 'destroy'])->name('todos.destroy');
});

