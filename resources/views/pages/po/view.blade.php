<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Purchase Order - {{ $po->po_number }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            color: #000;
        }
        h2 {
            margin-bottom: 5px;
        }
        .header, .section {
            margin-bottom: 20px;
        }
        .section h5 {
            margin-bottom: 10px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        .table th, .table td {
            border: 1px solid #888;
            padding: 8px;
            text-align: left;
        }
        .signature {
            display: flex;
            justify-content: space-between;
            margin-top: 50px;
        }
        .signature div {
            width: 45%;
            text-align: center;
            border-top: 1px solid #000;
            padding-top: 5px;
        }
        @media print {
            .no-print {
                display: none !important;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <h2 style="text-align: center;">Purchase Order</h2>
        <p><strong>PO Number:</strong> {{ $po->po_number }}</p>
        <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($po->po_date)->format('d-m-Y') }}</p>
    </div>

    <div class="section">
        <h5>Supplier Information</h5>
        <p>
            <strong>Name:</strong> {{ $po->party->party_name }}<br>
            <strong>Address:</strong> {{ $po->party->party_address }}<br>
            <strong>Phone:</strong> {{ $po->party->party_mobile }}<br>
            <strong>Email:</strong> {{ $po->party->party_email }}
        </p>
    </div>

    <div class="section">
        <h5>Company Information</h5>
        <p>
            <strong>{{ Auth::user()->company->comp_name }}</strong><br>
            {{ Auth::user()->company->comp_address }}<br>
            {{ Auth::user()->company->comp_mobile }}<br>
            {{ Auth::user()->company->comp_email }}
        </p>
    </div>

    <div class="section">
        <h5>Items</h5>
        <table class="table">
            <thead>
                <tr>
                    <th>Sr.</th>
                    <th>Description</th>
                    <th>Qty</th>
                    <th>Rate</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total = 0;
                @endphp
                @foreach($po->items as $i => $item)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>
                        {{ $item->item->item_name }}<br>
                        {{ $item->poi_desc }}

                    </td>
                    <td>{{ $item->poi_qty }}</td>
                    <td>{{ number_format($item->poi_rate, 2) }}</td>
                    <td>{{ number_format($item->poi_rate * $item->poi_qty, 2) }}</td>
                </tr>
                @php
                    $total = $total + $item->poi_rate * $item->poi_qty;
                    
                @endphp
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" style="text-align: right;"><strong>Total</strong></td>
                    <td>{{ number_format($total, 2) }}</td>
                </tr>
                
            </tfoot>
        </table>
    </div>

    <div class="signature">
        <div>Authorized Signature</div>
        <div>Supplier Signature</div>
    </div>

    <div class="no-print" style="margin-top: 30px;">
        <button onclick="window.print()">🖨️ Print PO</button>
    </div>
</body>
</html>
