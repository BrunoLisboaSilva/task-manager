<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WebTaskController;

Route::get('/', [WebTaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks/create', [WebTaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks', [WebTaskController::class, 'store'])->name('tasks.store');
Route::get('/tasks/{task}/edit', [WebTaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{task}', [WebTaskController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{task}', [WebTaskController::class, 'destroy'])->name('tasks.destroy');

