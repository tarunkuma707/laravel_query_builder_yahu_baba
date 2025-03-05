<x-layout>
    <x-slot:title>
        View User
    </x-slot:title>
@foreach ($singleuser as $id=>$user)
    <h3>Name:{{ $user->name }}</h3>
    <h3>Email:{{ $user->email }}</h3>
    <h3>City:{{ $user->city }}</h3>
    <h3>Age:{{ $user->age }}</h3>
@endforeach
</x-layout>