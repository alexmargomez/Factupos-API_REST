<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;

class SaleController extends Controller
{
    function index() //Obtener todas las ventas
    {
        $sales = Sale::all();
        return response()->json($sales, 200);
    }

    function create(Request $request) //Crear venta
    {
        $request->validate([
            'customer_id' => 'required|integer',
            'total' => 'required|numeric',
            'payment_method' => 'required|string',
        ]);
        
        $sale = Sale::create($request->all());
        return response()->json($sale, 201);
    }

    function show($id) //Obtener venta
    {
        $sale = Sale::find($id);
        return response()->json($sale, 200);
    }

    function update(Request $request, $id) //Actualizar venta
    {
        $request->validate([
            'customer_id' => 'required|integer',
            'sale_date' => 'required|date',
            'total' => 'required|numeric',
            'payment_method' => 'required|string',
        ]);
        $sale = Sale::find($id);
        $sale->update($request->all());

        return response()->json($sale, 201);

    }

    function destroy($id) //Eliminar venta
    {
        $sale = Sale::find($id);
        $sale->delete();
        return response()->json(null, 204);
    }
}
