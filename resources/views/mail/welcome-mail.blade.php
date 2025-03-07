<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $request['subject'] }}</title>
</head>
<body>
    <h3>Hello Admin</h3>
    <p>Name:{{ $request['name'] }}</p>
    <p>Name:{{ $request['email'] }}</p>
    <p>Name:{{ $request['subject'] }}</p>
    <p>Name:{{ $request['message'] }}</p>
</body>
</html>