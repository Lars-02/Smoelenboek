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
                <x-time></x-time>
            @endif
            <form action="/employee" method="POST">
                @csrf
                <x-input type="text" name="email" id="email" icon="fas fa-envelope">E-mail</x-input>
                <x-input type="text" name="username" id="username" icon="fas fa-user-circle">Username</x-input>
                <x-input type="text" name="firstname" id="firstname" icon="fas fa-user-circle">First name</x-input>
                <x-input type="text" name="lastname" id="lastname" icon="fas fa-user-circle">Last name</x-input>
                <label class="block">Department</label>
                <select name="department" id="department">
                    <option value="AOC">Department 1</option>
                    <option value="AFM">Department 2</option>
                </select>
                <label class="block">Expertise</label>
                <select name="expertise[]" id="expertise" multiple>
                    <option value="1">expertise 1</option>
                    <option value="2">expertise 2</option>
                    <option value="3">expertise 3</option>
                    <option value="4">expertise 4</option>
                </select>
                <label class="block">Job</label>
                <select name="job[]" id="job" multiple>
                    <option value="1">job 1</option>
                    <option value="2">job 2</option>
                    <option value="3">job 3</option>
                    <option value="4">job 4</option>
                    <option value="5">job 5</option>
                </select>
                <button type="submit">Submit</button>
            </form>
            <x-input id="test" type="text" icon="fas fa-user">Test</x-input>
            <x-select id="testid">Test</x-select>

            <x-modal
                modalTitle="Our modal example"
                submitLabel="Submit button"
                route="{{ route('home') }}"
                method="GET"
                icon="fas fa-redo-alt">
                <x-slot name="trigger">
                    <x-button>
                        Test our modal
                    </x-button>
                </x-slot>
                <div>
                    Our very very amazing modal text.
                </div>
            </x-modal>
        </div>
    </div>
</x-layout>
