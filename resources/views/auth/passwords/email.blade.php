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
            <div class="flex">
                <div class="mr-4">
                    <x-button type="submit">Wachtwoord resetten</x-button>
                </div>
                <div class="self-end">
                    <a href="{{ route('login') }}" class="text-blue-500 underline">Toch inloggen</a>
                </div>
            </div>
        </form>
    </x-card>
</x-layout>
