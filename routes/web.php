<?php

use App\Http\Controllers\SeasonController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/seasons');
Route::resource('seasons', SeasonController::class);