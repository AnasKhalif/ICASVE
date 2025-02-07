<!DOCTYPE html>
<html>

<head>
    <title>Acceptance Letter</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 50px;
            background-color: #f9f9f9;
        }

        header {
            text-align: center;
            margin-bottom: 30px;
        }

        .letter-wrapper {
            background-color: #ffffff;
            padding: 30px;
            border: 2px solid #ddd;
            border-radius: 10px;
            max-width: 800px;
            margin: auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .title {
            font-size: 28px;
            text-align: center;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
            border-bottom: 2px solid #ddd;
            padding-bottom: 10px;
        }

        p {
            font-size: 16px;
            color: #555;
            line-height: 1.6;
        }

        .right-align {
            text-align: right;
            font-weight: bold;
            margin-top: 40px;
        }

        .signature {
            margin-top: 50px;
            text-align: right;
        }

        .signature img {
            height: 80px;
            margin-bottom: 10px;
        }

        .content-box {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            background-color: #f7f7f7;
            margin-top: 20px;
        }

        .bold {
            font-weight: bold;
        }

        .center-text {
            text-align: center;
        }
    </style>
</head>

<body>
    <header>
        <img src="{{ public_path('templates/letthead.png') }}" alt="Letterhead" style="width: 100%;">
    </header>

    <div class="letter-wrapper">
        <div class="title">OFFICIAL RECEIPT</div>

        <div class="content-box">
            <p>No: <span class="bold">REG/{{ $filePayment->user->id }}</span></p>
            <p>Date: <span class="bold">{{ $filePayment->created_at }}</span></p>
            <p>Received from: <span class="bold">{{ $filePayment->user->name }}</span></p>
            <p>Sum: <span class="bold">{{ $filePayment->amount }}</span></p>
            <p>As a payment for: <span class="bold">
                    @if ($filePayment->user->abstracts->isNotEmpty())
                        {{ $filePayment->user->abstracts->pluck('title')->implode(', ') }}
                    @else
                        No abstract submitted
                    @endif
                </span></p>
        </div>

        <p class="right-align">Sincerely,</p>

        <div class="signature">
            <img src="{{ public_path('templates/signature.jpg') }}" alt="Signature">
            <p><strong>Dr. A. Fadida Bahama, SE.Par., M.Sc., CHE.</strong></p>
            <p>Conference Chairperson</p>
        </div>
    </div>
</body>

</html>
