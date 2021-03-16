<x-layout>
    <x-card>
    <form action="/employee" method="POST">
        @csrf
        <x-input type="text" name="email" id="email" icon="fas fa-envelope">E-mail</x-input>
        <x-input type="text" name="firstname" id="firstname" icon="fas fa-user-circle">First name</x-input>
        <x-input type="text" name="lastname" id="lastname" icon="fas fa-user-circle">Last name</x-input>
        <label class="block">Department</label>
        <select name="department" id="department">
            @foreach($departments as $department)
                <option value="{{$department->department}}">{{$department->department}}</option>
            @endforeach
        </select>
        <label class="block">Expertise</label>
        <select name="expertise" id="expertise">
            @foreach($expertises as $expertise)
                <option value="{{$expertise->id}}">{{$expertise->name}}</option>
            @endforeach
        </select>
        <label class="block">Job</label>
        <select name="role" id="job">
            @foreach($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
            @endforeach
        </select>
        @livewire('working-hours')
        <button type="submit">Submit</button>
    </form>
    </x-card>
</x-layout>
