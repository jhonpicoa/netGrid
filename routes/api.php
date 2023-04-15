<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PokemonController;
use App\Models\FavoritePokemon;

//  Route::get('users', [UserController::class, 'index']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login',[AuthController::class,'login'])->name('login');

Route::middleware(['auth:sanctum'])->group(function () { 
    Route::get('logout',[AuthController::class,'logout']);
    Route::apiResource('user', UserController::class);
    Route::get('pokemon', [PokemonController::class, 'index']);
    Route::get('pokemon/{id}', [PokemonController::class, 'show']);
    Route::post('favorite/pokemon', [PokemonController::class, 'favoritePokemon']);
});





