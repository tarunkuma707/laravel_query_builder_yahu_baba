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
                <h2 class="text-center mb-2">File Update</h2>
            </div>
        </div>
        <form action="{{ route('client.update', $client->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-3">
                    <img id='output' class="img-fluid img-thumbnail" src="{{ asset('/storage/'.$client->file_name) }}" alt="">
                </div>
                <div class="col-9">
                    <input type="file" name="photo" accept="image/*" onchange="document.querySelector('#output').src=window.URL.createObjectURL(this.files[0])"/>
                </div>
                <div class="col-12">
                    <input type="submit" class="btn btn-sm btn-primary" value="Update">
                </div>
            </div>
        </form>
    </div>
</body>
</html>