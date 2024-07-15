<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            /* background: url('{{ asset($certificateBackground->image) }}'); */
            background-size: cover;
            position: relative;
            width: 100%;
            height: 100%;
        }
       
    </style>
</head>
<body>
    <div class="content">
        <div class="name">{{$certificate->text_body }}</div>
    </div>
</body>
</html>