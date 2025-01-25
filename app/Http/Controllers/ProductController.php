<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index()
    {
        return 'Listado de productos';
    }

    public function create(Request $request)
    {
        return 'Crear un producto';
    }

    public function show(string $id)
    {
        return 'Detalle del producto ' . $id;
    }

    public function update(Request $request, string $id)
    {
        return 'Actualizar el producto ' . $id;
    }

    public function destroy(string $id)
    {
        return 'Eliminar el producto ' . $id;
    }
}
