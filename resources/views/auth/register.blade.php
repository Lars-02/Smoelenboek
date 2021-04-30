<x-layout>
    <x-card title="Nieuwe medewerker">
        <form method="POST" action="{{ route('registerNewUser') }}">
            @csrf
            <x-input
                icon="fas fa-user"
                type="email"
                name="email"
                id="email"
                value="{{ old('email') }}"
                autocomplete="email"
                required autofocus>
                Email
            </x-input>
            @error('email')
            <span class="text-red-500 font-medium">{{ $message }}</span>
            @enderror

            <x-toggle name="isAdmin">Admin</x-toggle>

            <div class="flex">
                <div class="mr-4">
                    <x-button type="submit"
                              class="px-10 rounded-lg font-medium">
                        {{ __('Aanmaken') }}
                    </x-button>
                </div>
            </div>
        </form>
    </x-card>
</x-layout>
