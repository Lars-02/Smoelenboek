<div class="bg-white rounded p-10 col-span-1 shadow h-full">

    <div class="items-center space-x-2 font-semibold text-gray-900 leading-8 mb-5 md:flex-shrink-0">
        <div>
            @if (empty($employee->user->photoUrl))
                <img src="https://www.shareicon.net/data/128x128/2016/07/26/801997_user_512x512.png"
                     class="select-none md:flex-shrink-0 md:w-48 min-h-full max-h-full mx-auto">
            @else
                <img src="{{$employee->user->photoUrl}}"
                     class="select-none md:flex-shrink-0 min-h-full max-h-full mx-auto">
            @endif
        </div>
        <div class="m-0 pt-5 text-center">
            <x-input value="{{$employee->firstname}}" type="text"
                     name="firstname" id="firstname" icon="fas fa-user-circle">Voornaam:
            </x-input>
            <x-input value="{{$employee->lastname}}" type="text"
                     name="lastname" id="lastname" icon="fas fa-user-circle">Achternaam:
            </x-input>

            <a href="{{$employee->linkedInUrl}}"
               class="break-words text-blue-500 md:text-2xl font-semibold select-none"><i
                    class="fab fa-linkedin-in"></i></a>
        </div>
    </div>

    <div class="text-gray-700">
        <div class="text-sm">
            <div class="mb-5">
                <h4 class="font-bold text-lg md:text-2xl mb-5 select-none">Werkdagen</h4>
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
            <div class="grid md:grid-cols-1 mb-5">
                <x-checkbox id="roles" :options="$roles" :oldvals="$employee->user->roles->pluck('name', 'id')">Rollen</x-checkbox>
            </div>
            <div class="grid md:grid-cols-1">
                <x-checkbox id="departments" :options="$departments" :oldvals="$employee->departments->pluck('name', 'id')">Afdeling</x-checkbox>
            </div>

        </div>
    </div>
</div>
