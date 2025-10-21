<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification - Isan Ekiti</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 40px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h1 {
            color: #2563eb;
            margin: 0;
            font-size: 28px;
        }
        .content {
            margin-bottom: 30px;
        }
        .otp-code {
            background-color: #f0f9ff;
            border: 2px solid #2563eb;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            margin: 30px 0;
        }
        .otp-code h2 {
            color: #2563eb;
            font-size: 42px;
            letter-spacing: 8px;
            margin: 0;
            font-weight: bold;
        }
        .otp-label {
            color: #64748b;
            font-size: 14px;
            margin-top: 10px;
        }
        .warning {
            background-color: #fef3c7;
            border-left: 4px solid #f59e0b;
            padding: 15px;
            margin: 20px 0;
            border-radius: 4px;
        }
        .warning p {
            margin: 0;
            color: #92400e;
            font-size: 14px;
        }
        .footer {
            text-align: center;
            color: #64748b;
            font-size: 14px;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
        }
        .footer a {
            color: #2563eb;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Isan Ekiti</h1>
            <p style="color: #64748b; margin-top: 5px;">Email Verification</p>
        </div>

        <div class="content">
            <p>Hello {{ $userName }},</p>
            <p>Thank you for registering with Isan Ekiti! To complete your registration and verify your email address, please use the following One-Time Password (OTP):</p>

            <div class="otp-code">
                <h2>{{ $otpCode }}</h2>
                <p class="otp-label">Your verification code</p>
            </div>

            <p>This code will expire in <strong>10 minutes</strong>. Please enter it on the verification page to activate your account.</p>

            <div class="warning">
                <p><strong>Security Notice:</strong> If you didn't request this verification code, please ignore this email. Your account is still secure.</p>
            </div>

            <p>If you have any questions or need assistance, please don't hesitate to contact our support team.</p>

            <p>Welcome to the Isan Ekiti community!</p>

            <p style="margin-top: 20px;">
                Best regards,<br>
                <strong>The Isan Ekiti Team</strong>
            </p>
        </div>

        <div class="footer">
            <p>&copy; {{ date('Y') }} Isan Ekiti. All rights reserved.</p>
            <p>This is an automated email. Please do not reply to this message.</p>
        </div>
    </div>
</body>
</html>
