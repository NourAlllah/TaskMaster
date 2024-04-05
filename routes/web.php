<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;


Route::get('/',[TaskController::class , 'index']);

Route::post('/assign_task',[TaskController::class , 'create_task'])->name('create_task');