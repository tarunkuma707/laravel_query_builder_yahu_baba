<!DOCTYPE html>
<html>
<head>
<title>Title of the document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
        @if (Session::has('message'))
            <div class='alert alert-info'>
                {{ Session::get('message') }}
            </div>
        @endif
            <div class="col-6">
                <h1>All User Data</h1>
                <a class="btn btn-success" href="/newuser">Add New</a>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Age</th>
                            <th>City</th>
                            <th>View</th>
                            <th>Delete</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $d)
                        <tr>
                            <td>{{ $d->id }}</td>
                            <td>{{ $d->name }}</td>
                            <td>{{ $d->email }}</td>
                            <td>{{ $d->age }}</td>
                            <td>{{ $d->city }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('view.singleuser',$d->id)}}">View</a>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="{{ route('view.delete',$d->id)}}">Delete</a>
                            </td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('view.updatepage',$d->id)}}">Update</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="mt-5">
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
</body>
</html>