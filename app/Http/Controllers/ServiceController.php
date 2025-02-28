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
        ]);

        $service = Service::create($request->all());

        return response()->json($service, 201);
    }
}
