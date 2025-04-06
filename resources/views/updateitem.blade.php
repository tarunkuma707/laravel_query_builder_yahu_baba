@extends('layout.layout')
@section('title')
<h1>Update Items</h1>
@endsection

@section('content')
@if ($errors->any())
    <ul>
    @foreach ($errors->all() as $error)
       <li>{{ $error }}</li>
    @endforeach
    </ul>
    
@endif
<form action="/updatepostitem/{{ $updateitem->id }}" method="POST">
    @csrf
    @method("POST")
    <div class="mb-3">
        <label for="username">User Name:</label>
        <input type="text" name="username" value={{ $updateitem->username }}>
    </div>
    <div class="mb-3">
        <label for="userpassword">Password:</label>
        <input type="text" name="userpassword" value={{ $updateitem->userpassword }}>
    </div>
    <div class="mb-3">
        <label for="userage">Age:</label>
        <input type="number" name="userage" value={{ $updateitem->userage }}>
    </div>
    <div class="mb-3">
        <label for="usercity">City:</label>
        <input type="text" name="usercity" value={{ $updateitem->city }}>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection