<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .email-confirmation {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .email-confirmation p {
            margin: 10px 0;
        }

        .email-confirmation a {
            color: #007bff;
            text-decoration: none;
        }

        .email-confirmation a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="email-confirmation">
    <p><a href="{{ $actionUrl }}" target="_blank">Click here,</a> to reset your password.</p>
    <p> {{ config('app.name')}} </p>
    <p>If you can't click the link, copy and paste the URL below into your web browser:</p>
    <p>{{ $actionUrl }}</p>
</div>
</body>
</html>
