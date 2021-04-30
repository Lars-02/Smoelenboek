<x-layout>
    <div class="bg-white min-h-screen">
        <div class="container w-full py-16 pr-36">
            <div class="md:flex no-wrap md:-mx-2 " x-data="{ tab: 'account' }">
                <!-- Left Side -->
                <div class="w-full md:w-3/12">
                    <!-- Side navbar -->
                    <ul class="text-gray-600 hover:text-gray-700">
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
                    <form class="w-full md:w-9/12 mx-2" method="POST" action="{{route('employee.update', $employee)}}">
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
                                        <input class="text-xs sm:text-sm md:text-base lg:text-lg px-2.5 py-2.5 w-full rounded border-gray-400 focus:border-gray-400 text-gray-600 focus:ring-0" type="text" name="firstname" value="{{$employee->firstname}}">
                                    </div>
                                    <div class="mb-5 md:pr-5">
                                        <label class="mb-1.5 pl-1.5 py-0.5 float-left text-left text-white w-6/12 bg-red-700 rounded">Achternaam:</label>
                                        <input class="text-xs sm:text-sm md:text-base lg:text-lg px-2.5 py-2.5 w-full rounded border-gray-400 focus:border-gray-400 text-gray-600 focus:ring-0" type="text" name="lastname" value="{{$employee->lastname}}">
                                    </div>
                                    <div class="mb-5 md:pr-5">
                                        <label class="mb-1.5 pl-1.5 py-0.5 float-left text-left text-white w-6/12 bg-red-700 rounded">Email:</label>
                                        <input class="text-xs sm:text-sm md:text-base lg:text-lg px-2.5 py-2.5 w-full rounded border-gray-400 focus:border-gray-400 text-gray-600 focus:ring-0" type="email" name="email" value="{{$employee->user->email}}">
                                    </div>
                                    <div class="mb-5 md:pr-5">
                                        <label class="mb-1.5 pl-1.5 py-0.5 float-left text-left text-white w-6/12 bg-red-700 rounded">Telefoonnummer:</label>
                                        <input class="text-xs sm:text-sm md:text-base lg:text-lg px-2.5 py-2.5 w-full rounded border-gray-400 focus:border-gray-400 text-gray-600 focus:ring-0" type="tel" name="phoneNumber" value="{{$employee->phoneNumber}}">
                                    </div>
                                    <div class="mb-5 md:pr-5">
                                        <label class="mb-1.5 pl-1.5 py-0.5 float-left text-left text-white w-6/12 bg-red-700 rounded">LinkedIn url:</label>
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
                                <select class="px-2.5 py-2.5 w-full rounded" name="department" id="department">
                                    @foreach($departments as $department)
                                        <option @if($employee->department === $department) selected @endif>{{$department}}</option>
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
                            <div class="w-full ">
                                @foreach($days_of_week as $day_of_week)
                                    <input type="checkbox" @if($employee->workHours->contains($day_of_week)) checked @endif/><label>{{$day_of_week->day}}</label>
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
                                    <select class="w-full" name="lectorate" multiple>
                                        @foreach($lectorates as $lectorate)
                                            <option @if($employee->lectorate->contains($lectorate)) selected @endif>{{$lectorate->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-5 md:pr-5">
                                    <label class="mb-1.5 pl-1.5 py-0.5 float-left text-left text-white w-6/12 bg-red-700 rounded">Hobby's:</label>
                                    <select class="w-full" name="hobbies[]" multiple>
                                        @foreach($hobbies as $hobby)
                                            <option @if($employee->hobby->contains($hobby)) selected @endif>{{$hobby->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-5 md:pr-5">
                                    <label class="mb-1.5 pl-1.5 py-0.5 float-left text-left text-white w-6/12 bg-red-700 rounded">Cursussen:</label>
                                    <select class="w-full" name="courses[]" multiple>
                                        @foreach($courses as $course)
                                            <option @if($employee->course->contains($course)) selected @endif>{{$course->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-5 md:pr-5">
                                    <label class="mb-1.5 pl-1.5 py-0.5 float-left text-left text-white w-6/12 bg-red-700 rounded">Leerlijnen:</label>
                                    <select class="w-full" name="learningLines[]" multiple>
                                        @foreach($learningLines as $learningLine)
                                            <option @if($employee->learningLine->contains($learningLine)) selected @endif>{{$learningLine->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-5 md:pr-5">
                                    <label class="mb-1.5 pl-1.5 py-0.5 float-left text-left text-white w-6/12 bg-red-700 rounded">Expertises:</label>
                                    <select class="w-full" name="expertises[]" multiple>
                                        @foreach($expertises as $expertise)
                                            <option @if($employee->expertises->contains($expertise)) selected @endif>{{$expertise->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-5 md:pr-5">
                                    <label class="mb-1.5 pl-1.5 py-0.5 float-left text-left text-white w-6/12 bg-red-700 rounded">Minoren:</label>
                                    <select class="w-full" name="minors[]" multiple>
                                        @foreach($minors as $minor)
                                            <option @if($employee->minor->contains($minor)) selected @endif>{{$minor->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
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
    </div>
    <script type="javascript">document.getElementsByClassName('w-7/12 border-red-700 border-4 rounded focus:bg-white focus:text-black')[0].click()</script>
</x-layout>
