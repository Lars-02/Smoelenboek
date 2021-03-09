<x-layout>
    <x-card title="Wachtwoord Vergeten">
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <x-input id="email" type="email" name="email" icon="fas fa-user">Email</x-input>
            @error('email')
            <span class="text-red-700" role="alert">
            <strong>{{ $message }}</strong>
        </span>
            @enderror
            <x-button type="submit">Wachtwoord resetten</x-button>
            <span class="text-blue-500 underline">
            <a href="{{ route('login') }}">Toch inloggen</a>
        </span>
        </form>
    </x-card>
</x-layout>
