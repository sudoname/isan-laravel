<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Approved</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header {
            background: linear-gradient(135deg, #14b8a6 0%, #0d9488 100%);
            color: white;
            padding: 30px 20px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 28px;
        }
        .content {
            padding: 30px 20px;
        }
        .content p {
            margin: 0 0 15px 0;
        }
        .info-box {
            background-color: #f0fdfa;
            border-left: 4px solid #14b8a6;
            padding: 15px;
            margin: 20px 0;
            border-radius: 4px;
        }
        .info-box strong {
            color: #0d9488;
        }
        .button {
            display: inline-block;
            padding: 12px 30px;
            background-color: #14b8a6;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px 0;
            font-weight: bold;
        }
        .footer {
            background-color: #f9fafb;
            padding: 20px;
            text-align: center;
            font-size: 14px;
            color: #6b7280;
            border-top: 1px solid #e5e7eb;
        }
        .checkmark {
            font-size: 48px;
            color: #10b981;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <div class="checkmark">✓</div>
            <h1>Registration Approved!</h1>
        </div>

        <div class="content">
            <p>Dear {{ $registration->first_name }} {{ $registration->last_name }},</p>

            <p>We are pleased to inform you that your registration with the Isan Ekiti community has been <strong>approved</strong>!</p>

            <div class="info-box">
                <strong>Your Registration Details:</strong><br>
                <strong>Name:</strong> {{ $registration->full_name }}<br>
                <strong>Email:</strong> {{ $registration->email }}<br>
                <strong>Hometown:</strong> {{ $registration->hometown ?? 'Not specified' }}<br>
                <strong>Registration Date:</strong> {{ $registration->created_at->format('F d, Y') }}
            </div>

            <p>As an approved member, you now have full access to:</p>
            <ul>
                <li>Community events and celebrations</li>
                <li>Isan Day festivities</li>
                <li>WhatsApp community groups</li>
                <li>News and updates about Isan Ekiti</li>
                <li>Networking with fellow indigenes</li>
            </ul>

            <p style="text-align: center;">
                <a href="{{ url('/') }}" class="button">Visit Our Website</a>
            </p>

            <p>If you have any questions or need assistance, please don't hesitate to contact us.</p>

            <p>Welcome to the community!</p>

            <p>Warm regards,<br>
            <strong>The Isan Ekiti Community Team</strong></p>
        </div>

        <div class="footer">
            <p>This email was sent to {{ $registration->email }}</p>
            <p>&copy; {{ date('Y') }} Isan Ekiti Community. All rights reserved.</p>
            <p>
                <a href="{{ url('/') }}" style="color: #14b8a6; text-decoration: none;">Visit Website</a> |
                <a href="{{ url('/contact') }}" style="color: #14b8a6; text-decoration: none;">Contact Us</a>
            </p>
        </div>
    </div>
</body>
</html>
