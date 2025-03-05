<!DOCTYPE html>
<html>
<head>
<title>Title of the document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <h4>{{ $title ?? "CRUD" }}</h4>
        @if (Session::has('message'))
            <div class='alert alert-info'>
                {{ Session::get('message') }}
            </div>
        @endif
        <div class="row">
            <div class="col-8">
                <div class="col-6">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>
