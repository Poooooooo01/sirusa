<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .receipt-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .details {
            margin-bottom: 20px;
        }
        .details p {
            margin: 5px 0;
        }
        .details ul {
            list-style-type: none;
            padding: 0;
        }
        .details ul li {
            margin: 5px 0;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
        }
        .footer p {
            margin: 5px 0;
        }
        .footer a {
            color: #007BFF;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="receipt-container">
        <div class="header">
            <h1>Payment Receipt</h1>
            <p>Thank you for your payment!</p>
        </div>
        <div class="details">
            <p>Dear {{ $telemedicine->consultation->patient->nama }},</p>
            <p>Here are the details of your transaction:</p>
            <ul>
                <li><strong>Order ID:</strong> {{ $telemedicine->id }}</li>
                <li><strong>Total Amount:</strong> {{ number_format($totalAmount, 0, ',', '.') }}</li>
                <li><strong>Status:</strong> Succes</li>
            </ul>
        </div>
        <div class="footer">
            <p>If you have any questions, feel free to contact us.</p>
            <p>Thank you!</p>
            <p><a href="{{ url('/') }}">Visit our website</a></p>
        </div>
    </div>
</body>
</html>
