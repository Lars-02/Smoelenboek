<x-layout>
        @if(\Illuminate\Support\Facades\Session::has('dbError'))
            <div class="bg-red-800 text-white ">
                <h2 class="text-center">Database error: Working days cannot be duplicate.</h2>
                <p class="text-left py-1 px-5">{{ \Illuminate\Support\Facades\Session::get('dbError')  }}</p>
            </div>
        @endif
    <form action="/employee" method="POST">
        @csrf
        <div class="mt-6" x-data="{ currentTab: 'first' }">
            <div x-show="currentTab === 'first'">
                <x-card title="Gegevens invullen">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="text-red-600">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <x-input type="text" name="firstname" id="firstname" icon="fas fa-user-circle">Voornaam</x-input>
                    <x-input type="text" name="lastname" id="lastname" icon="fas fa-user-circle">Achternaam</x-input>
                    <x-input type="tel" name="phoneNumber" id="phoneNumber" icon="fas fa-phone">Telefoonnummer</x-input>
                    <div>
                        <x-button @click="currentTab = 'second'">Doorgaan</x-button>
                    </div>
                </x-card>
            </div>
            <div x-show="currentTab === 'second'">
                <x-card title="Gegevens invullen">
                    <div class="mb-8">
                        <label class="mb-1.5 pl-1.5 py-0.5 float-left text-left text-white w-6/12 bg-red-700 rounded">Department</label>
                        <select name="department" id="department" class="px-2.5 py-2.5 w-full rounded">
                            <option disabled selected>Kies een departement...</option>
                            @foreach($departments as $department)
                                <option value="{{$department}}">{{$department}}</option>
                            @endforeach
                        </select>
                    </div>
                    <x-select id="expertise" :options="$expertises">Expertise</x-select>
                    <x-select id="role" :options="$roles">Functie</x-select>
                    <div>
                        <x-button @click="currentTab = 'first'">Terug</x-button>
                        <x-button @click="currentTab = 'third'">Doorgaan</x-button>
                    </div>
                </x-card>
            </div>
            <div x-show="currentTab === 'third'">
                <x-card title="Gegevens invullen">
                    <div>
                        <div>
                            <label>Maandag</label><br>
                            Van: <x-time name="monday[1][start_time]"/>
                            Tot: <x-time name="monday[1][end_time]"/><br>
                        </div><br>
                        <div>
                            <label>Dinsdag</label><br>
                            Van: <x-time name="tuesday[1][start_time]"/>
                            Tot: <x-time name="tuesday[1][end_time]"/><br>
                        </div><br>
                        <div>
                            <label>Woensdag</label><br>
                            Van: <x-time name="wednesday[1][start_time]"/>
                            Tot: <x-time name="wednesday[1][end_time]"/><br>
                        </div><br>
                        <div>
                            <label>Donderdag</label><br>
                            Van: <x-time name="thursday[1][start_time]"/>
                            Tot: <x-time  name="thursday[1][end_time]"/><br>
                        </div><br>
                        <div>
                            <label>Vrijdag</label><br>
                            Van: <x-time name="friday[1][start_time]"/>
                            Tot: <x-time  name="friday[1][end_time]"/><br>
                        </div><br>
                    </div>
                    <div>
                        <x-button @click="currentTab = 'second'">Terug</x-button>
                        <x-button type="submit">Afronden</x-button>
                    </div>
                </x-card>
            </div>
        </div>
    </form>
</x-layout>
