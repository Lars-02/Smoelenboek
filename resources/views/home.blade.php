<x-layout>
    <form id="filterForm" method="GET" action="{{ route('home') }}">
        <div class="mx-3 sm:mx-4 md:mx-5 my-4">
            <div class="space-y-5">
                @if(Auth::user()->isAdmin())
                    <x-button class="absolute right-5 "><a href="{{route('register')}}">Nieuwe gebruiker</a></x-button>
                @endif
                <div>
                    <span class="absolute pl-3 pt-1 sm:pt-2 md:pt-1.5 lg:pt-2.5 xl:pt-3 text-gray-600">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text"  value="{{$request["searchbar"]}}" name="searchbar" id="searchbar" placeholder="Zoeken..." class="text-xs sm:text-sm md:text-base lg:text-lg pl-8 rounded border-gray-400 focus:border-gray-400 text-gray-600 focus:ring-0"/>
                </div>
                <x-button><a href="{{ route('home') }}">Clear</a></x-button>
                <x-button type="submit">Apply</x-button>

            </div>
        </div>
        <div class="sm:flex sm:h-screen sm:overflow-hidden mb-2  ml-0 sm:mx-4 md:mx-5">
            <div class="max-w-xs sm:w-1/2 xl:w-1/3 mr-0 sm:mr-3 sm:overflow-y-scroll scrollbar-hide">
                @csrf
                <div
                    x-data="setup()"
                    x-init="$refs.loading.classList.add('hidden');"
                    @resize.window="watchScreen()"
                >
                <div class="fixed z-30 flex h-screen antialiased text-gray-900 bg-gray-100">
                    <div x-ref="loading" class="inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white bg-red-700">Loading..... </div>

                    <div x-show="isSidebarOpen"
                        @click="isSidebarOpen = false"
                        class="inset-0 z-10 bg-gray-500 lg:hidden"
                        style="opacity: 0.5"
                        aria-hidden="true" ></div>
                    <aside
                        x-show="isSidebarOpen"
                        x-transition:enter="transition-all transform duration-300 ease-in-out"
                        x-transition:enter-start="-translate-x-full opacity-0"
                        x-transition:enter-end="translate-x-0 opacity-100"
                        x-transition:leave="transition-all transform duration-300 ease-in-out"
                        x-transition:leave-start="translate-x-0 opacity-100"
                        x-transition:leave-end="-translate-x-full opacity-0"
                        x-ref="sidebar"
                        tabindex="-1"
                        class="z-30 inset-y-0 flex flex-shrink-0 overflow-hidden bg-gray-100 border-r lg:static focus:outline-none ">
                        <!-- Sidebar links -->
                        <nav aria-label="Main" class="h-3/4 flex-1 px-2 w-80 bg-gray-100 py-4 space-y-2 overflow-y-scroll hover:overflow-y-auto">
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
                        </nav>
                    </aside>
                    <!-- Sidebars button -->
                    <div class="z-30 fixed flex items-center space-x-4 top-5 right-10 lg:hidden">
                        <div
                            @click="isSidebarOpen = true; $nextTick(() => { $refs.sidebar.focus() })"
                            class="focus:outline-none cursor-pointer p-1 text-white transition-colors duration-200 rounded-md bg-red-700 hover:bg-red-500 focus:outline-none focus:ring"
                        >
                            <span class="sr-only">Toggle main menu</span>
                            <span aria-hidden="true">
                                  <svg
                                      x-show="!isSidebarOpen"
                                      class="w-8 h-8"
                                      xmlns="http://www.w3.org/2000/svg"
                                      fill="none"
                                      viewBox="0 0 24 24"
                                      stroke="currentColor"
                                  >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                  </svg>
                                  <svg
                                      x-show="isSidebarOpen"
                                      class="w-8 h-8"
                                      xmlns="http://www.w3.org/2000/svg"
                                      fill="none"
                                      viewBox="0 0 24 24"
                                      stroke="currentColor"
                                  >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                  </svg>
                            </span>
                        </div>
                    </div>

                </div>
            </div>
            </div>
            <script>
                const setup = () => {
                    return {
                        loading: true,
                        watchScreen() {
                            if (window.innerWidth <= 1024) {
                                this.isSidebarOpen = false
                            } else if (window.innerWidth >= 1024) {
                                this.isSidebarOpen = true
                            }
                        },
                        isSidebarOpen: window.innerWidth >= 1024 ? true : false,
                        toggleSidebarMenu() {
                            this.isSidebarOpen = !this.isSidebarOpen
                        },
                    }
                }
            </script>


            <div class="mx-3 space-x-4 top-28 flex-grow mb-4 overflow-x-hidden overflow-y-scroll scrollbar-hide rounded-md pb-4">
                <div class="grid gap-4 md:gap-6 xl:gap-8 grid-cols-2 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    @foreach($employees as $employee)
                        <x-profilecard :employee="$employee"></x-profilecard>
                    @endforeach
                </div>
            </div>
        </div>
    </form>
</x-layout>
