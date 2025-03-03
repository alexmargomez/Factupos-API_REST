<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
</head>
<body>
    <h1>Invoice #{{ $invoice->id }}</h1>
    <p>Date: {{ $invoice->created_at }}</p>

    <h2>Customer Details</h2>
    <p>Name: {{ $customer->name }}</p>
    <p>Email: {{ $customer->email }}</p>

    <h2>Vehicle Details</h2>
    <p>Make: {{ $vehicle->make }}</p>
    <p>Model: {{ $vehicle->model }}</p>

    <h2>Sale Details</h2>
    <p>Sale ID: {{ $sale->total }}</p>
</body>
</html>