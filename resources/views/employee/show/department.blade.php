<h2 class="select-none font-bold md:text-5xl mb-5">Afdeling/Rol</h2>
<p class="select-none font-bold md:text-2xl">Afdeling(en):</p>
@foreach($employee->departments as $department)
    <p class="select-all md:text-2xl">{{$department->name}}</p>
@endforeach
<p class="select-none font-bold md:text-2xl">Rol(len):</p>
@foreach($employee->user->roles as $role)
    <p class="select-all md:text-2xl">{{$role->name}}</p>
@endforeach
