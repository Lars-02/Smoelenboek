<x-layout>
        @if(\Illuminate\Support\Facades\Session::has('succes'))
            <h2 class="bg-green-500 text-center p-1">{{ \Illuminate\Support\Facades\Session::get('succes')  }}</h2>
        @endif
    <form action="/employee" method="POST">
        @csrf
        <div class="mt-6" x-data="{ currentTab: 'first' }">
        <x-button @click="currentTab = 'first'">Personalia</x-button>
        <x-button @click="currentTab = 'second'">Extra info</x-button>
        <x-button @click="currentTab = 'third'">Werkdagen</x-button>

            <div x-show="currentTab === 'first'">
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
            </div>
            <div x-show="currentTab === 'second'">
                <x-card title="Extra info">
                <label class="block">Department</label>
                <select name="department" id="department">
                    <option disabled selected>Kies een departement...</option>
                    @foreach($departments as $department)
                        <option value="{{$department->department}}">{{$department->department}}</option>
                    @endforeach
                </select>
                <label class="block">Expertise</label>
                <select name="expertise" id="expertise" >
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
            </div>
            <div x-show="currentTab === 'third'">
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
            </div>
        </div>
    </form>
</x-layout>
