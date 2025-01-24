<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

Route::post('/login', function (Request $request) {

    $credentials = $request->validate([
        'name' => 'required|string',  
        'password' => 'required|string',
    ]);

    $user = User::where('name', $credentials['name'])->first();

    if (!$user || !Hash::check($credentials['password'], $user->password)) {
        return response()->json(['message' => 'Credenciales inválidas'], 401);
    }

    return response()->json(['message' => 'Inicio de sesión exitoso']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
