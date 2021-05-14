<x-layout>
    <x-card title="Wachtwoord Vergeten">
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <x-input id="email" type="email" name="email" icon="fas fa-user">Email</x-input>
            @error('email')
            <span class="select-none text-red-700" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="flex">
                <div class="mr-4">
                    <x-button type="submit">Wachtwoord resetten</x-button>
                </div>
                <div class="self-end">
                    <a href="{{ route('login') }}" class="text-xs sm:text-sm md:text-base lg:text-lg text-blue-500 underline select-none">Toch inloggen</a>
                </div>
            </div>
        </form>
    </x-card>
</x-layout>
