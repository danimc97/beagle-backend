<?php

use Beagle\Infrastructure\Http\Controllers\DeleteSuperHeroController;
use Beagle\Infrastructure\Http\Controllers\EditSuperHeroController;
use Beagle\Infrastructure\Http\Controllers\GetAllSuperHeroController;
use Beagle\Infrastructure\Http\Controllers\GetSuperHeroController;
use Beagle\Infrastructure\Http\Controllers\SaveSuperHeroController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/hero/create', [SaveSuperHeroController::class, "action"]);

Route::put('/hero/edit/{id}', [EditSuperHeroController::class, "action"]);

Route::get('/heroes', [GetAllSuperHeroController::class, "action"]);

Route::get('/hero/{id}', [GetSuperHeroController::class, "action"]);

Route::delete('/hero/delete/{id}', [DeleteSuperHeroController::class, 'action']);
