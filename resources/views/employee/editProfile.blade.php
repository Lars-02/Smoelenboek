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
                    </ul>
                </div>
                <!-- End of Side navbar -->
            </div>
            <!-- Right Side -->

                <!-- Profile Tab -->
                <form method="POST" action="{{route('employee.update', $employee)}}">
                    @csrf

                    <input name="_method" type="hidden" value="PUT">
                <div x-show="tab === 'account'" class="bg-white p-3 shadow-sm rounded-sm md:h-4/3">
                    <div class="md:flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-5 md:h-1/2 md:flex-shrink-0">
                        @if (empty($employee->user->photoUrl))
                            <img src="https://www.shareicon.net/data/128x128/2016/07/26/801997_user_512x512.png" class="md:flex-shrink-0 md:w-48 min-h-full max-h-full">
                        @else
                            <img src="{{$employee->user->photoUrl}}" class="md:flex-shrink-0 min-h-full max-h-full">
                        @endif {{--this probaply needs to become a local image sometime lol^^--}}
                        <p class="md:text-5xl sm:text-3xl ">{{$employee->firstname}} {{$employee->lastname}} </p>
                    </div>
                    <div class="text-gray-700">
                        <div class="grid md:grid-cols-2 text-sm">
                            <div class="grid grid-cols-2">
                                <x-input id="email" type="email" name="email" icon="" value="{{$employee->user->email}}">Email</x-input>
                            </div>
                            <div class="grid grid-cols-2">
                                <x-input id="phoneNumber" type="tel" name="phoneNumber" icon="" value="{{$employee->phoneNumber}}">Telefoon</x-input>
                            </div>
                            <div class="grid grid-cols-2">
                                <x-input id="firstname" type="text" name="firstname" icon="" value="{{$employee->firstname}}">Voornaam</x-input>
                            </div>
                            <div class="grid grid-cols-2">
                                <x-input id="lastname" type="text" name="lastname" icon="" value="{{$employee->lastname}}">Achternaam</x-input>
                            </div>
                        </div>
                    </div>
                </div>

                <div x-show="tab === 'afdeling'" class="bg-white p-5 shadow-sm rounded-sm h-full ">
                    <h2 class="font-bold md:text-5xl mb-5">Afdeling</h2>
                    <select name="department" id="department">
                        @foreach($departments as $department)
                            <option>{{$department}}</option>
                        @endforeach
                    </select>
                </div>

                <div x-show="tab === 'werktijden'" class="bg-white p-5 shadow-sm rounded-sm h-full ">
                    <h2 class="font-bold md:text-5xl mb-5">Werkdagen</h2>
                    @foreach($days_of_week as $day_of_week)
                        <label>{{$day_of_week->day}}</label><br>
                        Van: <x-time name="day_of_week[{{$loop->iteration}}][start_time]"/>
                        Tot: <x-time name="day_of_week[{{$loop->iteration}}][end_time]"/><br>
                    @endforeach
                </div>

                <div x-show="tab === 'blokken'" class="bg-white p-5 shadow-sm rounded-sm h-full ">
                    <h2 class="font-bold md:text-5xl mb-5">Blokken</h2>
                    @foreach($employee->lectorate as $lectorate)
                        <p class="md:text-2xl">{{$lectorate->name}}</p>
                        <select name="lectorate" id="department">
                            @foreach($departments as $department)
                                <option>{{$department}}</option>
                            @endforeach
                        </select>
                    @endforeach
                    @foreach($employee->hobby as $hobby)
                        <p class="md:text-2xl">Hobby: {{$hobby->name}}</p>
                        <select name="hobby" id="department">
                            @foreach($departments as $department)
                                <option>{{$department}}</option>
                            @endforeach
                        </select>
                    @endforeach
                    @foreach($employee->course as $course)
                        <p class="md:text-2xl">Course: {{$course->name}}</p>
                        <select name="course" id="department">
                            @foreach($departments as $department)
                                <option>{{$department}}</option>
                            @endforeach
                        </select>
                    @endforeach
                    @foreach($employee->minor as $minor)
                        <p class="md:text-2xl">Minor: {{$minor->name}}</p>
                        <select name="minor" id="department">
                            @foreach($departments as $department)
                                <option>{{$department}}</option>
                            @endforeach
                        </select>
                    @endforeach
                    @foreach($employee->learningLine as $learningLine)
                        <p class="md:text-2xl">Leerlijn: {{$learningLine->name}}</p>
                        <select name="learningLine" id="department">
                            @foreach($departments as $department)
                                <option>{{$department}}</option>
                            @endforeach
                        </select>
                    @endforeach
                    @foreach($employee->expertises as $expertise)
                        <p class="md:text-2xl">Expertise: {{$expertise->name}}</p>
                        <select name="expertise" id="department">
                            @foreach($departments as $department)
                                <option>{{$department}}</option>
                            @endforeach
                        </select>
                    @endforeach
                </div>

                    <div class="flex justify-end pt-6 space-x-4">
                        <x-button type="submit">
                            Opslaan
                        </x-button>
                        <x-button>
                            <a href="{{ route('employee.show', ['employee' => $employee]) }}">Annuleren</a>
                        </x-button>
                    </div>
                </form>
                <!-- End of profile tab -->
            </div>
        </div>
    </div>
    <script type="javascript">document.getElementsByClassName('w-7/12 border-red-700 border-4 rounded focus:bg-white focus:text-black')[0].click()</script>
</x-layout>
