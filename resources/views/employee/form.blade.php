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
                <x-input type="text" name="firstname" id="firstname" icon="fas fa-user-circle">Naam</x-input>
                <x-input type="text" name="lastname" id="lastname" icon="fas fa-user-circle">Achternaam</x-input>
                <x-input type="tel" name="telephone" id="telephone" icon="fas fa-phone">Telefoonnummer</x-input>
                </x-card>
            </div>
            <div x-show="currentTab === 'second'">
                <x-card title="Extra info">
                    <x-select id="departments" :options="$departments">Afdeling</x-select>
                    <x-select id="expertise" :options="$expertises">Expertise</x-select>
                    <x-select id="role" :options="$roles">Rollen</x-select>
                </x-card>
            </div>
            <div x-show="currentTab === 'third'">
                <x-card title="Werkdagen">
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
                    <x-button type="submit">Afronden</x-button>
                </x-card>
            </div>
        </div>
    </form>
</x-layout>
