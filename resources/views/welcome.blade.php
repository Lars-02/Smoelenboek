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
                <x-ahref text="Google" link="https://www.google.nl" target="_top"/>
            @endif
            <form action="/employee" method="POST">
                @csrf
                <input type="text" name="username" id="username">
                <input type="text" name="firstname" id="firstname">
                <input type="text" name="lastname" id="lastname">
                <select name="department" id="department">
                    <option value="AII">Department 1</option>
                    <option value="AFM">Department 2</option>
                </select>
                <select name="expertise" id="expertise">
                    <option value="1">expertise 1</option>
                </select>
                <select name="job" id="job">
                    <option value="1">job 1</option>
                </select>
                <button type="submit">Submit</button>
            </form>
            <x-input id="test" type="text" icon="fas fa-user">Test</x-input>
            <x-button x-data="{ show: true }" x-show="show" click="show = false">Example button</x-button>
        </div>
    </div>
</x-layout>
