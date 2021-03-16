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
            {{--Include this below into the page were you redirect to--}}
            <x-input id="test" type="text" icon="fas fa-user">Test</x-input>
            <x-select id="testid">Test</x-select>

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
        @if(\Illuminate\Support\Facades\Session::has('succes'))
            <h2 class="bg-green-500 text-center p-4">{{ \Illuminate\Support\Facades\Session::get('succes')  }}</h2>
        @endif
        <form action="/employee" method="POST">
            @csrf
            <x-card title="Personalia">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <x-input type="text" name="email" id="email" icon="fas fa-envelope">E-mail</x-input>
                <x-input type="text" name="firstname" id="firstname" icon="fas fa-user-circle">First name</x-input>
                <x-input type="text" name="lastname" id="lastname" icon="fas fa-user-circle">Last name</x-input>
                <x-input type="tel" name="telephone" id="telephone" icon="fas fa-phone">Telephone number</x-input>
            </x-card>
            <x-card title="Extra info">
                <label class="block">Department</label>
                <select name="department" id="department">
                    <option disabled selected>Kies een departement...</option>
                    @foreach($departments as $department)
                        <option value="{{$department->department}}">{{$department->department}}</option>
                    @endforeach
                </select>
                <label class="block">Expertise</label>
                <select name="expertise" id="expertise">
                    <option disabled selected>Kies een expertise...</option>
                    @foreach($expertises as $expertise)
                        <option value="{{$expertise->id}}">{{$expertise->name}}</option>
                    @endforeach
                </select>
                <label class="block">Job</label>
                <select name="role" id="role">
                    <option disabled selected>Kies een functie...</option>
                    @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                </select>
            </x-card>
            <x-card title="Werkdagen">
                <div>
                    <div>
                        <label>Maandag</label><br>
                        Van: <input type="time" name="monday[1][start_time]">
                        Tot: <input type="time"  name="monday[1][end_time]"><br>
                    </div><br>
                    <div>
                        <label>Dinsdag</label><br>
                        Van: <input type="time" name="tuesday[1][start_time]">
                        Tot: <input type="time"  name="tuesday[1][end_time]"><br>
                    </div><br>
                    <div>
                        <label>Woensdag</label><br>
                        Van: <input type="time" name="wednesday[1][start_time]">
                        Tot: <input type="time"  name="wednesday[1][end_time]"><br>
                    </div><br>
                    <div>
                        <label>Donderdag</label><br>
                        Van: <input type="time" name="thursday[1][start_time]">
                        Tot: <input type="time"  name="thursday[1][end_time]"><br>
                    </div><br>
                    <div>
                        <label>Vrijdag</label><br>
                        Van: <input type="time" name="friday[1][start_time]">
                        Tot: <input type="time"  name="friday[1][end_time]"><br>
                    </div><br>
                </div>
                <x-button type="submit">Submit</x-button>
            </x-card>

        </form>

</x-layout>
