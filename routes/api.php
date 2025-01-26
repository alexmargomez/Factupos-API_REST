<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InventoryController;

Route::post('/login', [LoginController::class, 'login']); // Ruta para iniciar sesión
 
Route::middleware('auth:sanctum')->post('/logout', [LoginController::class, 'logout']); // Ruta para cerrar sesión

// Rutas protegidas CRUD de productos
Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('customers')-> group(function(){
        Route::get('/', [CustomerController::class, 'index']);
        Route::post('/', [CustomerController::class, 'create']);
        Route::get('/{id}', [CustomerController::class, 'show']);
        Route::put('/{id}', [CustomerController::class, 'update']);
        Route::delete('/{id}', [CustomerController::class, 'destroy']);
    });
    Route::prefix('products')-> group(function(){
        Route::get('/', [ProductController::class, 'index']);
        Route::post('/', [ProductController::class, 'create']);
        Route::get('/{id}', [ProductController::class, 'show']);
        Route::put('/{id}', [ProductController::class, 'update']);
        Route::delete('/{id}', [ProductController::class, 'destroy']);
    });
    Route::prefix('vehicles')-> group(function(){
        Route::get('/', [VehicleController::class, 'index']);
        Route::post('/', [VehicleController::class, 'create']);
        Route::get('/{id}', [VehicleController::class, 'show']);
        Route::put('/{id}', [VehicleController::class, 'update']);
        Route::delete('/{id}', [VehicleController::class, 'destroy']);
    });
    
    Route::prefix('categories')-> group(function(){
        Route::get('/', [CategoryController::class, 'index']);
        Route::post('/', [CategoryController::class, 'create']);
        Route::get('/{id}', [CategoryController::class, 'show']);
        Route::put('/{id}', [CategoryController::class, 'update']);
        Route::delete('/{id}', [CategoryController::class, 'destroy']);
    });

    Route::prefix('inventories')-> group(function(){
        Route::post('/', [InventoryController::class, 'create']);
        Route::get('/{id}', [InventoryController::class, 'stock']);
        Route::put('/{id}', [InventoryController::class, 'update']);
    });

});



Route::middleware('auth:sanctum')->get('/p', function (){
    return 'Prueba';
});

