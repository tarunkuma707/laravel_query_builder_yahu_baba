<x-layout>
    <x-slot:title>
        Update User Data
    </x-slot:title>
    <x-form action="{{ route('view.updateuser', $data->id) }}" method="PUT">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" value="{{ $data->name }}" class="form-control" name="username" />
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" value="{{ $data->email }}" class="form-control" name="useremail" />
        </div>
        <div class="mb-3">
            <label class="form-label">Age</label>
            <input type="text" value="{{ $data->age }}" class="form-control" name="userage" />
        </div>
        <div class="mb-3">
            <label class="form-label">City</label>
            <input type="text" value="{{ $data->city }}" class="form-control" name="usercity" />
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </x-form>
</x-layout>