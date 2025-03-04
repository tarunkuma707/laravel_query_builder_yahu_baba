<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center mb-2">File Upload</h2>
            </div>
        </div>
        <form action="{{ route('client.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-12">
                    <input type="file" name="photo" accept="image/*" />
                    @error('photo')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <input type="submit" class="btn btn-sm btn-primary">
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-6">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            @foreach ($clients as $client)
                <div class="col-2">
                    <img class="img-fluid  img-thumbnail" src="{{ asset('/uploads/'.$client->file_name) }}" alt="Client" />
                    <form method="POST" action={{ route('client.destroy',$client->id) }}>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-danger btn-sm btn mb-3">Delete</button>
                    </form>
                    <a href="{{ route('client.edit',$client->id) }}" class="btn btn-warning ">Update</a>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>