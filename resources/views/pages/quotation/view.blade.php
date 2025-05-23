<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quotation - {{ $quotation->quotation_number }}</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 40px;
            background-color: #f9f9f9;
            color: #333;
        }
        .container {
            max-width: 900px;
            margin: auto;
            background: #fff;
            padding: 40px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        header {
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
            margin-bottom: 30px;
        }
        .company-details, .client-details {
            margin-bottom: 30px;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 5px;
        }
        .text-right {
            text-align: right;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ccc;
        }
        th {
            background-color: #f0f0f0;
        }
        .totals td {
            font-weight: bold;
            background-color: #fafafa;
        }
        .footer {
            margin-top: 40px;
            font-size: 13px;
            color: #777;
        }
        .terms {
            margin-top: 30px;
            font-size: 14px;
        }
        .logo {
            max-height: 80px;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <table width="100%">
                <tr>
                    <td><img src="{{ asset('FrontEnd/images/logo.jpg') }}" alt="Company Logo" class="logo"></td>
                    <td class="text-right">
                        <h1>Quotation</h1>
                        <p><strong>No:</strong> {{ $quotation->quot_number }}</p>
                        <p><strong>Date:</strong> {{ $quotation->quot_date }}</p>
                    </td>
                </tr>
            </table>
        </header>

        <div class="company-details">
            <strong>From:</strong><br>
            {{ auth()->user()->company->comp_name }}<br>
            {{ auth()->user()->company->comp_address }}<br>
            Email: {{ auth()->user()->company->comp_email }}<br>
            Phone: {{ auth()->user()->company->comp_mobile }}
        </div>

        <div class="client-details">
            <strong>To:</strong><br>
            {{ $quotation->party->party_name }}<br>
            {{ $quotation->party->party_address }}<br>
            Email: {{ $quotation->party->party_email }}<br>
            Mobile: {{ $quotation->party->party_mobile }}
        </div>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Description</th>
                    <th>Tax</th>
                    <th>Qty</th>
                    <th>Rate</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total= 0;
                @endphp
                @foreach($quotation->items as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->qd_name }}</td>
                        <td>{{ $item->tax->tax_name }}</td>
                        <td>{{ $item->qd_qty }}</td>
                        <td>{{ number_format($item->qd_rate, 2) }}</td>
                        <td>{{ number_format($item->qd_qty * $item->qd_rate, 2) }}</td>
                    </tr>
                    @php
                        $total = $total + ($item->qd_qty * $item->qd_rate);
                    @endphp
                @endforeach
            </tbody>
            <tfoot>
                <tr class="totals">
                    <td colspan="5" class="text-right">Total</td>
                    <td>{{ number_format($total, 2) }}</td>
                </tr>
            </tfoot>
        </table>

        <div class="terms">
            <strong>Terms & Conditions:</strong>
            <ul>
                <li>Payment terms: Within 15 days from date of invoice.</li>
                <li>Delivery timeline: Within 7 working days from PO.</li>
                <li>This quotation is valid for 30 days from the date above.</li>
            </ul>
        </div>

        <div class="footer text-right">
            <p>Authorized Signatory</p>
            <p>{{ config('app.company_name') }}</p>
        </div>
    </div>
</body>
</html>