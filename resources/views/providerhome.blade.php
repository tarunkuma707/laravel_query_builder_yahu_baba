@extends('layout.layout')
@section('title')
<h1>All Providers Data</h1>
@endsection
@section('pagetitle')
Providers
@endsection

@section('content')
    <a href="{{ route('provider.create') }}" class="btn btn-success btn-sm mb-3">Add New</a>
    <table class="table table-striped table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Salary</th>
            <th>Date of Birth</th>
        </tr>
        @foreach ($providers as $provider)
            <tr>
                <td>
                    {{ $provider->id }}
                </td>
                <td>
                    {{ $provider->user_name }}
                </td>
                <td>
                    {{ $provider->email }}
                </td>
                <td>
                    {{ $provider->salary }}
                </td>
                <td>
                    {{ $provider->dob }}
                </td>
                <td><a href="{{ route('provider.show',$provider->id) }}" class="btn btn-primary btn-sm">View</a></td>
                <td>
                    <form action="{{ route('provider.destroy',$provider->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
                <td><a href="{{ route('provider.edit',$provider->id) }}" class="btn btn-warning btn-sm">Update</a></td>
            </tr>
        @endforeach
    </table>
    <div class="mt-4">
        {{ $providers->links() }}
    </div>
@endsection