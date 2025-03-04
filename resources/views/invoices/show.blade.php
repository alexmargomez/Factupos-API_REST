<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura Electrimotos</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        .body {
            font-family: 'Roboto', sans-serif;
            margin: 40px;
            color: #333;
            line-height: 1.6;
            background-color: #f0f8ff; /* Color de fondo */
        }
        .header {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
        }
        .details-logo {
            width: 40%;
            height: auto;
            text-align: center;
        }
        .company-logo {
            width: 40%;
            height: auto;
        }
        .company-info {
            text-align: right;
        }
        .details {
            display: flex;
            flex-direction:row;
            justify-content: space-between;
            margin-top: 20px;
             /* Dirección de los elementos en la fila */
        }
        
        .customer-details  {
            text-align: center;
        }
        .invoice-details {
            text-align: right;
        }
        .details > div {
            width: 48%;
        }
        
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .table th, .table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        .table th {
            background-color: #f2f2f2;
        }
        .total {
            text-align: right;
            margin-top: 20px;
            font-weight: bold;
        }
        footer {
            text-align: center;
            margin-top: 40px;
            border-top: 1px solid #000;
            padding-top: 10px;
            font-size: 0.9em;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="details-logo">
            <img src="{{ asset('img/electrimotosSm.svg') }}" class="company-logo" alt="Electrimotos">
        </div>
        <div class="company-info">
            
            <h1>Electrimotos - Carrera 11 #1-11 </h1>
            <p>Email: info@electrimotos.com  |  Teléfono: 123-456-789</p>
            <p>NIT: 123456789-0</p>

        </div>
    </div>
    
    <div class="details">
        
        <div class="vehicle-details">
                <h2>Detalles del Vehículo</h2>
                <p>Marca: {{ $vehicle->make }}</p>
                <p>Modelo: {{ $vehicle->model }}</p>
                <p>Placa: {{ $vehicle->plate }}</p>
        </div>
        
        <div class="customer-details">
                <h2>Detalles del Cliente</h2>
                <p>Nombre: {{ $customer->name }}</p>
                <p>C.C.: {{ $customer->id }}</p>

                <p>Telefono: {{ $customer->phone }}</p>
                <p>Email: {{ $customer->email }}</p>
        </div>
            
        
        <div class="invoice-details">
            <h2>Detalles de la Factura</h2>
            <p>Factura Nº: {{ $invoice->invoice_number }}</p>
            <p>Fecha: {{ $invoice->created_at->format('d/m/Y') }}</p>
        </div>
        
    </div>
    
    <table class="table">
        <thead>
            <tr>
                <th>Descripción</th>
                <th>Cantidad</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $service)
            <tr>
                <td> {{ $service->date }}</td>
                <td> 1</td>
                <td> $ {{ number_format($service->price, 0, ',', '.') }}</td>
            </tr>
            @endforeach
            @foreach ($saleDetails as $detail)
            <tr>
                <td> {{ $detail->product->name }}</td>
                <td> {{$detail->quantity}}</td>
                <td> $ {{ number_format($detail->price_total, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="total">
        <h2>Total a pagar: $ {{ number_format($sale->total, 0, ',', '.') }}</h2>
    </div>
    
    <footer>
        <p>Gracias por su compra</p>
    </footer>
</body>
</html>