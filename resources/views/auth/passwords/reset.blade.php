<x-layout>
    <x-card title="Nieuw wachtwoord">
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email ?? old('email') }}">

            <div class="flex">
                <div class="flex-1">
                    <x-input
                    icon="fas fa-lock"
                    type="password"
                    id="password"
                    name="password"
                    autocomplete="password"
                    required
                    >{{ __('Wachtwoord') }}
                    </x-input>
                </div>
                <div class="flex items-center">
                    <x-contextHelp>{{ __('Vul hier een nieuw wachtwoord in.') }}</x-contextHelp>
                </div>
            </div>

            <div class="flex">
                <div class="flex-1">
                    <x-input
                    icon="fas fa-lock"
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    autocomplete="password_confirmation"
                    required
                >{{ __('Wachtwoord herhalen') }}
                </x-input>
                </div>
                <div class="flex items-center">
                    <x-contextHelp>{{ __('Vul hier nogmaals uw nieuw wachtwoord in.') }}</x-contextHelp>
                </div>
            </div>

            <div class="flex">
                <div class="mr-4">
                    <x-button type="submit">
                        {{ __('Nieuw wachtwoord') }}
                    </x-button>
                </div>
            </div>
        </form>
    </x-card>
</x-layout>
