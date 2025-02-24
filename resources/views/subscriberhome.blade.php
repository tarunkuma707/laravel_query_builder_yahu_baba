@extends('layout.layout')
@section('title')
<h1>All Subscriber Data</h1>
@endsection

@section('content')
    <a href="{{ route('subscribers.create') }}" class="btn btn-success btn-sm mb-3">Add New</a>
    <table class="table table-striped table-bordered">
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
        @foreach ($subscribers as $subscribe)
            <tr>
                <td>
                    {{ $subscribe->id }}
                </td>
                <td>
                    {{ $subscribe->name }}
                </td>
                <td>
                    {{ $subscribe->email }}
                </td>
                <td>
                    {{ $subscribe->age }}
                </td>
                <td>
                    {{ $subscribe->city }}
                </td>
                <td><a href="{{ route('subscribers.show',$subscribe->id) }}" class="btn btn-primary btn-sm">View</a></td>
                <td><a href="{{ route('subscribers.destroy',$subscribe->id) }}" class="btn btn-danger btn-sm">Delete</a></td>
                <td><a href="{{ route('subscribers.edit',$subscribe->id) }}" class="btn btn-warning btn-sm">Update</a></td>
            </tr>
        @endforeach
    </table>
@endsection