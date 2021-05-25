<x-layout>
    @if(session()->has('message'))
        <x-flash title="Succes" type="success">{{ session()->get('message') }}</x-flash>
    @endif
    <x-card class="select-none" title="Login">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            @error('email')
            <x-input
                error="{{$message}}"
                icon="fas fa-user"
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                autocomplete="email"
                required autofocus
            >{{ __('Email') }}
            </x-input>
            @else
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
                @enderror

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
                        <x-button type="submit">
                            {{ __('Inloggen') }}
                        </x-button>
                    </div>
                    <div class="self-end">
                        <a href="{{ route('password.request') }}"
                           class="select-none text-xs sm:text-sm md:text-base lg:text-lg text-blue-500 underline">
                            {{ __('Wachtwoord vergeten?') }}
                        </a>
                    </div>
                </div>
        </form>
    </x-card>
</x-layout>
