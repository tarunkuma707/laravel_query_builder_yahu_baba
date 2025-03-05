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
    <x-alert type="danger">
        <x-slot:title class="font-bold">
            Heading Goes Here--- {{ $component->link("Just for testing","https://www.gmail.com","_blank") }}
        </x-slot:title>
        <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam, libero?
        </p>
    </x-alert>
    @php
        $componentName = "card"
    @endphp
    <x-dynamic-component :component="$componentName" class="m-4" />
    <x-form action="/somepage" method="PUT" id="firstFrom" class="myForm">
        <input type="text" name="name" />
        <button type="submit">Save</button>
    </x-form>
</body>
</html>