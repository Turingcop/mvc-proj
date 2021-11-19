<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{DiceController, StatController, YatzyController, SessionController, ScoreController};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [StatController::class, 'show']);

Route::get('/test', [DiceController::class, 'show']);
Route::post('/test', [DiceController::class, 'show']);

Route::prefix('yatzy')->group(function () {
    Route::get('', [YatzyController::class, 'start']);
    Route::post('', [YatzyController::class, 'play']);
    Route::post('/putscore', [YatzyController::class, 'putscore']);
    Route::post('/restart', [YatzyController::class, 'reset']);
});

Route::get('/score', [ScoreController::class, 'desc']);
Route::get('/score/pointsasc', [ScoreController::class, 'asc']);
