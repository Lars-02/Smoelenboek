<div class="bg-white shadow-lg rounded-lg">
    <a href="{{ route('employee.show', ['employee' => $employee]) }}">
        <div class="relative h-52">
            <div class="absolute bottom-2 left-2 z-20 w-full">
                <div class="text-white text-md lg:text-lg xl:text-xl 2xl:text-2xl font-medium select-all "
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
            <div class="text-gray-500 text-lg lg:text-xl xl:text-2xl truncate select-none"
                 title="{{ $department." - ".$function }}">{{ $department." - ".$function }}</div>
            <div class="text-sm md:text-md xl:text-lg truncate">
                <a class="ml-2 text-red-700 select-all"
                   title="{{ $employee->user->email }}">{{ $employee->user->email }}</a><br>
                <a class="ml-2 text-red-700 select-all"
                   title="{{ $employee->phoneNumber }}">{{ $employee->phoneNumber }}</a>
                <div class="my-1 text-gray-500">
                    <div class="select-none">Werkt op</div>
                    <div>
                        @foreach($allDays as $day)
                            <span
                                class="ml-2 select-none {{ in_array($day, $workingDays) ? "select-all text-red-700 font-medium" : "" }}">
                            {{ substr($day, 0, 2) }}
                        </span>
                        @endforeach
                    </div>
                </div>
                <div class="mb-3">
                    @isset($courses)
                        <div class="text-gray-500 select-none">Cursessen</div>
                        @foreach($courses as $course)
                            <div class="ml-2 text-red-700 select-all" title="{{ $course }}">{{ $course }}</div>
                        @endforeach
                    @endisset
                </div>
                <div class="mb-3">
                    @isset($expertises)
                        <div class="text-gray-500 select-none">Expertise</div>
                        @foreach($expertises as $expertise)
                            <div class="ml-2 text-red-700 select-all" title="{{ $expertise }}">{{ $expertise }}</div>
                        @endforeach
                    @endisset
                </div>
                <div class="mb-3">
                    @isset($minors)
                        <div class="text-gray-500 select-none">Minors</div>
                        @foreach($minors as $minor)
                            <div class="ml-2 text-red-700 select-all" title="{{ $minor }}">{{ $minor }}</div>
                        @endforeach
                    @endisset
                </div>
                <div class="mb-3">
                    @isset($lectorates)
                        <div class="text-gray-500 select-none">Leerlijnen</div>
                        @foreach($lectorates as $lectorate)
                            <div class="ml-2 text-red-700 select-all" title="{{ $lectorate }}">{{ $lectorate }}</div>
                        @endforeach
                    @endisset
                </div>
                <div class="mb-3">
                    @isset($hobbies)
                        <div class="text-gray-500 select-none">Hobbies</div>
                        @foreach($hobbies as $hobby)
                            <div class="ml-2 text-red-700 select-all" title="{{ $hobby }}">{{ $hobby }}</div>
                        @endforeach
                    @endisset
                </div>
            </div>
        </div>
    </a>
</div>
