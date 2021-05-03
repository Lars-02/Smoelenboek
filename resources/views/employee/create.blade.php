<x-layout>

    <x-card title="Gegevens invullen" size="large">
        <form action="{{ route('employee.store') }}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <div class="grid gap-4 grid-cols-2 xl:grid-cols-3">
                @if ($errors->any())
                    <div class="alert alert-danger col-span-2 xl:col-span-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-red-600">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <x-input type="text" name="firstname" id="firstname" icon="fas fa-user-circle">Voornaam</x-input>
                <x-input type="text" name="lastname" id="lastname" icon="fas fa-user-circle">Achternaam</x-input>
                <x-input type="tel" name="phoneNumber" id="phoneNumber" icon="fas fa-phone">Telefoonnummer</x-input>
                <x-select id="departments" :options="$departments">Afdelingen</x-select>
                <x-select id="expertises" :options="$expertises">Expertises</x-select>
                <x-select id="roles" :options="$roles">Functies</x-select>
                <div class="flex justify-between md:w-2/3 xl:w-1/2 mb-6 col-span-2 xl:col-span-3">
                    @foreach($workDays as $day)
                        <x-dayToggle :day="$day"></x-dayToggle>
                    @endforeach
                </div>
                <x-button type="submit">Afronden</x-button>
            </div>
        </form>
    </x-card>
</x-layout>
