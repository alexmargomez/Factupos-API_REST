<!DOCTYPE html>
<html>
<head>
    <title>Invoice {{ $invoice->id }}</title>
    <style>
        /* Estilos para el PDF */
        body {
            font-family: Arial, sans-serif;
        }
        .invoice {
            margin: 20px;
        }
        .header, .footer {
            text-align: center;
        }
        .content {
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="invoice">
        <div class="header">
            <h1>Invoice #{{ $invoice->id }}</h1>
            <p>Date: {{ $invoice->created_at->format('Y-m-d') }}</p>
        </div>
        <div class="content">
            <!-- Aquí van los detalles de la factura -->
            <p><strong>Customer:</strong> {{ $invoice->sale_id }}</p>
            <!-- Añade más detalles según sea necesario -->
        </div>
        <div class="footer">
            <p>Thank you for your business!</p>
        </div>
    </div>
</body>
</html>