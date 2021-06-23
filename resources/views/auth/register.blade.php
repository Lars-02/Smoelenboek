<x-layout>
    <x-card title="Nieuwe medewerker">
        <form method="POST" action="{{ route('register.store') }}">
            @csrf

            <div class="flex">
                <div class="flex-1">
                    <x-input
                    icon="fas fa-user"
                    type="email"
                    name="email"
                    id="email"
                    value="{{ old('email') }}"
                    autocomplete="email"
                    required autofocus
                >{{ __('Email') }}
                </x-input>
                </div>
                <div class="flex items-center">
                    <x-contextHelp>{{ __('Vul hier het emailadres in van de persoon die u wilt registreren.') }}</x-contextHelp>
                </div>
            </div>
            <div class="flex">
                <div class="flex-1">
                    <x-toggle class="select-none" name="isAdmin">Admin</x-toggle>
                </div>
                <div class="flex items-center">
                    <x-contextHelp>{{ __('Schuif als de persoon die u wilt registreren administratieve rechten moet krijgen.') }}</x-contextHelp>
                </div>
            </div>
            <div class="flex">
                <div class="select-none mr-4">
                    <x-button type="submit">
                        {{ __('Aanmaken') }}
                    </x-button>
                </div>
            </div>
        </form>
    </x-card>
</x-layout>
