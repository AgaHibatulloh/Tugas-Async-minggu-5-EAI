<?php
use App\Http\Controllers\WeatherController;

Route::apiResource('weather', WeatherController::class);
