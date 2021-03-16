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
                <x-button-submit text="Inloggen"/>
                <x-ahref text="Google" link="https://www.google.nl/" target="_top"/>
            @endif
            {{--Include this below into the page were you redirect to--}}
            @if(\Illuminate\Support\Facades\Session::has('succes'))
                <h2 class="bg-green-500 text-center p-1">{{ \Illuminate\Support\Facades\Session::get('succes')  }}</h2>
            @endif
            <x-input id="test" type="text" icon="fas fa-user">Test</x-input>

{{--            <x-modal--}}
{{--                modalTitle="Our modal example"--}}
{{--                submitLabel="Submit button"--}}
{{--                route="{{ route('home') }}"--}}
{{--                method="GET"--}}
{{--                icon="fas fa-redo-alt">--}}
{{--                <x-slot name="trigger">--}}
{{--                    <x-button>--}}
{{--                        Test our modal--}}
{{--                    </x-button>--}}
{{--                </x-slot>--}}
{{--                <div>--}}
{{--                    Our very very amazing modal text.--}}
{{--                </div>--}}
{{--            </x-modal>--}}
        </div>
    </div>
</x-layout>
