<x-layout>
    <x-card title="Nieuwe medewerker">
        <form method="POST" action="{{ route('registerNewUser') }}">
            @csrf
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

            <x-toggle class="select-none" name="isAdmin">Admin</x-toggle>

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
