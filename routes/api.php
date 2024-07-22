<?php

use App\Http\Controllers\Api\SupportController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/supports', SupportController::class);
// access all rotes for Api/SupportController with just on line
