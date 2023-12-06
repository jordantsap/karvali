<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>

    <!-- Add some basic inline CSS for styling -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #3498db;
        }

        table {
            width: 100%;
            margin-top: 15px;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #3498db;
            color: #fff;
        }

        p {
            line-height: 1.5;
        }

        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Booking Confirmation</h2>
        <p>Dear {{ $username}} ,</p>
        <p>Your booking has been confirmed. Here are the details:</p>

        <table>
            <tr>
                <th>Booking ID</th>
                <td>{{ $booking }}</td>
            </tr>
            <tr>
                <th>Check-in Date</th>
                <td>{{ $check_in_date }}</td>
            </tr>
            <tr>
                <th>Check-out Date</th>
                <td>{{ $check_out_date }}</td>
            </tr>
            <!-- Add more details based on your booking model -->

        </table>

        <p>Thank you for choosing our service. If you have any questions or need further assistance, feel free to contact us.</p>

        <p class="footer">Best regards,<br>Nea Karvali</p>
    </div>
</body>
</html>
