<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $tasks = \App\Models\Task::all();
    return view('welcome' , ['tasks' => $tasks]);
});

Route::get('task/{id}', [TaskController::class, 'getTask'])->name('tasks.show');
Route::post('task', [TaskController::class, 'addTask'])->name('tasks.store');
Route::put('task', [TaskController::class, 'editTask'])->name('tasks.update');
Route::delete('/tasks/{task}', [TaskController::class, 'deleteTask'])->name('tasks.destroy');