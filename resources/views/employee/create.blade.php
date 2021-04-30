<x-layout>

    <x-card title="Gegevens invullen">
        <form action="{{ route('employee.store') }}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <div class="grid gap-4 grid-cols-2">
                @if ($errors->any())
                    <div class="alert alert-danger col-span-2">
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
                <x-select id="departments" :options="$departments">Afdeling</x-select>
                <x-select id="expertises" :options="$expertises">Expertise</x-select>
                <x-select id="functions" :options="$roles">Functie</x-select>
                <x-button type="submit">Afronden</x-button>
            </div>
        </form>
    </x-card>
</x-layout>
