<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SaleDetail; 

class SaleDetailController extends Controller
{
    function index() //Obtener todos los detalles de venta
    {
        $sale_details = SaleDetail::all();
        return response()->json($sale_details, 200);
    }
    
    function create(Request $request) //Crear detalle de venta
    {
        $request->validate([
            'sale_id' => 'required|integer',
            'product_id' => 'required|integer',
            'quantity' => 'required|integer',
            'price_total' => 'required|integer',
        ]);
        
        $sale_detail = SaleDetail::create($request->all());
        return response()->json($sale_detail, 201);
    }

    function show($id) //Obtener detalle de venta
    {
        $sale_detail = SaleDetail::find($id);
        return response()->json($sale_detail, 200);
    }

    function update(Request $request, $id) //Actualizar detalle de venta
    {
        $request->validate([
            'sale_id' => 'required|integer',
            'product_id' => 'required|integer',
            'quantity' => 'required|integer',
            'total' => 'required|interger',
        ]);
        $sale_detail = SaleDetail::find($id);
        $sale_detail->update($request->all());

        return response()->json($sale_detail, 201);

    }

    function destroy($id) //Eliminar detalle de venta
    {
        $sale_detail = SaleDetail::find($id);
        $sale_detail->delete();
        return response()->json(null, 204);
    }
}
