<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index() //Listar productos
    {
        $customers = Customer::all();
        return response()->json($customers, 200);
    }

    public function create(Request $request) //Crear producto
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
        ]);
        
        $customer = Customer::create($request->all());
        return response()->json($customer, 201);
    }

    public function show($id) //Seleccionar un producto
    {
        $customer = Customer::findOrFail($id);
        return response()->json($customer, 200);
    }

    public function update(Request $request, $id) //Actualizar producto
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
        ]);
        $customer = Customer::findOrFail($id);
        $customer->update($request->all());

        return response()->json($customer, 201);
    }

    public function destroy($id) //Eliminar producto
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
    
        return response()->json(['message' => 'Cliente eliminado exitosamente.'], 200);
    }
}
