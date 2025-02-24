@extends('layout.layout')
@section('title')
<h1>View Subscriber</h1>
@endsection

@section('content')
    <table class="table table-striped table-bordered">
        <tr>
            <th width="80px">Name:</th>
            <td>{{ $subscribershow[0]->name }}</td>
        </tr>
        <tr>
            <td>Email:</td>
            <td>{{ $subscribershow[0]->email }}</td>
        </tr>
        <tr>
            <td>Age:</td>
            <td>{{ $subscribershow[0]->age }}</td>
        </tr>
        <tr>
            <td>City:</td>
            <td>{{ $subscribershow[0]->city }}</td>
        </tr>
    </table>
    <a href="{{ route('subscribers.index') }}" class="btn btn-danger">Go Back</a>
@endsection