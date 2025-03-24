<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
// Mostrar una lista de todos los trabajadores
    public function index()
    {
        $workers = Worker::all();
        return response()->json($workers);
    }

    // Mostrar un trabajador específico
    public function show($id)
    {
        $worker = Worker::find($id);
        if ($worker) {
            return response()->json($worker);
        } else {
            return response()->json(['message' => 'Worker not found'], 404);
        }
    }

    // Crear un nuevo trabajador
    public function store(Request $request)
    {
        $worker = Worker::create($request->all());
        return response()->json($worker, 201);
    }

    // Actualizar un trabajador existente
    public function update(Request $request, $id)
    {
        $worker = Worker::find($id);
        if ($worker) {
            $worker->update($request->all());
            return response()->json($worker);
        } else {
            return response()->json(['message' => 'Worker not found'], 404);
        }
    }

    // Eliminar un trabajador
    public function destroy($id)
    {
        $worker = Worker::find($id);
        if ($worker) {
            $worker->delete();
            return response()->json(['message' => 'Worker deleted']);
        } else {
            return response()->json(['message' => 'Worker not found'], 404);
        }
    }    
}
