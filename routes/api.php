<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NetworkController;

Route::prefix('networks')->group(function () {
    Route::get('/', [NetworkController::class, 'index']);         // All networks
    Route::get('/mainnets', [NetworkController::class, 'mainnets']); // Mainnets
    Route::get('/testnets', [NetworkController::class, 'testnets']); // Testnets
    Route::get('/{chainId}', [NetworkController::class, 'show']);    // By chain ID
});
