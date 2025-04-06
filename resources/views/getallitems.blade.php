<div>
    @foreach ($allitems as $items)
        <h1>{{ $items->id }}</h1>
        <h2>{{ $items->username }}</h2>
        <h2>{{ $items->userage }}</h2>
        <a href="/single/{{ $items->id }}">View</a>
        <a href="/updateitem/{{ $items->id }}">Update</a>
        <form action="{{ route('item.delete',$items->id)}}" method="POST">
            @csrf
            @method('POST')
            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    @endforeach
    <br><br>
    {{$allitems->links()}}
</div>