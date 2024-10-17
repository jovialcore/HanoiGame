<?php

use Illuminate\Support\Facades\Route;


Route::get('/state', [App\Http\Controllers\HanoiGameController::class, 'getState' ]);


Route::post('move/{from}/{to}', [App\Http\Controllers\HanoiGameController::class, 'move' ]);
