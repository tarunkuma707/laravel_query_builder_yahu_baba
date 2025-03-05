<x-layout>
    <x-slot:title>
        Add User Data
    </x-slot:title>
    @if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            
        @endforeach
    </ul>
    @endif
    <x-form action="{{ route('view.adduser') }}" >
        <div class="mb-3">
            <label class="form-label">Name</label>
        <input type="text" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror" name="username" />
        <span class='text-danger'>
            @error('username')
                {{ $message }}
            @enderror
        </span>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" value="{{ old('useremail') }}" class="form-control @error('useremail') is-invalid @enderror" name="useremail" />
            <span class='text-danger'>
                @error('useremail')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" value="{{ old('userpass') }}" class="form-control @error('userpass') is-invalid @enderror" name="userpass" />
            <span class='text-danger'>
                @error('userpass')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="mb-3">
            <label class="form-label">Age</label>
            <input type="text" value="{{ old('userage') }}" class="form-control @error('userage') is-invalid @enderror" name="userage" />
            <span class='text-danger'>
                @error('userage')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="mb-3">
            <label class="form-label">City</label>
            <input type="text" value="{{ old('usercity') }}" class="form-control @error('usercity') is-invalid @enderror" name="usercity" />
            <span class='text-danger'>
                @error('usercity')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </x-form>
</x-layout>
            