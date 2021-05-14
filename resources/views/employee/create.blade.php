<x-layout>

    <x-card title="Gegevens invullen" size="large">
        <form action="{{ route('employee.store') }}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <div class="select-none grid gap-4 grid-cols-2 xl:grid-cols-3">
                @error('firstname')
                    <x-input error="{{$message}}" type="text" name="firstname" id="firstname" icon="fas fa-user-circle">Voornaam</x-input>
                @else
                    <x-input type="text" name="firstname" id="firstname" icon="fas fa-user-circle">Voornaam</x-input>
                @enderror

                @error('lastname')
                    <x-input  error="{{$message}}" type="text" name="lastname" id="lastname" icon="fas fa-user-circle">Achternaam</x-input>
                @else
                    <x-input type="text" name="lastname" id="lastname" icon="fas fa-user-circle">Achternaam</x-input>
                @enderror

                @error('phoneNumber')
                    <x-input  error="{{$message}}" type="text" name="phoneNumber" id="phoneNumber" icon="fas fa-user-circle">Telefoonnummer</x-input>
                @else
                    <x-input type="text" name="phoneNumber" id="phoneNumber" icon="fas fa-user-circle">Telefoonnummer</x-input>
                @enderror

                @error('departments')
                    <x-select error="{{$message}}" id="departments" :options="$departments">Afdelingen</x-select>
                @else
                    <x-select id="departments" :options="$departments">Afdelingen</x-select>
                @enderror

                @error('roles')
                    <x-select error="{{$message}}" id="roles" :options="$roles">Functies</x-select>
                @else
                    <x-select id="roles" :options="$roles">Functies</x-select>
                @enderror

                @error('expertises')
                    <x-select error="{{$message}}" id="expertises" :options="$expertises">Expertises</x-select>
                @else
                    <x-select id="expertises" :options="$expertises">Expertises</x-select>
                @enderror

                <div class="flex justify-between md:w-2/3 xl:w-1/2 mb-6 col-span-2 xl:col-span-3">
                    @foreach($workDays as $day)
                        <x-dayToggle :day="$day"></x-dayToggle>
                    @endforeach
                </div>
                <x-button class="select-none" type="submit">Afronden</x-button>
            </div>
        </form>
    </x-card>
</x-layout>
