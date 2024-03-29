<div class="bg-white rounded p-10 col-span-1 shadow h-full">

    <div class="items-center space-x-2 font-semibold text-gray-900 leading-8 mb-5 md:flex-shrink-0">

        <div>
            @if (empty($employee->user->photoUrl))
                <img src="https://www.shareicon.net/data/128x128/2016/07/26/801997_user_512x512.png"
                     class="select-none md:flex-shrink-0 md:w-48 min-h-full max-h-full mx-auto"
                     alt="standaard profiel foto">
            @else
                <img src="{{asset('storage/' . $employee->user->photoUrl)}}" class="w-40" alt="Profiel foto">
            @endif
        </div>
        <div class="flex">
            <div class="flex flex-col self-center">
                <input class="mt-4 p-2 bg-red-700 rounded text-sm text-white font-medium" name="photoUrl" type="file">
                @error('photoUrl')
                <span class="text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex items-center">
                <x-contextHelp>{{ __('upload hier uw profielfoto.') }}</x-contextHelp>
            </div>
        </div>

        <div class="m-0 pt-5 text-center">
            <x-input value="{{$employee->firstname}}" type="text"
                     name="firstname" id="firstname" icon="fas fa-user-circle">Voornaam:
            </x-input>
            <x-input value="{{$employee->lastname}}" type="text"
                     name="lastname" id="lastname" icon="fas fa-user-circle">Achternaam:
            </x-input>

            <div class="mb-5 md:pr-5">
                <div class="flex">
                    <div class="flex-1">
                        <x-input value="{{$employee->linkedInUrl}}" type="text"
                                 name="linkedInUrl" id="linkedInUrl" icon="fas fa-user-circle">LinkedIn url:
                        </x-input>
                    </div>
                    <div class="flex items-center">
                        <x-contextHelp>{{ __('Vul hier de URL in van uw linkedin profiel.') }}</x-contextHelp>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="text-gray-700">
        <div class="text-sm">
            <div class="mb-5">
                <h4 class="font-bold text-lg md:text-2xl mb-5 select-none">Werkdagen</h4>
                <div class="flex">
                    <div class="flex-1">
                        <div class="grid grid-cols-5 lg:grid-cols-4 xl:grid-cols-5">
                            @foreach($workDays as $day)
                                @if($employee->workDays->contains($day))
                                    <x-dayToggle :day="$day" :selected="true"></x-dayToggle>
                                @else
                                    <x-dayToggle :day="$day"></x-dayToggle>
                                @endif
                            @endforeach
                        </div>
                        <div class="flex flex-wrap overflow-hidden w-1/2">
                            <div class="w-full overflow-hidden">
                                <div class="w-full overflow-hidden">
                                    @error(('workDays'))
                                    <p class="relative mb-3 bg-red-200 text-red-500 py-3 px-3 rounded-lg clear-both">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <x-contextHelp>{{ __('klik op de werkdagen die u werkt.') }}</x-contextHelp>
                    </div>
                </div>
            </div>
            <div class="mb-5">
                <x-input value="{{$employee->user->email}}" type="text"
                         name="email" id="email" icon="fas fa-user-circle">Email:
                </x-input>
            </div>
            <div class="mb-5">
                <x-input value="{{$employee->phoneNumber}}" type="text"
                         name="phoneNumber" id="phoneNumber" icon="fas fa-user-circle">Telefoonnummer:
                </x-input>
            </div>
            <div class="grid md:grid-cols-1 mb-5 float-right">
                <x-contextHelp>{{__('Vink aan voor de rollen die voor u van toepassing zijn, u kunt meerdere rollen selecteren.')}}</x-contextHelp>
            </div>
            <div class="grid md:grid-cols-1 mb-5">
                <x-select id="roles" :options="$roles" :oldvals="$employee->user->roles->pluck('name', 'id')">Rollen</x-select>
            </div>

            <div class="grid md:grid-cols-1 mb-5 float-right">
                <x-contextHelp>{{__('Vink aan voor de afdelingen die voor u van toepassing zijn, u kunt meerdere afdelingen selecteren.')}}</x-contextHelp>
            </div>
            <div class="grid md:grid-cols-1">
                <x-select id="departments" :options="$departments" :oldvals="$employee->departments->pluck('name', 'id')">Afdeling</x-select>
            </div>
        </div>
    </div>
</div>
