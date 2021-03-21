<x-layout>
    <x-card title="Login">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <x-input
                icon="fas fa-user"
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                autocomplete="email"
                required autofocus
            >{{ __('Email') }}
            </x-input>
            <x-input
                icon="fas fa-lock"
                type="password"
                id="password"
                name="password"
                autocomplete="password"
                required
            >{{ __('Wachtwoord') }}
            </x-input>
            <div class="flex">
                <div class="mr-4">
                    <x-button type="submit"
                              class="px-10 rounded-lg font-medium">
                        {{ __('Inloggen') }}
                    </x-button>
                </div>
                <div class="self-end">
                    <a href="{{ route('password.request') }}" class="text-blue-500 underline">
                        {{ __('Wachtwoord vergeten?') }}
                    </a>
                </div>
            </div>
        </form>
    </x-card>
</x-layout>
