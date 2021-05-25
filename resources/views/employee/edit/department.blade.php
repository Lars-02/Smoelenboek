<h2 class="font-bold md:text-5xl mb-5">Afdeling en rol</h2>
<div class="grid md:grid-cols-1">
    <div class="mb-5 md:pr-5">
        <label
            class="mb-1.5 pl-1.5 py-0.5 float-left text-left text-white w-6/12 bg-red-700 rounded">Wijzig
            de afdeling:</label>
        <div class="h-32 mt-10 overflow-scroll border-b-2 max-w-md">
            @error('departments')
            <x-alert class="mt-16 pt-16"></x-alert>
            @enderror
            @foreach($departments as $department)
                <div>
                    <label>
                        <input @if ($employee->departments->contains($department->id)) checked
                               @endif value="{{$department->id}}" name="departments[]"
                               type="checkbox">
                        {{$department->name}}
                    </label>
                </div>
            @endforeach
        </div>
    </div>

    <div class="mb-5 md:pr-5">
        <label
            class="mb-1.5 pl-1.5 py-0.5 float-left text-left text-white w-6/12 bg-red-700 rounded">Wijzig
            rol:</label>
        <div class="h-32 mt-10 overflow-scroll border-b-2 max-w-md">
            @error('roles')
            <x-alert class="mt-16 pt-16"></x-alert>
            @enderror
            @foreach($roles as $role)
                <div>
                    <label>
                        <input @if ($employee->user->roles->contains($role->id)) checked
                               @endif value="{{$role->id}}" name="roles[]" type="checkbox">
                        {{$role->name}}
                    </label>
                </div>
            @endforeach
        </div>
    </div>
</div>
