<!DOCTYPE html>
<html>
<head>
    <title>Delivery Challan - {{ 'DC' }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 40px;
            background: #fff;
        }
        .container {
            border: 1px solid #000;
            padding: 30px;
            max-width: 900px;
            margin: auto;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .header, .footer {
            text-align: center;
        }
        .header h2 {
            margin: 0;
            font-size: 24px;
        }
        .header p {
            font-size: 18px;
            margin-top: 5px;
        }
        .details, .items {
            width: 100%;
            margin-top: 25px;
            border-collapse: collapse;
        }
        .details td {
            padding: 6px 10px;
            font-size: 14px;
        }
        .items th, .items td {
            border: 1px solid #000;
            padding: 10px;
            text-align: left;
            font-size: 14px;
        }
        .items th {
            background-color: #f8f8f8;
            font-weight: bold;
        }
        .signature {
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
        }
        .signature div {
            text-align: center;
            width: 30%;
            font-size: 14px;
        }
        .footer p {
            margin-top: 40px;
            font-size: 12px;
            color: #555;
        }
        .no-print {
            text-align: right;
            margin-bottom: 20px;
        }
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="no-print">
            <button onclick="window.print()">Print</button>
            @if ($dc->dconr_dispactch_status != "done")
            <a href="{{ route('dconrDispatch',request('id')) }}">Dispatch</a>
            @endif
        </div>

        <div class="header">
            <h2>{{ Auth::user()->company->comp_name }}</h2>
            <p><strong>Delivery Challan</strong></p>
        </div>

        <table class="details">
            <tr>
                <td><strong>DC No:</strong> {{ $dc->dconr_number }}</td>
                <td><strong>Date:</strong> {{ \Carbon\Carbon::parse($dc->dconr_date)->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <td><strong>Party Name:</strong> {{ $dc->party->party_name ?? '-' }}</td>
                <td><strong>Address:</strong> {{ $dc->party->party_address ?? '-' }}</td>
            </tr>
        </table>

        <table class="items">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Description</th>
                    <th>Qty</th>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dc->items as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->item->item_name }}</td>
                    <td>{{ $item->dconri_qty }}</td>
                    <td>{{ $item->dconri_remark ?? '' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="signature">
            <div>
                <p>Prepared By</p>
                <br><br>
                <p>___________________</p>
            </div>
            <div>
                <p>Approved By</p>
                <br><br>
                <p>___________________</p>
            </div>
            <div>
                <p>Receiver's Signature</p>
                <br><br>
                <p>___________________</p>
            </div>
        </div>

        <div class="footer">
            <p>This is a system generated Delivery Challan.</p>
        </div>
    </div>
</body>
</html>
