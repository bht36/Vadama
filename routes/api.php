<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\HoodieApiController;

Route::get('hoodies', [HoodieApiController::class, 'getHoodies']);

