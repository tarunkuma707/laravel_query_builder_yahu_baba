@extends('layout.layout')
@section('title')
<h1>Update Subscriber</h1>
@endsection
@if($errors->any())
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
            <li>
                {{ $error }}
            </li>
        @endforeach
    </ul>
</div>
@endif
    
@section('content')
    <form action="{{ route('subscribers.update', $subscribers->id) }}" method="POST">
        @csrf
        @method("PUT")
        <div class="mb-3">
            <label for="username" class="form-label">User Name</label>
            <input type="text" value="{{  $subscribers->name }}" class="form-control" name="username" />
            @error('username')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="useremail" class="form-label">User Email</label>
            <input type="email" value="{{  $subscribers->email }}" class="form-control" name="useremail" />
            @error('useremail')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="userage" class="form-label">User Age</label>
            <input type="number" value="{{  $subscribers->age }}" class="form-control" name="userage" />
            @error('userage')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="userage" class="form-label">User City</label>
            <input type="text" value="{{  $subscribers->city }}" class="form-control" name="usercity" />
            @error('usercity')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <input type="submit" value="Update" class="btn btn-success" />
        </div>
        <div class="mb-3">
            <a href="{{ route('subscribers.index') }}" class="btn btn-danger">BACK <<</a>
        </div>
    </form>
@endsection