<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-6 mb-3">
                <h1>Welcome, {{ Auth::user()->name }}</h1>
                @can('isAdmin')
                    <a href="#" class="btn btn-success">Admin Panel</a>
                @else
                <a href="#" class="btn btn-success">User Panel</a>
                @endcan
                <a href="{{ route('profile.show',Auth::user()->id) }}" class="btn btn-primary">Profile</a>
                <a href="{{ route('blog.show',Auth::user()->id) }}"  class="btn btn-success">Post</a>
            </div>
        </div>
        <div class="row">
            <div class="col-6 mb-3">
                <a href="{{ route('inner') }}" class="btn btn-sm btn-primary">Go to Inner Page</a>
                <a href="{{ route('logout') }}" class="btn btn-sm btn-danger">Logout</a>
            </div>
        </div>
    </div>
</body>
</html>