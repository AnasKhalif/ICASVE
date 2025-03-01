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
            text-align: center;
            margin-bottom: 20px;
        }

        .title {
            font-size: 20px;
            font-weight: bold;
        }

        .details {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="title">INVOICE</div>
            <strong>{{ $conference->conference_title }}</strong>.
        </div>

        <div class="details">
            <p><strong>Bill To:</strong> <br>
                {{ $user->name }}<br>
                {{ $user->institution }}</p>

            <p><strong>Date:</strong> <br>
                {{ now()->format('d F Y') }}<br>
            </p>
        </div>

        <table class="table">
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
                    <td> <strong>{{ $abstract->title }}</strong></td>
                    <td>1</td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
