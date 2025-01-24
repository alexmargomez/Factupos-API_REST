<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Middleware\AttachBearerToken;

Route::post('/login', function (Request $request) {
    // Validar las credenciales
    $credentials = $request->validate([
        'name' => 'required|string', 
        'password' => 'required|string',
    ]);

    // Buscar el usuario por su 'name'
    $user = User::where('name', $credentials['name'])->first();

    // Verificar la contraseña
    if (!$user || !Hash::check($credentials['password'], $user->password)) {
        return response()->json(['message' => 'Credenciales inválidas'], 401);
    }

    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json([
        'access_token' => $token,
        'token_type' => 'Bearer',
    ]);
});


Route::middleware('auth:sanctum')->post('/logout', function (Request $request) {
    // Elimina el token actual del usuario
    $request->user()->currentAccessToken()->delete();
    // Devuelve una respuesta de éxito
    return response()->json(['message' => 'Cierre de sesión exitoso']);
});


Route::middleware('auth:sanctum')->get('/user', function (){
    return 'hola';
});

