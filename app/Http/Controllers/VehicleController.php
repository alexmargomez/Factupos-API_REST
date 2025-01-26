<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    
    public function index() //Listar productos
    {
        $vehicle = Vehicle::all();
        return response()->json($vehicle, 200);
    }

    public function create(Request $request) //Crear producto
    {
        $request->validate([
            'plate' => 'required|string',
            'model' => 'required|string',
            'make' => 'required|string',
            'customer_id' => 'required ',  
        ]);

        $vehicle = Vehicle::create($request->all());
        return response()->json($vehicle, 201);
    }

    public function show($id) //Seleccionar un producto
    {
        $vehicle = Vehicle::findOrFail($id);
        return response()->json($vehicle, 200);
    }

    public function update(Request $request, $id) //Actualizar producto
    {
        $request->validate([
            'plate' => 'required|string',
            'model' => 'required|string',
            'make' => 'required|string',
            'customer_id' => 'required',  
        ]);
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->update($request->all());

        return response()->json($vehicle, 201);
    }

    public function destroy($id) //Eliminar producto
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();
    
        return response()->json(['message' => 'Vehículo eliminado exitosamente.'], 200);
    }
}
