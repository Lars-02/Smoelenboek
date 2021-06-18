<x-layout>
    @if ($message = Session::get('success'))
        <x-flash title="Succes" type="success">{{ $message }}</x-flash>
    @endif
    <form id="filterForm" method="GET" action="{{ route('home') }}">
        <div x-data="setup()" x-init="$refs.loading.classList.add('hidden');">


            <div class="mx-3 mt-4 mb-4 overflow-x-hidden overflow-y-scroll scrollbar-hide rounded-md">
                <div class="flex justify-left gap-1 mb-4 bg-gray-200 p-2 md:p-3 rounded-md flex-wrap">
                    <!-- Sidebars button -->
                    <div class="inline-block mr-2">
                        <div @click="isSidebarOpen = true; $nextTick(() => { $refs.sidebar.focus() })" class="focus:outline-none cursor-pointer py-2 px-3 text-white transition-colors duration-200 rounded-md bg-red-700 hover:bg-red-500 focus:outline-none focus:ring">
                            <i class="fa fa-search text-center"></i>
                        </div>
                    </div>
                    @if(!empty($filteredItems))
                        @foreach($filteredItems as $filteredItem)
                            <h4 class="inline-block bg-red-700 text-white p-2 rounded"> {{ $filteredItem->name }} </h4>
                        @endforeach
                    @endif
                </div>
                @if($employees->count() == 0)
                <div class="text-xl w-full text-center">
                    Er zijn geen resultaten gevonden.
                </div>
                @else
                <div class="grid gap-4 md:gap-6 xl:gap-8 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5">
                    @foreach($employees as $employee)
                        <x-profilecard :employee="$employee"></x-profilecard>
                    @endforeach
                </div>
                @endif
            </div>

        <!-- Filters -->
        <div class="sm:flex sm:overflow-hidden mb-2 h-0 ml-0">
            <div class="max-w-xs sm:w-1/2 xl:w-1/3 mr-0 sm:mr-3 h-0 sm:overflow-y-scroll scrollbar-hide">
                <div class="fixed z-40 flex h-screen antialiased text-gray-900 bg-gray-100">
                    <div x-ref="loading" class="fixed inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white bg-red-700">Loading..... </div>

                    <div x-show="isSidebarOpen" @click="isSidebarOpen = false" class="fixed inset-0 z-10 bg-gray-500" style="opacity: 0.5" aria-hidden="true" ></div>

                    <aside x-show="isSidebarOpen"
                        x-transition:enter="transition-all transform duration-300 ease-in-out"
                        x-transition:enter-start="-translate-x-full opacity-0"
                        x-transition:enter-end="translate-x-0 opacity-100"
                        x-transition:leave="transition-all transform duration-300 ease-in-out"
                        x-transition:leave-start="translate-x-0 opacity-100"
                        x-transition:leave-end="-translate-x-full opacity-0"
                        x-ref="sidebar"
                        tabindex="-1"
                        class="z-40 fixed inset-y-0 flex flex-shrink-0 overflow-hidden bg-gray-100 border-r focus:outline-none ">
                        <!-- Sidebar links -->
                        <nav aria-label="Main" class="h-screen flex-1 px-2 w-80 bg-gray-100 py-4 space-y-2 overflow-y-scroll hover:overflow-y-auto">
                            <div class="grid grid-cols-2 place-items-center pb-2 content-center justify-center w-full">
                                <x-button class="w-32 h-12"><a href="{{ route('home') }}">Wissen</a></x-button>
                                <x-button class="w-32 h-12" type="submit">Toepassen</x-button>
                            </div>
                            <div class="relative">
                                <input type="text"  value="{{$request["searchbar"]}}" name="searchbar" id="searchbar" placeholder="Zoeken..." class="select-text relative text-xs sm:text-sm md:text-base lg:text-lg px-2.5 py-2.5 pl-8 w-full rounded border-gray-400 focus:border-gray-400 text-gray-600 focus:ring-0"/>
                                <i class="select-none absolute left-3 bottom-3 sm:bottom-4 text-gray-600 fas fa-search"></i>
                            </div>
                            <x-filterModal title="Vakken">
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
                            <x-filterModal title="Functies">
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
                            <x-filterModal title="Lectoraten">
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
                            <x-filterModal title="Minoren">
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
                        </nav>
                    </aside>
                </div>
            </div>
            </div>
        </div>
    </form>
    <script>
        const setup = () => {
            return {
                loading: true,
                isSidebarOpen: window.innerWidth >= 50000 ? true : false,
                toggleSidebarMenu() {
                    this.isSidebarOpen = !this.isSidebarOpen
                },
            }
        }
    </script>
</x-layout>
