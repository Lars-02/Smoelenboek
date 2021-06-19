<div class="bg-white rounded p-10 col-span-1 shadow h-full">

    <div class="items-center space-x-2 font-semibold text-gray-900 leading-8 mb-5 md:flex-shrink-0">
        <div>
            @if (empty($employee->user->photoUrl))
                <img src="https://www.shareicon.net/data/128x128/2016/07/26/801997_user_512x512.png"
                     class="select-none md:flex-shrink-0 md:w-48 min-h-full max-h-full mx-auto">
            @else
                <img src="{{asset('storage/' . $employee->user->photoUrl)}}"
                     class="select-none md:flex-shrink-0 min-h-full max-h-full mx-auto">
            @endif
        </div>
        <div class="m-0 text-center">
            <p class="text-2xl md:text-4xl sm:text-3xl select-all mt-3 break-words">{{$employee->firstname}} {{$employee->lastname}}</p>

            @if(!empty($employee->linkedInUrl))
                <a href="{{$employee->linkedInUrl}}" class="break-words text-blue-500 md:text-2xl font-semibold select-none">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            @endif
        </div>
    </div>

    <div class="text-gray-700">
        <div class="text-sm">
            <div class="mb-5">
                <h4 class="font-bold text-lg md:text-2xl mb-5 select-none">Werkdagen</h4>
                <div class="grid grid-cols-5 lg:grid-cols-4 xl:grid-cols-5">
                    @foreach($allDays as $day)
                        <span
                            class="ml-2 text-xs sm:text-sm md:text-base lg:text-lg {{ in_array($day, $workingDays) ? "select-all text-red-700 font-medium" : "" }}">
                            {{ substr($day, 0, 2) }}
                        </span>
                    @endforeach
                </div>

            </div>
            <div class="mb-5">
                <label class="break-words text-lg md:text-2xl select-none font-semibold">E-mail</label>
                <div>
                    <a href="mailto:{{$employee->user->email}}" class="break-words md:text-2xl select-all">{{$employee->user->email}}</a>
                </div>
            </div>
            <div class="mb-5">
                <label class="break-words text-lg md:text-2xl select-none font-semibold">Telefoon</label>
                <div>
                    <a href="tel:{{$employee->phoneNumber}}" class="break-words md:text-2xl select-all">{{$employee->phoneNumber}}</a>
                </div>
            </div>
            <div class="mb-5">
                <p class="select-none font-bold text-lg md:text-2xl">Rol(len):</p>
                @foreach($employee->user->roles as $role)
                    <p class="select-all md:text-2xl">{{$role->name}}</p>
                @endforeach
            </div>
            <div>
                <p class="select-none font-bold text-lg md:text-2xl">Afdeling(en):</p>
                @foreach($employee->departments as $department)
                    <p class="select-all md:text-2xl">{{$department->name}}</p>
                @endforeach
            </div>

        </div>
    </div>
</div>
