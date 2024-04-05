<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

//main page

Route::get('/',[TaskController::class , 'index']);