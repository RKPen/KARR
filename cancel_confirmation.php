<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Cancellation Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            text-align: center;
            padding: 20px;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #009688;
            margin-bottom: 20px;
        }

        p {
            margin-bottom: 20px;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
    <script>
        setTimeout(function() {
            window.location.href = "mybooking.php"; // Redirect after 1 second
        }, 3000); // 1000 milliseconds = 1 second
    </script>
</head>
<body>
    <div class="container">
        <h1>Booking Cancellation Confirmation</h1>
        <p>Your booking has been successfully cancelled.</p>
        <!-- Add any additional information or instructions as needed -->
        <p>If you are not automatically redirected, <a href="mybooking.php">click here</a>.</p>
    </div>
</body>
</html>
