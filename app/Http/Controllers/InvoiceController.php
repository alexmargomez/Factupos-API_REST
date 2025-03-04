<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Sale;
use Barryvdh\Snappy\Facades\SnappyPdf;

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

        $sale = Sale::with(['customer', 'vehicle', 'saleDetails.product', 'services'])->findOrFail($invoice->sale_id);

        $customer = $sale->customer;
        $vehicle = $sale->vehicle;
        $saleDetails = $sale->saleDetails;
        $services = $sale->services;

        $data = [
            'invoice' => $invoice,
            'sale' => $sale,
            'customer' => $customer,
            'vehicle' => $vehicle,
            'saleDetails' => $saleDetails,
            'services' => $services,
        ];

        $pdf = SnappyPdf::loadView('invoices.show', $data);

        return $pdf->download("invoice_{$id}.pdf");
    }

    function update(Request $request, $id) 
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
