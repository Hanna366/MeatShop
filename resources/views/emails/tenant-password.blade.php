<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to MeatShop POS</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f7fb;
        }
        .header {
            background: linear-gradient(135deg, #183153 0%, #0f4c81 55%, #1e7f6f 100%);
            color: white;
            padding: 30px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 600;
        }
        .header p {
            margin: 10px 0 0 0;
            font-size: 16px;
            opacity: 0.9;
        }
        .content {
            background: white;
            padding: 40px;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0.1);
        }
        .welcome-message {
            background: #e3f2fd;
            border-left: 4px solid #007bff;
            padding: 20px;
            margin: 20px 0;
            border-radius: 0 5px 5px 0;
        }
        .password-box {
            background: #fff3cd;
            border: 2px solid #ffc107;
            border-radius: 8px;
            padding: 25px;
            margin: 25px 0;
            text-align: center;
        }
        .password {
            font-family: 'Courier New', monospace;
            font-size: 24px;
            font-weight: bold;
            color: #d63384;
            background: white;
            padding: 15px 20px;
            border-radius: 5px;
            border: 1px solid #ffeaa7;
            display: inline-block;
            letter-spacing: 2px;
        }
        .instructions {
            background: #d1ecf1;
            border-left: 4px solid #17a2b8;
            padding: 20px;
            margin: 20px 0;
            border-radius: 0 5px 5px 0;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 5px;
            color: #6c757d;
        }
        .btn {
            display: inline-block;
            padding: 12px 30px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 600;
            margin-top: 20px;
        }
        .btn:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>🏪 MeatShop POS</h1>
        <p>Your Multi-Tenant Point of Sale System</p>
    </div>

    <div class="content">
        <div class="welcome-message">
            <h3>🎉 Good day {{ explode(' ', $userName)[0] }} ma'am/sir!</h3>
            <p>Welcome to MeatShop POS! Your account has been successfully created for <strong>{{ $businessName }}</strong>.</p>
        </div>

        <div class="password-box">
            <h4>🔐 Your Auto-Generated Password</h4>
            <p>Your password has been automatically generated for security purposes:</p>
            <div class="password">{{ $password }}</div>
            <p><small><strong>Important:</strong> Please save this password in a secure location.</small></p>
        </div>

        <div class="instructions">
            <h4>📋 Next Steps</h4>
            <ol>
                <li><strong>Save your password:</strong> Store this password securely for future access.</li>
                <li><strong>Log in:</strong> Visit <a href="{{ config('app.url') }}/login">{{ config('app.url') }}/login</a> to access your account.</li>
                <li><strong>Change password:</strong> After logging in, you can change your password in the settings section.</li>
                <li><strong>Complete setup:</strong> Configure your business information and start using the POS system.</li>
            </ol>
        </div>

        <div style="text-align: center; margin: 30px 0;">
            <a href="{{ config('app.url') }}/login" class="btn">
                🚀 Login to Your Account
            </a>
        </div>
    </div>

    <div class="footer">
        <p><strong>Need Help?</strong> If you have any questions or issues, please contact our support team.</p>
        <p>
            📧 Email: support@meatshop.com<br>
            📞 Phone: +1-800-MEATSHOP<br>
            🌐 Website: <a href="{{ config('app.url') }}">{{ config('app.url') }}</a>
        </p>
        <p><small>© {{ date('Y') }} MeatShop POS. All rights reserved.</small></p>
    </div>
</body>
</html>
