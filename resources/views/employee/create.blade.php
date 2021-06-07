<x-layout>

    <x-card title="Gegevens invullen" size="large">
        <form action="{{ route('employee.store') }}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <div class="select-none grid gap-4 grid-cols-2 xl:grid-cols-3">
                <div>
                <x-input type="text" name="firstname" id="firstname" icon="fas fa-user-circle"
                         value="{{ old('firstname') }}">Voornaam
                </x-input>
                <div class="float-right">
                    <x-contextHelp>{{__('Vul hier uw voornaam in.')}}</x-contextHelp>
                </div>
                </div>

                <div>
                    <x-input type="text" name="lastname" id="lastname" icon="fas fa-user-circle"
                            value="{{ old('lastname') }}">Achternaam
                    </x-input>
                    <div class="float-right">
                        <x-contextHelp>{{__('Vul hier uw tussenvoegsel(s) en achternaam in.')}}</x-contextHelp>
                    </div>
                </div>
                <div>
                    <x-input type="text" name="phoneNumber" id="phoneNumber" icon="fas fa-user-circle"
                            value="{{ old('phoneNumber') }}">Telefoonnummer
                    </x-input>
                    <div class="float-right">
                        <x-contextHelp>{{__('Vul hier uw telefoonnummer in. bijvoorbeeld 0612345678')}}</x-contextHelp>
                    </div>
                </div>

                <x-checkbox id="departments" :options="$departments">Afdelingen</x-checkbox>
                <x-checkbox id="roles" :options="$roles">Rollen</x-checkbox>
                <x-checkbox id="expertises" :options="$expertises">Expertises</x-checkbox>
                <div>
                    <div class="float-right">
                        <x-contextHelp>{{__('Vink aan voor de afdelingen die voor u van toepassing zijn, u kunt meerdere afdelingen selecteren.')}}</x-contextHelp>
                    </div>
                </div>
                <div>
                    <div class="float-right">
                        <x-contextHelp>{{__('Vink aan voor de rollen die voor u van toepassing zijn, u kunt meerdere rollen selecteren.')}}</x-contextHelp>
                    </div>
                </div>
                <div>
                    <div class="float-right">
                        <x-contextHelp>{{__('Vink aan voor de exppertises die voor u van toepassing zijn, u kunt meerdere expertises selecteren.')}}</x-contextHelp>
                    </div>
                </div>

                <div class="flex flex-wrap overflow-hidden">
                    <div class="w-full overflow-hidden">
                        <x-input.label id="Werkdagen">{{__('Werkdagen')}}</x-input.label>
                        <div class="flex justify-between md:w-2/3 xl:w-1/2 mb-6 col-span-2 xl:col-span-3 flex-wrap">
                            <div class="flex flex-row justify-between">
                                @foreach($workDays as $day)
                                    @if (old('workDays') !== null)
                                        @if(in_array($day->id, old('workDays')))
                                            <x-dayToggle :day="$day" :selected="true"></x-dayToggle>
                                        @else
                                            <x-dayToggle :day="$day"></x-dayToggle>
                                        @endif
                                    @else
                                        <x-dayToggle :day="$day"></x-dayToggle>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="float-right">
                            <x-contextHelp>{{__('Selecteer de dagen dat u werkt.')}}</x-contextHelp>
                        </div>
                    </div>

                    <div class="w-full overflow-hidden">
                        <div class="w-full overflow-hidden">
                            @error(('workDays'))
                            <p class="relative mb-3 bg-red-200 text-red-500 py-3 px-3 rounded-lg clear-both">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="w-full overflow-hidden">
                        <div>
                            <x-button id="Afronden" class="select-none" type="submit">Afronden</x-button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </form>
    </x-card>
</x-layout>
