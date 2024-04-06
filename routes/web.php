<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;


Route::get('/',[TaskController::class , 'index']);

Route::post('/assign_task',[TaskController::class , 'create_task'])->name('create_task');

Route::get('/tasks_page',[TaskController::class , 'tasks_list_page'])->name('tasks_page');
