<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PaireController;
use App\Http\Controllers\API\CurrencieController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(function () {
    Route::get('/api/pairs', [PaireController::class, 'index']); // Route pour récupérer la liste des paires
    Route::post('/api/pairs', [PaireController::class, 'store']); // Route pour créer une nouvelle paire

    // Ajoutez la route "currencies" pour récupérer la liste des devises
    Route::get('/api/currencies', [CurrencieController::class, 'index']);
    
    // Autres routes...
});