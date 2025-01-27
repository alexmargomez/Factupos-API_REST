<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InventoryMovement;


class InventoryMovementController extends Controller
{
    function index() //Obtener todos los movimientos de inventario
    {
        $inventory_movements = InventoryMovement::all();
        return response()->json($inventory_movements, 200);
    }
    
    function create(Request $request) //Crear movimiento de inventario
    {
        $request->validate([
            'inventory_id' => 'required|integer',
            'movement_type' => 'required|string',
            'quantity' => 'required|integer',
            'movement_date' => 'required|date',
            'reason' => 'required|string',
        ]);
        
        $inventory_movement = InventoryMovement::create($request->all());
        return response()->json($inventory_movement, 201);
    }


    function show($id) //Obtener movimiento de inventario
    {
        $inventory_movement = InventoryMovement::find($id);
        return response()->json($inventory_movement, 200);
    }

    function update(Request $request, $id) //Actualizar movimiento de inventario
    {
        $request->validate([
            'inventory_id' => 'required|integer',
            'movement_type' => 'required|string',
            'quantity' => 'required|integer',
            'movement_date' => 'required|date',
            'reason' => 'required|string',
        ]);
        $inventory_movement= InventoryMovement::where('inventory_id', $id)->first();
        $inventory_movement->update($request->all());

        return response()->json($inventory_movement, 201);

    }

    function destroy($id) //Eliminar movimiento de inventario
    {
        $inventory_movement = InventoryMovement::find($id);
        $inventory_movement->delete();
        return response()->json(null, 204);
    }
}
