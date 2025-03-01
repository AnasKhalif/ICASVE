<!DOCTYPE html>
<html>

<head>
    <title>Registration Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border: 1px solid #dddddd;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .email-header {
            text-align: center;
            border-bottom: 2px solid #dddddd;
            margin-bottom: 20px;
            padding-bottom: 10px;
        }

        .email-header h1 {
            font-size: 24px;
            margin: 0;
            color: #333333;
        }

        .email-body p {
            margin: 10px 0;
            color: #555555;
        }

        .email-body strong {
            color: #333333;
        }

        .email-footer {
            margin-top: 20px;
            padding-top: 10px;
            border-top: 2px solid #dddddd;
            text-align: center;
            color: #999999;
            font-size: 12px;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .highlight {
            background-color: #f8f9fa;
            padding: 8px;
            border-radius: 4px;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="email-header">
            <h1>Registration Confirmation</h1>
        </div>
        <div class="email-body">
            <p>Dear Sir/Madam,</p>
            <p>Thank you for your registration for <strong>The 3rd International Conference on Applied Science for
                    Vocational Education</strong>. Your registration details are listed as follows:</p>
            <p><strong>Name:</strong> {{ $details['name'] }}</p>
            <p><strong>Institution:</strong> {{ $details['institution'] }}</p>
            <p><strong>Job Title:</strong> {{ $details['job_title'] }}</p>
            <p><strong>Email Address:</strong> {{ $details['email'] }}</p>
            <p><strong>Phone Number:</strong> {{ $details['phone_number'] }}</p>
            <p><strong>Registration Type:</strong> {{ $details['registration_type'] }}</p>
            </p>
            <p>
                *) The registered email and registration access code are required for submitting your presentation
                abstract.<br>
                If you choose to give a presentation, you must submit an abstract to be reviewed by our reviewer. Please
                visit the following page for abstract requirement and submission:<br>
                <a
                    href="https://icasve.konferensi.net/index.php/abstract">https://icasve.konferensi.net/index.php/abstract</a>
            </p>
            <p>All attendants are required to pay a registration fee. The payment instruction will be announced in the
                near
                future.</p>
        </div>
        <div class="email-footer">
            <p>Sincerely,<br>Committee members,<br>The 3rd International Conference on Applied Science for Vocational
                Education</p>
        </div>
    </div>
</body>

</html>
