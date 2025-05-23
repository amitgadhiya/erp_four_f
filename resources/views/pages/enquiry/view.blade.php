<!DOCTYPE html>
<html>
<head>
    <title>Quotation - {{ $quotation->quotation_number }}</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 14px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .header, .footer { text-align: center; margin-bottom: 20px; }
        .company-info, .client-info { margin-bottom: 20px; }
        .totals td { font-weight: bold; }
    </style>
</head>
<body>

    <div class="header">
        <h2>Your Company Name</h2>
        <p>Address Line 1, Address Line 2</p>
        <p>Email: info@company.com | Phone: +91-1234567890</p>
    </div>

    <div class="company-info">
        <strong>Quotation No:</strong> {{ $quotation->quotation_number }}<br>
        <strong>Date:</strong> {{ \Carbon\Carbon::parse($quotation->date)->format('d-m-Y') }}
    </div>

    <div class="client-info">
        <strong>To:</strong><br>
        {{ $quotation->party->party_name }}<br>
        {{ $quotation->client->address }}<br>
        Email: {{ $quotation->client->email }}<br>
        Mobile: {{ $quotation->client->mobile }}
    </div>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Description</th>
                <th>HSN</th>
                <th>Qty</th>
                <th>Rate</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach($quotation->items as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->hsn }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ number_format($item->rate, 2) }}</td>
                <td>{{ number_format($item->amount, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot class="totals">
            <tr>
                <td colspan="5" style="text-align:right;">Total</td>
                <td>{{ number_format($quotation->total_amount, 2) }}</td>
            </tr>
        </tfoot>
    </table>

    <div style="margin-top: 30px;">
        <strong>Terms & Conditions:</strong><br>
        <ul>
            <li>Payment due within 15 days.</li>
            <li>GST is included/excluded (as applicable).</li>
            <li>Delivery within 7 working days.</li>
        </ul>
    </div>

    <div class="footer">
        <p>Thank you for your business!</p>
    </div>

</body>
</html>
