<h1>
    All Joined Users
</h1>
    @foreach ($joinedusers as $joineduser)
        <h3>{{ $joineduser->id }} | {{ $joineduser->name }} | {{ $joineduser->email }} | {{ $joineduser->CityName }}</h3>
    @endforeach
