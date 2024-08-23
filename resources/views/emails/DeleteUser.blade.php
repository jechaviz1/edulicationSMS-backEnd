<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
        }
        .content {
            font-size: 16px;
            color: #333333;
            line-height: 1.5;
        }
        .footer {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #eaeaea;
            display: flex;
            align-items: center;
        }
        .footer img {
            border-radius: 50%;
            margin-right: 10px;
        }
        .footer div {
            font-size: 14px;
            color: #777777;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Hi {{ $data->first_name}},</h2>
        </div>
        <div class="content">
            <p>Your account with SMS Edulication has been successfully deleted. All associated data has been removed.</p>
           <p>If you have any questions, please contact us at Support Email.</p> 
            <p>Thank you for using our services.</p> 
        </div>
    </div>
</body>
</html>
