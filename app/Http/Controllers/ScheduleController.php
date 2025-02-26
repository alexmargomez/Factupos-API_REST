<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedule = Schedule::all();
        return response()->json($schedule);
    }

    public function create(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:Customers,id',
            'servicios' => 'required|array',
            'vehicle_id' => 'required|exists:Vehicles,id',
            'state' => 'required|in:Pendiente,Completado',
        ]);

        $schedule = Schedule::create([
            'customer_id' => $request->customer_id,
            'state' => $request->state,
            'vehicle_id' => $request->vehicle_id,
            'servicios' => json_encode($request->servicios), // Encode the array to JSON
        ]);

        return response()->json($schedule, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_id' => 'required|exists:Customers,id',
            'servicios' => 'required|array',
            'vehicle_id' => 'required|exists:Vehicles,id',
            'state' => 'required|in:Pendiente,Completado',
        ]);

        $schedule = Schedule::find($id);
        $schedule->update([
            'customer_id' => $request->customer_id,
            'state' => $request->state,
            'vehicle_id' => $request->vehicle_id,
            'servicios' => json_encode($request->servicios),
        ]);

        return response()->json($schedule, 201);
    }

    public function show($id)
    {
        $schedule = Schedule::find($id);
        return response()->json($schedule, 200);
    }
    
    public function destroy(string $id)
    {
        $schedule->delete();

        return response()->json(null, 204);
    }
}
