<x-layout>
    <div class="bg-white">
        <div class="container w-screen py-12 md:pr-36 px-10">
            <div class="min-h-screen md:flex no-wrap md:-mx-2" x-data="{ tab: 'account' }">
                <!-- Left Side -->
                <div class="w-full md:w-3/12">
                    <!-- Side navbar -->
                    <ul class="h-full mb-12 text-gray-600 hover:text-gray-700">
                        <li class="flex items-center justify-center pb-3">
                            <button class="text-xs sm:text-sm md:text-base lg:text-lg text-white font-bold py-2 px-3 sm:px-4 md:px-5 xl:px-6 bg-red-700 w-10/12 border-red-700 border-4 rounded hover:bg-white hover:text-black" @click="tab = 'account'">Account</button>
                        </li>
                        <li class="flex items-center justify-center py-3">
                            <button class="text-xs sm:text-sm md:text-base lg:text-lg text-white font-bold py-2 px-3 sm:px-4 md:px-5 xl:px-6 bg-red-700 w-10/12 border-red-700 border-4 rounded hover:bg-white hover:text-black" @click="tab = 'afdeling'">Afdeling</button>
                        </li>
                        <li class="flex items-center justify-center py-3">
                            <button class="text-xs sm:text-sm md:text-base lg:text-lg text-white font-bold py-2 px-3 sm:px-4 md:px-5 xl:px-6 bg-red-700 w-10/12 border-red-700 border-4 rounded hover:bg-white hover:text-black" @click="tab = 'werktijden'">Werktijden</button>
                        </li>
                        <li class="flex items-center justify-center py-3">
                            <button class="text-xs sm:text-sm md:text-base lg:text-lg text-white font-bold py-2 px-3 sm:px-4 md:px-5 xl:px-6 bg-red-700 w-10/12 border-red-700 border-4 rounded hover:bg-white hover:text-black" @click="tab = 'overig'">Overige</button>
                        </li>
                    </ul>
                    <!-- End of Side navbar -->
                </div>
                <!-- Right Side -->

                    <!-- Profile Tab -->
                    <form class="w-full md:w-9/12 md:mx-2" method="POST" action="{{route('employee.update', $employee)}}">
                        @csrf
                        <input name="_method" type="hidden" value="PUT">

                        <div x-show="tab === 'account'">
                            <div class="md:flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-12 md:h-1/2 md:flex-shrink-0">
                                @if (empty($employee->user->photoUrl))
                                    <img src="https://www.shareicon.net/data/128x128/2016/07/26/801997_user_512x512.png" class="md:flex-shrink-0 md:w-48 min-h-full max-h-full">
                                @else
                                    <img src="{{$employee->user->photoUrl}}" class="md:flex-shrink-0 min-h-full max-h-full">
                                @endif {{--this probaply needs to become a local image sometime lol^^--}}
                                <p class="md:text-5xl sm:text-3xl ">{{$employee->firstname}} {{$employee->lastname}} </p>
                            </div>

                            <div class="text-gray-700">
                                <div class="grid md:grid-cols-2 text-sm">
                                    <div class="mb-5 md:pr-5">
                                        <label class="mb-1.5 pl-1.5 py-0.5 float-left text-left text-white w-6/12 bg-red-700 rounded">Voornaam:</label>
                                        @error('firstname')
                                            <x-alert class="error">{{ $message }}</x-alert>
                                        @enderror
                                        <input class="text-xs sm:text-sm md:text-base lg:text-lg px-2.5 py-2.5 w-full rounded border-gray-400 focus:border-gray-400 text-gray-600 focus:ring-0" type="text" name="firstname" value="{{$employee->firstname}}">
                                    </div>
                                    <div class="mb-5 md:pr-5">
                                        <label class="mb-1.5 pl-1.5 py-0.5 float-left text-left text-white w-6/12 bg-red-700 rounded">Achternaam:</label>
                                        @error('lastname')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                        <input class="text-xs sm:text-sm md:text-base lg:text-lg px-2.5 py-2.5 w-full rounded border-gray-400 focus:border-gray-400 text-gray-600 focus:ring-0" type="text" name="lastname" value="{{$employee->lastname}}">
                                    </div>
                                    <div class="mb-5 md:pr-5">
                                        <label class="mb-1.5 pl-1.5 py-0.5 float-left text-left text-white w-6/12 bg-red-700 rounded">Email:</label>
                                        @error('email')
                                            <x-alert class="error">{{ $message }}</x-alert>
                                        @enderror
                                        <input class="text-xs sm:text-sm md:text-base lg:text-lg px-2.5 py-2.5 w-full rounded border-gray-400 focus:border-gray-400 text-gray-600 focus:ring-0" type="email" name="email" value="{{$employee->user->email}}">
                                    </div>
                                    <div class="mb-5 md:pr-5">
                                        <label class="mb-1.5 pl-1.5 py-0.5 float-left text-left text-white w-6/12 bg-red-700 rounded">Telefoonnummer:</label>
                                        @error('phoneNumber')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                        <input class="text-xs sm:text-sm md:text-base lg:text-lg px-2.5 py-2.5 w-full rounded border-gray-400 focus:border-gray-400 text-gray-600 focus:ring-0" type="tel" name="phoneNumber" value="{{$employee->phoneNumber}}">
                                    </div>
                                    <div class="mb-5 md:pr-5">
                                        <label class="mb-1.5 pl-1.5 py-0.5 float-left text-left text-white w-6/12 bg-red-700 rounded">LinkedIn url:</label>
                                        @error('linkedInUrl')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                        <input class="text-xs sm:text-sm md:text-base lg:text-lg px-2.5 py-2.5 w-full rounded border-gray-400 focus:border-gray-400 text-gray-600 focus:ring-0" type="text" name="linkedInUrl" value="{{$employee->linkedInUrl}}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div x-show="tab === 'afdeling'">
                            <div class="md:flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-12 md:h-1/2 md:flex-shrink-0">
                                @if (empty($employee->user->photoUrl))
                                    <img src="https://www.shareicon.net/data/128x128/2016/07/26/801997_user_512x512.png" class="md:flex-shrink-0 md:w-48 min-h-full max-h-full">
                                @else
                                    <img src="{{$employee->user->photoUrl}}" class="md:flex-shrink-0 min-h-full max-h-full">
                                @endif {{--this probaply needs to become a local image sometime lol^^--}}
                                <p class="md:text-5xl sm:text-3xl ">{{$employee->firstname}} {{$employee->lastname}} </p>
                            </div>

                            <div class="w-6/12 pb-10">
                                <h2 class="font-bold md:text-5xl mb-5">Afdeling</h2>

                                <label class="mb-1.5 pl-1.5 py-0.5 float-left text-left text-white w-6/12 bg-red-700 rounded">Wijzig de afdeling:</label>
                                @error('department')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                                <select class="mb-5 px-2.5 py-2.5 w-full rounded" name="department">
                                    @foreach($departments as $department)
                                        <option name="department" @if($employee->department === $department) selected @endif>{{$department}}</option>
                                    @endforeach
                                </select>

                                <label class="mb-1.5 pl-1.5 py-0.5 float-left text-left text-white w-6/12 bg-red-700 rounded">Wijzig rol:</label>
                                @error('roles')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                                <select class="px-2.5 py-2.5 w-full rounded" name="roles">
                                    @foreach($roles as $role)
                                        <option name="department" @if($employee->user->roles->contains($role)) selected @endif>{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div x-show="tab === 'werktijden'">
                            <div class="md:flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-12 md:h-1/2 md:flex-shrink-0">
                                @if (empty($employee->user->photoUrl))
                                    <img src="https://www.shareicon.net/data/128x128/2016/07/26/801997_user_512x512.png" class="md:flex-shrink-0 md:w-48 min-h-full max-h-full">
                                @else
                                    <img src="{{$employee->user->photoUrl}}" class="md:flex-shrink-0 min-h-full max-h-full">
                                @endif {{--this probaply needs to become a local image sometime lol^^--}}
                                <p class="md:text-5xl sm:text-3xl ">{{$employee->firstname}} {{$employee->lastname}} </p>
                            </div>

                            <h2 class="font-bold md:text-5xl mb-5">Werkdagen</h2>
                            <label class="mb-1.5 pl-1.5 py-0.5 text-left text-white w-6/12 bg-red-700 rounded block">Selecteer werkzame dagen:</label>
                            <div class="w-full">
                                @foreach($days_of_week as $day_of_week)
                                    <input type="checkbox" @if($employee->workHours->contains($day_of_week)) checked @endif/><label> {{$day_of_week->day}}</label>
                                    <br>
                                @endforeach
                            </div>
                        </div>

                        <div x-show="tab === 'overig'">
                            <div class="md:flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-12 md:h-1/2 md:flex-shrink-0">
                                @if (empty($employee->user->photoUrl))
                                    <img src="https://www.shareicon.net/data/128x128/2016/07/26/801997_user_512x512.png" class="md:flex-shrink-0 md:w-48 min-h-full max-h-full">
                                @else
                                    <img src="{{$employee->user->photoUrl}}" class="md:flex-shrink-0 min-h-full max-h-full">
                                @endif {{--this probaply needs to become a local image sometime lol^^--}}
                                <p class="md:text-5xl sm:text-3xl ">{{$employee->firstname}} {{$employee->lastname}} </p>
                            </div>

                            <h2 class="font-bold md:text-5xl mb-5">Overige zaken</h2>
                            <div class="grid md:grid-cols-2">
                                <div class="mb-5 md:pr-5">
                                    <label class="mb-1.5 pl-1.5 py-0.5 float-left text-left text-white w-6/12 bg-red-700 rounded">Lectoraten:</label>
                                    <div class="h-32 mt-10 overflow-scroll border-b-2">
                                        @foreach ($errors->get('lectorates.*') as $message)
                                            <div class="error">{{ $message }}</div>
                                        @endforeach
                                        @foreach($lectorates as $lectorate)
                                            <div>
                                                <input @if ($employee->lectorate->contains($lectorate->id)) checked @endif value="{{$lectorate->id}}" name="lectorates[]" type="checkbox">
                                                <label>{{$lectorate->name}}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="mb-5 md:pr-5">
                                    <label class="mb-1.5 pl-1.5 py-0.5 float-left text-left text-white w-6/12 bg-red-700 rounded">Hobby's:</label>
                                    <div class="h-32 mt-10 overflow-scroll border-b-2">
                                        @foreach ($errors->get('hobbies.*') as $message)
                                            <div class="error">{{ $message }}</div>
                                        @endforeach
                                        @foreach($hobbies as $hobby)
                                            <div>
                                                <input @if ($employee->hobby->contains($hobby->id)) checked @endif value="{{$hobby->id}}" name="hobbies[]" type="checkbox">
                                                <label>{{$hobby->name}}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="mb-5 md:pr-5">
                                    <label class="mb-1.5 pl-1.5 py-0.5 float-left text-left text-white w-6/12 bg-red-700 rounded">Cursussen:</label>
                                    <div class="h-32 mt-10 overflow-scroll border-b-2">
                                        @foreach ($errors->get('courses.*') as $message)
                                            <div class="error">{{ $message }}</div>
                                        @endforeach
                                        @foreach($courses as $course)
                                            <div>
                                                <input @if ($employee->course->contains($course->id)) checked @endif value="{{$course->id}}" name="courses[]" type="checkbox">
                                                <label>{{$course->name}}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="mb-5 md:pr-5">
                                    <label class="mb-1.5 pl-1.5 py-0.5 float-left text-left text-white w-6/12 bg-red-700 rounded">Leerlijnen:</label>
                                    <div class="h-32 mt-10 overflow-scroll border-b-2">
                                        @foreach ($errors->get('learningLines.*') as $message)
                                            <div class="error">{{ $message }}</div>
                                        @endforeach
                                        @foreach($learningLines as $learningLine)
                                            <div>
                                                <input @if ($employee->learningLine->contains($learningLine->id)) checked @endif value="{{$learningLine->id}}" name="learningLines[]" type="checkbox">
                                                <label>{{$learningLine->name}}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="mb-5 md:pr-5">
                                    <label class="mb-1.5 pl-1.5 py-0.5 float-left text-left text-white w-6/12 bg-red-700 rounded">Expertises:</label>
                                    <div class="h-32 mt-10 overflow-scroll border-b-2">
                                        @foreach ($errors->get('expertises.*') as $message)
                                            <div class="error">{{ $message }}</div>
                                        @endforeach
                                        @foreach($expertises as $expertise)
                                            <div>
                                                <input @if ($employee->expertises->contains($expertise->id)) checked @endif value="{{$expertise->id}}" name="expertises[]" type="checkbox">
                                                <label>{{$expertise->name}}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="mb-5 md:pr-5">
                                    <label class="mb-1.5 pl-1.5 py-0.5 float-left text-left text-white w-6/12 bg-red-700 rounded">Minoren:</label>
                                    <div class="h-32 mt-10 overflow-scroll border-b-2">
                                        @foreach ($errors->get('minors.*') as $message)
                                            <div class="error">{{ $message }}</div>
                                        @endforeach
                                        @foreach($minors as $minor)
                                            <div>
                                                <input @if ($employee->minor->contains($minor->id)) checked @endif value="{{$minor->id}}" name="minors[]" type="checkbox">
                                                <label>{{$minor->name}}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" pt-6">
                            @if($employee->user->isAdmin())
                            <div class="inline-block">
                                <x-button>
                                    Account verwijderen
                                </x-button>
                            </div>
                            @endif
                            <div class="block float-right">
                                <x-button type="submit">
                                    Opslaan
                                </x-button>
                                <x-button>
                                    <a href="{{ route('employee.show', ['employee' => $employee]) }}">Annuleren</a>
                                </x-button>
                            </div>
                        </div>
                    </form>
                    <!-- End of profile tab -->
                </div>
            </div>
        </div>
    </div>
    <script type="javascript">document.getElementsByClassName('w-7/12 border-red-700 border-4 rounded focus:bg-white focus:text-black')[0].click()</script>
</x-layout>
