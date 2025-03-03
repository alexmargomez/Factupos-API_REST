<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'sale_id' => 'required|integer',
            'date' => 'required|string',
            'price' => 'required|integer',
            'customer_id' => 'required|integer',
            'vehicle_id' => 'required|integer',
        ]);

        $service = Service::create($request->all());

        return response()->json($service, 201);
    }

    public function show($id)
    {
        $service = Service::where('sale_id', $id)->get();
        return response()->json($service, 201);
    }

    public function showCustomer($id)
    {
        $service = Service::where('customer_id', $id)->get();
        return response()->json($service, 201);
    }

    public function showVehicle($id)
    {
        $service = Service::where('vehicle_id', $id)->get();
        return response()->json($service, 201);
    }
}
