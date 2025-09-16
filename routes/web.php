<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UmaController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('umas', UmaController::class);