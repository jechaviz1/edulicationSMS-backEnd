<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <form action="{{ route('usi.verify')}}" method="post">
        @csrf
        @method('post')
        <input type="text" name="usi">
        <input type="text" name="first_name" value="Maryam">
        <input type="text" name="family_name" value="Fredrick">
        <input type="text" name="date_of_birth" value="1966-05-25">
        <button type="submit">submit</button>
    </form>
</body>
</html>