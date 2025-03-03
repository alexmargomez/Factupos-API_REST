<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    function index() //Obtener todas las facturas
    {
        $invoices = Invoice::all();
        return response()->json($invoices, 200);
    }
    
    function create(Request $request) //Crear factura
    {
        $request->validate([
            'sale_id' => 'required|integer',
            
        ]);
        
        $invoice = Invoice::create($request->all());
        return response()->json($invoice, 201);
    }

    function show($id) //Obtener factura
    {
        $invoice = Invoice::where('sale_id', $id)->get();
        return response()->json($invoice, 200);
    }

    function showPdf($id) //Obtener factura PDF
    {
        $invoice = Invoice::findOrFail($id);
        $data = ['invoice' => $invoice];

        $pdf = Pdf::loadView('invoices.show', $data);

        return $pdf->download("invoice_{$id}.pdf");
    }

    function update(Request $request, $id) //Actualizar factura
    {
        $request->validate([
            'sale_id' => 'required|integer',  
        ]);
        $invoice = Invoice::find($id);
        $invoice->update($request->all());

        return response()->json($invoice, 201);

    }

    function destroy($id) //Eliminar factura
    {
        $invoice = Invoice::find($id);
        $invoice->delete();
        return response()->json(null, 204);
    }

}
