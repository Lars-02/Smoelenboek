<x-layout>
    <div class="grid place-items-center">
        <div class="w-11/12 p-12 sm:w-8/12 md:w-6/12 lg:w-4/12 2xl:w-3/12
            px-6 py-10 sm:px-10 sm:py-6
            bg-white rounded-lg shadow-md lg:shadow-lg my-10 text-center">
            <i class="fas fa-wrench"></i>
            @auth
                <h1>Hi, {{ Auth::user()->full_name }}</h1>
            @else
                <h1> Welcome to Smoelenboek</h1>
                <h3>Please sign in</h3>
            @endif
            <x-input id="test" type="text" icon="fas fa-user">Test</x-input>
            <x-button x-data="{ show: true }" x-show="show" click="show = false">Example button</x-button>
            <x-modal type-left="button" type-right="submit" href-left="/auth/login" href-right="/auth/register" modal="Open Modal" title="Dit is de Modal." btn-name-left="Terug" btn-name-right="Volgende">
                <div>Inhoud van het bericht!</div>
            </x-modal>
        </div>
    </div>
</x-layout>
