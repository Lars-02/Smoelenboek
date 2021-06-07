<div class="bg-white shadow-lg rounded-lg cursor-pointer select-none">
    <a href="{{ route('employee.show', ['employee' => $employee]) }}">
        <div class="relative h-52">
            <div class="absolute bottom-2 left-2 z-20 w-full">
                <div class="text-white text-md lg:text-lg xl:text-xl 2xl:text-2xl font-medium "
                     title="{{ $employee->fullname }}">{{ $employee->fullname }}</div>
                <div class="h-2 w-2/3 bg-red-700 rounded-full my-1"></div>
            </div>
            @if(is_null($employee->user->photoUrl))
                <div class="grid rounded-t-lg absolute h-full w-full object-cover bg-gray-400">
                    <i class="text-white text-6xl far fa-user-circle d-flex place-self-center"></i>
                </div>
            @else
                <img class="rounded-t-lg absolute h-full w-full object-cover"
                     src="{{asset('storage/' . $employee->user->photoUrl)}}"
                     alt="Profile picture">
            @endisset
        </div>
        <div class="px-4 py-2">
            <div class="text-gray-500 text-lg lg:text-xl xl:text-2xl truncate"
                 title="{{ $department." - ".$function }}">{{ $department." - ".$function }}</div>
            <div class="text-sm md:text-md xl:text-lg truncate">
                <div class="ml-2 text-red-700"
                     title="{{ $employee->user->email }}">{{ $employee->user->email }}</div>
                <div class="ml-2 text-red-700"
                     title="{{ $employee->phoneNumber }}">{{ $employee->phoneNumber }}</div>
                <div class="my-1 text-gray-500">
                    <div class="select-none">Werkt op</div>
                    <div>
                        @foreach($allDays as $day)
                            <span
                                class="ml-2 {{ in_array($day, $workingDays) ? "select-all text-red-700 font-medium" : "" }}">
                            {{ substr($day, 0, 2) }}
                        </span>
                        @endforeach
                    </div>
                </div>
                <div class="mb-3">
                    @isset($courses)
                        <div class="text-gray-500">Cursussen</div>
                        @foreach($courses as $course)
                            <div class="ml-2 text-red-700" title="{{ $course }}">{{ $course }}</div>
                        @endforeach
                    @endisset
                </div>
                <div class="mb-3">
                    @isset($expertises)
                        <div class="text-gray-500">Expertises</div>
                        @foreach($expertises as $expertise)
                            <div class="ml-2 text-red-700" title="{{ $expertise }}">{{ $expertise }}</div>
                        @endforeach
                    @endisset
                </div>
                <div class="mb-3">
                    @isset($minors)
                        <div class="text-gray-500">Minoren</div>
                        @foreach($minors as $minor)
                            <div class="ml-2 text-red-700" title="{{ $minor }}">{{ $minor }}</div>
                        @endforeach
                    @endisset
                </div>
                <div class="mb-3">
                    @isset($lectorates)
                        <div class="text-gray-500">Leerlijnen</div>
                        @foreach($lectorates as $lectorate)
                            <div class="ml-2 text-red-700" title="{{ $lectorate }}">{{ $lectorate }}</div>
                        @endforeach
                    @endisset
                </div>
                <div class="mb-3">
                    @isset($hobbies)
                        <div class="text-gray-500">Hobbies</div>
                        @foreach($hobbies as $hobby)
                            <div class="ml-2 text-red-700" title="{{ $hobby }}">{{ $hobby }}</div>
                        @endforeach
                    @endisset
                </div>
            </div>
        </div>
    </a>
</div>
