@extends('layout.layout')
@section('title')
<h1>Add New Items</h1>
@endsection

@section('content')
@if ($errors->any())
    <ul>
    @foreach ($errors->all() as $error)
       <li>{{ $error }}</li>
    @endforeach
    </ul>
    
@endif
<form action="/addnewitems" method="POST">
    @csrf
    <div class="mb-3">
        <label for="username">User Name:</label>
        <input type="text" name="username" value={{ old('username') }}>
    </div>
    <div class="mb-3">
        <label for="userpassword">Password:</label>
        <input type="text" name="userpassword" value="">
    </div>
    <div class="mb-3">
        <label for="userage">Age:</label>
        <input type="number" name="userage" value={{ old('userage') }}>
    </div>
    <div class="mb-3">
        <label for="usercity">City:</label>
        <input type="text" name="usercity" value={{ old('usercity') }}>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection