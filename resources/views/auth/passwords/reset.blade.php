<x-layout>
    <x-card title="Nieuw wachtwoord">
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <x-input
                icon="fas fa-lock"
                type="password"
                id="password"
                name="password"
                autocomplete="password"
                required
            >{{ __('Wachtwoord') }}
            </x-input>
            <x-input
                icon="fas fa-lock"
                type="password"
                id="password"
                name="password"
                autocomplete="password"
                required
            >{{ __('Wachtwoord herhalen') }}
            </x-input>
            <div class="flex">
                <div class="mr-4">
                    <x-button type="submit"
                              class="px-10 rounded-lg font-medium">
                        {{ __('Nieuw wachtwoord') }}
                    </x-button>
                </div>
            </div>
        </form>
    </x-card>
</x-layout>
