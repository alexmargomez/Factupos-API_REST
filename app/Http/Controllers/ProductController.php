<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index() //Listar productos
    {
        $products = Product::all();
        return response()->json($products, 200);
    }

    public function create(Request $request) //Crear producto
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:Categories,id',  
        ]);

        $product = Product::create($request->all());
        return response()->json($product, 201);
    }

    public function show($id) //Seleccionar un producto
    {
        $product = Product::findOrFail($id);
        return response()->json($product, 200);
    }

    public function update(Request $request, $id) //Actualizar producto
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required',  
        ]);
        $product = Product::findOrFail($id);
        $product->update($request->all());

        return response()->json($product, 201);
    }

    public function destroy($id) //Eliminar producto
    {
        $product = Product::findOrFail($id);
        $product->delete();
    
        return response()->json(['message' => 'Producto eliminado exitosamente.'], 200);
    }
}
