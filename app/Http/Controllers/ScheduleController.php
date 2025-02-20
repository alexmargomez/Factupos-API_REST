<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedule = Schedule::all();
        return response()->json($schedule);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:Customers,id',
            'servicios' => 'required|array',
        ]);

        $schedule = Schedule::create([
            'customer_id' => $request->customer_id,
            
            'servicios' => json_encode($request->servicios), // Encode the array to JSON
        ]);

        return response()->json($schedule, 201);
    }

    public function show($id)
    {
        $schedule = Schedule::find($id);
        return response()->json($schedule, 200);
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $schedule->delete();

        return response()->json(null, 204);
    }
}
