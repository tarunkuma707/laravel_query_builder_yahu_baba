<x-layout>
    <x-slot:title>
        All Users Data
    </x-slot:title>
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
                                <x-form action="" method="DELETE">
                                    <a class="btn btn-danger" href="{{ route('view.delete',$d->id)}}">Delete</a>
                                </x-form>
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
</x-layout>