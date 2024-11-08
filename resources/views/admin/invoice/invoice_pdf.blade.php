<!-- resources/views/invoice_pdf.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .invoice-header, .invoice-footer {
            text-align: center;
        }
        .invoice-details, .invoice-items {
            width: 100%;
            border-collapse: collapse;
        }
        .invoice-details td, .invoice-items th, .invoice-items td {
            border: 1px solid #000;
            padding: 8px;
        }
        .invoice-items th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <div class="invoice-header">
        <img src="{{ storage_path('app/public/' . $invoice->logo_path) }}" alt="Logo" style="max-width: 200px;"/>
        <h2>{{ $invoice->business_name }}</h2>
        <p>{{ $invoice->invoice_data['business_info'] }}</p>
        <p><strong>Invoice Number:</strong> {{ $invoice->invoice_number }} <br/>
        <strong>Date:</strong> {{ $invoice->invoice_date }} <br/>
        <strong>Due Date:</strong> {{ $invoice->due_date }}</p>
    </div>

    <div class="invoice-details">
        <p><strong>Bill To:</strong> {{ $invoice->invoice_data['client_info'] }}</p>
    </div>

    <div class="invoice-items">
        <table>
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Tax</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach($invoice->invoice_data['description'] as $index => $description)
                <tr>
                    <td>{{ $description }}</td>
                    <td>{{ $invoice->invoice_data['quantity'][$index] }}</td>
                    <td>{{ $invoice->invoice_data['unitPrice'][$index] }}</td>
                    <td>{{ $invoice->invoice_data['tax'][$index] }}</td>
                    <td>{{ $invoice->invoice_data['quantity'][$index] * $invoice->invoice_data['unitPrice'][$index] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="invoice-footer">
        <p><strong>Total:</strong> {{ $invoice->invoice_data['total'] }}</p>
        <p><strong>Discount:</strong> {{ $invoice->invoice_data['discount'] }}</p>
    </div>

</body>
</html>