<?php

namespace App\Http\Controllers;
use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index() //Listar productos
    {
        $inventory = Inventory::all();
        return response()->json($inventory, 200);
    }

    public function create(Request $request) //Crear inventario
    {
        $request->validate([
            'stock' => 'required|integer',
            'product_id' => 'required|integer',
        ]);
        
        $inventory = Inventory::create($request->all());
        return response()->json($inventory, 201);
    }

    public function stock($id) //Obtener stock de un producto
    {
        $inventory = Inventory::where('product_id', $id)->first();
        return response()->json($inventory, 200);
    }

    public function update(Request $request, $id) //Actualizar stock de un producto
    {
        $request->validate([
            'stock' => 'required|integer',
        ]);
        $inventory = Inventory::where('product_id', $id)->first();
        $inventory->stock = $request->stock;
        $inventory->save();

        return response()->json($inventory, 201);
    }

}
