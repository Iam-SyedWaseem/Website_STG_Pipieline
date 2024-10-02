<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reply Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #dddddd;
            border-radius: 5px;
        }
        .header {
            background-color: #204b6f;
            color: #ffffff;
            padding: 10px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }
        .content {
            margin: 20px 0;
        }
        .content p {
            margin: 0 0 10px;
        }
        .footer {
            text-align: center;
            color: #777777;
            font-size: 12px;
            border-top: 1px solid #dddddd;
            padding-top: 10px;
        }
        .footer a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Reply for your Enquiry</h1>
        </div>
        <div class="content">            
            <p>{!! $data['response'] !!}</p>
            <p>Best regards,<br>Admin<br>Crystawall Technologies LLC<br>1901 Westburry office tower, Business Bay, Dubai</p>

        </div>
        <div class="footer">
            <p>Thank you,<br>Crystawall Technologies LLC</p>
            <p><a href="{{ url('/') }}">Visit our website</a></p>
        </div>
    </div>
</body>
</html>
