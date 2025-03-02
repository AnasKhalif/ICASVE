<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        .container {
            width: 90%;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
        }

        .header {
            margin-bottom: 20px;
        }

        .title {
            font-size: 20px;
            font-weight: bold;
        }

        .details {
            margin-bottom: 20px;
        }

        .signature {
            margin-top: 50px;
            text-align: left;
        }

        .logo {
            width: 100px;
        }

        .table-signature {
            width: 100%;
            margin-top: 50px;
        }

        .table-signature td {
            vertical-align: top;
        }

        .signature img {
            width: 150px;
        }

        .summary-table {
            width: 50%;
            float: right;
            margin-top: 20px;
        }

        .summary-table td {
            padding: 5px;
        }

        th {
            background-color: #ebeced;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <table width="100%">
                <tr>
                    <td width="30%">
                        <img src="{{ $logoPath }}" alt="Logo" class="logo">
                    </td>
                    <td width="70%" style="text-align: right;">
                        <h2>INVOICE</h2>
                        <strong>{{ $conference->conference_title }}</strong>
                    </td>
                </tr>
            </table>
        </div>

        <div class="details">
            <p><strong>Bill To:</strong> <br>
                {{ $user->name }}<br>
                {{ $user->institution }}</p>

            <p><strong>Date:</strong> <br>
                {{ now()->format('d F Y') }}<br>
            </p>
        </div>

        <table width="100%" cellspacing="0" cellpadding="5">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Abstract</th>
                    <th>QTY</th>
                    <th>Price</th>
                    <th>Amount (IDR)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td><strong>{{ $abstract->title }}</strong></td>
                    <td>1</td>
                    <td>{{ number_format($amount, 0, ',', '.') }}</td>
                    <td>{{ number_format($amount, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>

        <table class="summary-table">
            <tr>
                <td><strong>Subtotal</strong></td>
                <td>{{ number_format($amount, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td><strong>Total</strong></td>
                <td>{{ number_format($amount, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td><strong>Amount Due</strong></td>
                <td>{{ number_format($amount, 0, ',', '.') }}</td>
            </tr>
        </table>

        <table class="table-signature">
            <tr>
                <td width="50%">
                    <div class="signature">
                        <p><strong>Authorized By</strong></p>
                        <img src="{{ $signaturePath }}" alt="Signature">
                        <p>Conference Chairperson</p>
                    </div>
                </td>
                <td width="50%"></td>
            </tr>
        </table>
    </div>
</body>

</html>
