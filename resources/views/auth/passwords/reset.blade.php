<x-layout>
    <x-card title="Nieuw wachtwoord">
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

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

            @error('password')
                <x-input 
                    error="{{$message}}"
                    icon="fas fa-lock"
                    type="password"
                    id="password"
                    name="password"
                    autocomplete="password"
                    required
                >{{ __('Wachtwoord') }}
                </x-input>
                @else
                <x-input
                    icon="fas fa-lock"
                    type="password"
                    id="password"
                    name="password"
                    autocomplete="password"
                    required
                >{{ __('Wachtwoord') }}
                </x-input>
            @enderror

            @error('password')
                <x-input 
                    error="{{$message}}"
                    icon="fas fa-lock"
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    autocomplete="password_confirmation"
                    required
                >{{ __('Wachtwoord herhalen') }}
                </x-input>
                @else
                <x-input
                    icon="fas fa-lock"
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    autocomplete="password_confirmation"
                    required
                >{{ __('Wachtwoord herhalen') }}
                </x-input>
            @enderror

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
