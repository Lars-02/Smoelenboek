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
                                <div class="break-words md:text-2xl font-semibold">E-mail</div>
                                <div class="break-words md:text-2xl">{{$user->email}}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="break-words md:text-2xl font-semibold">Telefoon</div>
                                <div class="break-words md:text-2xl">{{$employee->phoneNumber}}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="break-words md:text-2xl font-semibold">Voornaam</div>
                                <div class="break-words md:text-2xl">{{$employee->firstname}}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="break-words md:text-2xl font-semibold">Achternaam</div>
                                <div class="break-words md:text-2xl">{{$employee->lastname}}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div x-show="tab === 'afdeling'" class="bg-white p-3 shadow-sm rounded-sm h-full ">
                    <h2 class="font-bold md:text-5xl mb-5">Afdeling</h2>
                    <p class="md:text-2xl">{{$employee->department}}</p>
                </div>

                <div x-show="tab === 'werktijden'" class="bg-white p-3 shadow-sm rounded-sm h-full ">
                    <h2 class="font-bold md:text-5xl mb-5">Werkdagen</h2>
                    @foreach($workHour as $results)
                        <p class="md:text-2xl">{{$results->day}}</p>
                    @endforeach
                </div>

                <div x-show="tab === 'blokken'" class="bg-white p-3 shadow-sm rounded-sm h-full ">
                    <h2 class="font-bold md:text-5xl mb-5">Blokken</h2>
                    @foreach($employee->lectorate as $lectorate)
                        <p class="md:text-2xl">{{$lectorate->name}}</p>
                    @endforeach
                    @foreach($employee->hobby as $hobby)
                        <p class="md:text-2xl">Hobby: {{$hobby->name}}</p>
                    @endforeach
                    @foreach($employee->course as $course)
                        <p class="md:text-2xl">Course: {{$course->name}}</p>
                    @endforeach
                    @foreach($employee->minor as $minor)
                        <p class="md:text-2xl">Minor: {{$minor->name}}</p>
                    @endforeach
                    @foreach($employee->learningLine as $learningLine)
                        <p class="md:text-2xl">Leerlijn: {{$learningLine->name}}</p>
                    @endforeach
                    @foreach($employee->expertise as $expertise)
                        <p class="md:text-2xl">Expertise: {{$expertise->name}}</p>
                    @endforeach
                </div>

                <div x-show="tab === 'socialmedia'" class="bg-white p-3 shadow-sm rounded-sm h-full ">
                    <h2 class="font-bold md:text-5xl mb-5">Sociale Media</h2>
                    <a class="md:text-2xl underline font-semibold text-red-700 hover:text-red-800 visited:text-red-600" href="{{$employee->linkedInUrl}}">Linked in</a>
                </div>

                <!-- End of profile tab -->
            </div>
        </div>
    </div>
    <script type="javascript">document.getElementsByClassName('w-7/12 border-red-700 border-4 rounded focus:bg-white focus:text-black')[0].click()</script>
</x-layout>
