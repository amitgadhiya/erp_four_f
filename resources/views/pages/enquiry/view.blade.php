<!-- resources/views/quotation/print.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quotation #123</title>
    <style>
        /* Add some simple styling for the print view */
        body {
            font-family: Arial, sans-serif;
        }
        .quotation {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .quotation-header {
            text-align: center;
            margin-bottom: 40px;
        }
        .quotation-details {
            margin-bottom: 20px;
        }
        .quotation-footer {
            text-align: center;
            margin-top: 40px;
        }
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="quotation">
        <div class="quotation-header">
            <h1>Quotation #</h1>
        </div>

        <div class="quotation-details">
            <p><strong>Client:</strong> Client Name</p>
            <p><strong>Date:</strong> 12-12-2024</p>
            <p><strong>Total:</strong> 2,00,000</p>
        </div>

        <table border="1" cellpadding="10" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Sr</th>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>1</th>
                    <th>Item</th>
                    <th>1</th>
                    <th>1,00,000</th>
                    <th>1,00,000</th>
                </tr>
                <tr>
                    <th>2</th>
                    <th>Item</th>
                    <th>1</th>
                    <th>1,00,000</th>
                    <th>1,00,000</th>
                </tr>
            </tbody>
        </table>

        <div class="quotation-footer">
            <p>Thank you for your business!</p>
        </div>

        <button class="no-print" onclick="window.print()">Print Quotation</button>
    </div>
</body>
</html>
