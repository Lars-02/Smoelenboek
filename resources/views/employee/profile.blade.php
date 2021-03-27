<x-layout>
    <div class="container mx-auto my-5 p-5">
        <div class="md:flex no-wrap md:-mx-2 " x-data="{ tab: 'account' }">
            <!-- Left Side -->
            <div class="w-full md:w-5/12 md:mx-2">
                <!-- Side navbar -->
                <div class="bg-white p-3 border-t-4 border-red-700">
                    <ul class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                        <li class="flex items-center justify-center py-3">
                            <x-button class="w-7/12 border-red-700 border-4 rounded focus:bg-white focus:text-black" @click="tab = 'account'">Account</x-button>
                        </li>
                        <li class="flex items-center justify-center py-3">
                            <x-button class="w-7/12 border-red-700 border-4 rounded focus:bg-white focus:text-black" @click="tab = 'afdeling'">Afdeling</x-button>
                        </li>
                        <li class="flex items-center justify-center py-3">
                            <x-button class="w-7/12 border-red-700 border-4 rounded focus:bg-white focus:text-black" @click="tab = 'werktijden'">Werktijden</x-button>
                        </li>
                        <li class="flex items-center justify-center py-3">
                            <x-button class="w-7/12 border-red-700 border-4 rounded focus:bg-white focus:text-black" @click="tab = 'blokken'">Blokken</x-button>
                        </li>
                        <li class="flex items-center justify-center py-3">
                            <x-button class="w-7/12 border-red-700 border-4 rounded focus:bg-white focus:text-black" @click="tab = 'socialmedia'">Sociale Media</x-button>
                        </li>
                    </ul>
                </div>
                <!-- End of Side navbar -->
            </div>
            <!-- Right Side -->
            <div class="w-full md:w-9/12 mx-2 h-auto">
                <!-- Profile Tab -->
                <div x-show="tab === 'account'" class="bg-white p-3 shadow-sm rounded-sm md:h-2/3">
                    <div class="md:flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-5 md:h-1/2 md:flex-shrink-0">
                        @if (empty($user->photoUrl))
                            <img src="https://www.shareicon.net/data/128x128/2016/07/26/801997_user_512x512.png" class="md:flex-shrink-0 md:w-48 min-h-full max-h-full">
                        @else
                            <img src="{{$user->photoUrl}}" class="md:flex-shrink-0 min-h-full max-h-full">
                        @endif {{--this probaply needs to become a local image sometime lol^^--}}
                        <p class="md:text-5xl sm:text-3xl ">{{$employee->firstname}} {{$employee->lastname}} </p>
                    </div>
                    <div class="text-gray-700">
                        <div class="grid md:grid-cols-2 text-sm">
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">E-Mail</div>
                                <div class="px-4 py-2">{{$user->email}}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Telefoon</div>
                                <div class="px-4 py-2">{{$employee->phoneNumber}}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Voornaam</div>
                                <div class="px-4 py-2">{{$employee->firstname}}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Achternaam</div>
                                <div class="px-4 py-2">{{$employee->lastname}}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div x-show="tab === 'afdeling'" class="bg-white p-3 shadow-sm rounded-sm h-full ">
                    <h2 class="font-bold md:text-5xl mb-5">Afdeling</h2>
                    {{$employee->department}}
                </div>

                <div x-show="tab === 'werktijden'" class="bg-white p-3 shadow-sm rounded-sm h-full ">
                    <h2 class="font-bold md:text-5xl mb-5">Werkdagen</h2>
                    @foreach($workHour as $results)
                        {{$results->day}}
                    @endforeach
                </div>

                <div x-show="tab === 'blokken'" class="bg-white p-3 shadow-sm rounded-sm h-full ">
                    <h2 class="font-bold md:text-5xl mb-5">Blokken</h2>
                    @foreach($employee->lectorate as $lectorate)
                        <p>{{$lectorate->name}}</p>
                    @endforeach
                    @foreach($employee->hobby as $hobby)
                        <p>Hobby: {{$hobby->name}}</p>
                    @endforeach
                    @foreach($employee->course as $course)
                        <p>Course: {{$course->name}}</p>
                    @endforeach
                    @foreach($employee->minor as $minor)
                        <p>Minor: {{$minor->name}}</p>
                    @endforeach
                    @foreach($employee->learningLine as $learningLine)
                        <p>Leerlijn: {{$learningLine->name}}</p>
                    @endforeach
                    @foreach($employee->expertise as $expertise)
                        <p>Expertise: {{$expertise->name}}</p>
                    @endforeach
                </div>

                <div x-show="tab === 'socialmedia'" class="bg-white p-3 shadow-sm rounded-sm h-full ">
                    <h2 class="font-bold md:text-5xl mb-5">Sociale Media</h2>
                    <a class="underline font-semibold text-red-700 hover:text-red-800 visited:text-red-600" href="{{$employee->linkedInUrl}}">Linked in</a>
                </div>

                <!-- End of profile tab -->
            </div>
        </div>
    </div>
</x-layout>
