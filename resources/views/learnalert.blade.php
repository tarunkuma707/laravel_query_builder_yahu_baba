<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Components</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    @php
        $message = "This is message for testing";
    @endphp
    <x-alert type="danger" id="firstAlert" class="m-4" role='flash' dismissable message="This is error message alert." />
    <x-alert type="success" dismissable="true" :$message />
    <x-alert type="info" message="This is info message alert." />
</body>
</html>