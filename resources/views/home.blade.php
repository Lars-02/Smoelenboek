<x-layout>
    <form id="filterForm" method="GET" action="{{ route('home') }}">
        <div class="mx-3 sm:mx-4 md:mx-5 my-4">
            <div class="space-y-5">
                @if(Auth::user()->isAdmin())
                    <x-button class="absolute right-5 "><a href="{{route('register.create')}}">Nieuwe gebruiker</a>
                    </x-button>
                @endif
                <div>
                    <span class="absolute pl-3 pt-1 sm:pt-2 md:pt-1.5 lg:pt-2.5 xl:pt-3 text-gray-600">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text" value="{{$request["searchbar"]}}" name="searchbar" id="searchbar"
                           placeholder="Zoeken..."
                           class="text-xs sm:text-sm md:text-base lg:text-lg pl-8 rounded border-gray-400 focus:border-gray-400 text-gray-600 focus:ring-0"/>
                </div>
                <x-button><a href="{{ route('home') }}">Clear</a></x-button>
                <x-button type="submit">Apply</x-button>

            </div>
        </div>
        <div class="sm:flex sm:h-screen sm:overflow-hidden mb-2 mx-3 sm:mx-4 md:mx-5">
            <div class="max-w-xs sm:w-1/2 xl:w-1/3 mr-0 sm:mr-3 sm:overflow-y-scroll scrollbar-hide">
                @csrf
                <x-filterModal title="Cursus">
                    @foreach($courses as $course)
                        @if(isset($request->get("courses")[$course->id]))
                            <x-filterSelector name="courses[{{ $course->id }}]" checked="true">
                                {{ $course->name }}
                            </x-filterSelector>
                        @else
                            <x-filterSelector name="courses[{{ $course->id }}]" checked="false">
                                {{ $course->name }}
                            </x-filterSelector>
                        @endif
                    @endforeach
                </x-filterModal>
                <x-filterModal title="Functie">
                    @foreach($roles as $role)
                        @if(isset($request->get("roles")[$role->id]))
                            <x-filterSelector name="roles[{{ $role->id }}]" checked="true">
                                {{ $role->name }}
                            </x-filterSelector>
                        @else
                            <x-filterSelector name="roles[{{ $role->id }}]" checked="false">
                                {{ $role->name }}
                            </x-filterSelector>
                        @endif
                    @endforeach
                </x-filterModal>
                <x-filterModal title="Werkdagen">
                    @foreach($workDays as $workDay)
                        @if(isset($request->get("workDays")[$workDay->id]))
                            <x-filterSelector name="workDays[{{ $workDay->id }}]" checked="true">
                                {{ $workDay->name }}
                            </x-filterSelector>
                        @else
                            <x-filterSelector name="workDays[{{ $workDay->id }}]" checked="false">
                                {{ $workDay->name }}
                            </x-filterSelector>
                        @endif
                    @endforeach
                </x-filterModal>
                <x-filterModal title="Leerlijn">
                    @foreach($learningLines as $learningLine)
                        @if(isset($request->get("learningLines")[$learningLine->id]))
                            <x-filterSelector name="learningLines[{{ $learningLine->id }}]" checked="true">
                                {{ $learningLine->name }}
                            </x-filterSelector>
                        @else
                            <x-filterSelector name="learningLines[{{ $learningLine->id }}]" checked="false">
                                {{ $learningLine->name }}
                            </x-filterSelector>
                        @endif
                    @endforeach
                </x-filterModal>
                <x-filterModal title="Afdeling">
                    @foreach($departments as $department)
                        @if(isset($request->get("departments")[$department->id]))
                            <x-filterSelector name="departments[{{ $department->id }}]" checked="true">
                                {{ $department->name }}
                            </x-filterSelector>
                        @else
                            <x-filterSelector name="departments[{{ $department->id }}]" checked="false">
                                {{ $department->name }}
                            </x-filterSelector>
                        @endif
                    @endforeach
                </x-filterModal>
                <x-filterModal title="Hobbies">
                    @foreach($hobbies as $hobby)
                        @if(isset($request->get("hobbies")[$hobby->id]))
                            <x-filterSelector name="hobbies[{{ $hobby->id }}]" checked="true">
                                {{ $hobby->name }}
                            </x-filterSelector>
                        @else
                            <x-filterSelector name="hobbies[{{ $hobby->id }}]" checked="false">
                                {{ $hobby->name }}
                            </x-filterSelector>
                        @endif
                    @endforeach
                </x-filterModal>
                <x-filterModal title="Lectorates">
                    @foreach($lectorates as $lectorate)
                        @if(isset($request->get("lectorates")[$lectorate->id]))
                            <x-filterSelector name="lectorates[{{ $lectorate->id }}]" checked="true">
                                {{ $lectorate->name }}
                            </x-filterSelector>
                        @else
                            <x-filterSelector name="lectorates[{{ $lectorate->id }}]" checked="false">
                                {{ $lectorate->name }}
                            </x-filterSelector>
                        @endif
                    @endforeach
                </x-filterModal>
                <x-filterModal title="Minors">
                    @foreach($minors as $minor)
                        @if(isset($request->get("minors")[$minor->id]))
                            <x-filterSelector name="minors[{{ $minor->id }}]" checked="true">
                                {{ $minor->name }}
                            </x-filterSelector>
                        @else
                            <x-filterSelector name="minors[{{ $minor->id }}]" checked="false">
                                {{ $minor->name }}
                            </x-filterSelector>
                        @endif
                    @endforeach
                </x-filterModal>
                <x-filterModal title="Expertises">
                    @foreach($expertises as $expertise)
                        @if(isset($request->get("expertises")[$expertise->id]))
                            <x-filterSelector name="expertises[{{ $expertise->id }}]" checked="true">
                                {{ $expertise->name }}
                            </x-filterSelector>
                        @else
                            <x-filterSelector name="expertises[{{ $expertise->id }}]" checked="false">
                                {{ $expertise->name }}
                            </x-filterSelector>
                        @endif
                    @endforeach
                </x-filterModal>
            </div>
            <div class="flex-grow mb-4 overflow-x-hidden overflow-y-scroll scrollbar-hide rounded-md pb-4">
                @if($request->has('courses') || $request->has('roles') || $request->has('workDays') || $request->has('learningLines') || $request->has('departments') || $request->has('hobbies') || $request->has('lectorates') || $request->has('minors') || $request->has('expertises'))
                    <div class="mb-4 bg-gray-200 pt-3 pb-1 px-3 rounded-md">
                        <h3 class="inline-block">
                            Gekozen filters:
                        </h3>
                        @foreach($courses as $course)
                            @if(isset($request->get("courses")[$course->id]))
                                <h4 class="mb-2 inline-block bg-red-700 text-white p-2 rounded"> {{ $course->name }} </h4>
                            @endif
                        @endforeach
                        @foreach($roles as $role)
                            @if(isset($request->get("roles")[$role->id]))
                                <h4 class="mb-2 inline-block bg-red-700 text-white p-2 rounded"> {{ $role->name }} </h4>
                            @endif
                        @endforeach
                        @foreach($workDays as $workDay)
                            @if(isset($request->get("workDays")[$workDay->id]))
                                <h4 class="mb-2 inline-block bg-red-700 text-white p-2 rounded"> {{ $workDay->name }} </h4>
                            @endif
                        @endforeach
                        @foreach($learningLines as $learningLine)
                            @if(isset($request->get("expertises")[$learningLine->id]))
                                <h4 class="mb-2 inline-block bg-red-700 text-white p-2 rounded"> {{ $learningLine->name }} </h4>
                            @endif
                        @endforeach
                        @foreach($departments as $department)
                            @if(isset($request->get("departments")[$department->id]))
                                <h4 class="mb-2 inline-block bg-red-700 text-white p-2 rounded"> {{ $department->name }} </h4>
                            @endif
                        @endforeach
                        @foreach($hobbies as $hobby)
                            @if(isset($request->get("hobbies")[$hobby->id]))
                                <h4 class="mb-2 inline-block bg-red-700 text-white p-2 rounded"> {{ $hobby->name }} </h4>
                            @endif
                        @endforeach
                        @foreach($lectorates as $lectorate)
                            @if(isset($request->get("lecorates")[$lectorate->id]))
                                <h4 class="mb-2 inline-block bg-red-700 text-white p-2 rounded"> {{ $lectorate->name }} </h4>
                            @endif
                        @endforeach
                        @foreach($minors as $minor)
                            @if(isset($request->get("minors")[$minor->id]))
                                <h4 class="mb-2 inline-block bg-red-700 text-white p-2 rounded"> {{ $minor->name }} </h4>
                            @endif
                        @endforeach
                        @foreach($expertises as $expertise)
                            @if(isset($request->get("expertises")[$expertise->id]))
                                <h4 class="mb-2 inline-block bg-red-700 text-white p-2 rounded"> {{ $expertise->name }} </h4>
                            @endif
                        @endforeach
                    </div>
                @endif
                @if($employees->count() == 0)
                    <div class="grid grid-cols-3 gap-4">
                    <div class="select-none col-start-2 sm:text-sm md:text-base lg:text-lg mb-1.5 pl-1.5 py-0.5 text-center items-center text-white bg-red-700 rounded font-medium">
                        Er zijn geen resultaten gevonden.
                    </div>
                    </div>
                @else
                    <div
                        class="grid gap-4 md:gap-6 xl:gap-8 grid-cols-2 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                        @foreach($employees as $employee)
                            <x-profilecard :employee="$employee"></x-profilecard>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </form>
</x-layout>
