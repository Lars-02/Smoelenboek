<x-layout>
    <x-card title="Wachtwoord Vergeten">
        <x-input id="email" type="email" name="email" icon="fas fa-user">Email</x-input>
        @error('email')
        <span class="text-red-700" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <x-button x-data="{ show: true }" x-show="show" click="show = false">Wachtwoord resetten</x-button>
        <span class="text-blue-500 underline">
            <a href="{{ url('/login') }}">Toch inloggen</a>
        </span>
    </x-card>
</x-layout>
