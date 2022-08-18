<x-layout>
    <x-card title="Wachtwoord Vergeten">
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            
            <div class="flex">
                <div class="flex-1">
                    <x-input id="email" type="email" name="email" icon="fas fa-user">{{ __('Email') }}</x-input>
                </div>
                <div class="flex items-center">
                    <x-contextHelp>{{ __('Vul hier het emailadres in dat gekoppeld is aan het account waar u het wachtwoord van bent vergeten.') }}</x-contextHelp>
                </div>
            </div>

            <div class="flex">
                <div class="mr-4">
                    <x-button type="submit">Wachtwoord resetten</x-button>
                </div>
                @if(Auth::user() == null)
                    <div class="self-end">
                        <a href="{{ route('login') }}"
                           class="text-xs sm:text-sm md:text-base lg:text-lg text-blue-500 underline select-none">Toch
                            inloggen</a>
                    </div>
                @endif
            </div>
        </form>
    </x-card>
</x-layout>
