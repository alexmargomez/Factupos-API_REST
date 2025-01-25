<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;

Route::post('/login', [LoginController::class, 'login']);
 
Route::middleware('auth:sanctum')->post('/logout', [LoginController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('products')-> group(function(){
        Route::get('/', [ProductController::class, 'index']);
        Route::post('/', [ProductController::class, 'create']);
        Route::get('/{id}', [ProductController::class, 'show']);
        Route::put('/{id}', [ProductController::class, 'update']);
        Route::delete('/{id}', [ProductController::class, 'destroy']);
    });
});

Route::middleware('auth:sanctum')->get('/p', function (){
    return 'Prueba';
});

