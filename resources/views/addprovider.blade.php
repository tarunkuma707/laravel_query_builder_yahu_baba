@extends('layout.layout')
@section('title')
<h1>Add New Provider</h1>
@endsection

@section('content')
    <form action="{{ route('provider.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label">User Name</label>
            <input type="text" class="form-control" name="username" />
            <span class="alert-danger">
                @error('username')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="mb-3">
            <label for="useremail" class="form-label">User Email</label>
            <input type="email" class="form-control" name="useremail" />
        </div>
        <div class="mb-3">
            <label for="userage" class="form-label">User Salary</label>
            <input type="number" class="form-control" name="usersalary" />
        </div>
        <div class="mb-3">
            <label for="usercity" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" name="userdob" />
        </div>
        <div class="mb-3">
            <label for="usercity" class="form-label">Password</label>
            <input type="text" class="form-control" name="userpass" />
        </div>
        <div class="mb-3">
            <input type="submit" value="Save" class="btn btn-success" />
        </div>
    </form>
@endsection