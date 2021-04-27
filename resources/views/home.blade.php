<x-layout>
    <form id="filterForm" method="GET" action="{{ route('home') }}">
        <div class="mx-3 sm:mx-4 md:mx-5 my-4">
            <div class="flex justify-between">
                <x-button type="submit">Apply</x-button>
                <div>
                    <span class="absolute pl-3 pt-1 sm:pt-2 md:pt-1.5 lg:pt-2.5 xl:pt-3 text-gray-600">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text" name="searchbar" id="searchbar" placeholder="Zoeken..." class="text-xs sm:text-sm md:text-base lg:text-lg pl-8 rounded border-gray-400 focus:border-gray-400 text-gray-600 focus:ring-0"/>
                </div>
            </div>
        </div>
        <div class="sm:flex sm:h-screen sm:overflow-hidden mb-2 mx-3 sm:mx-4 md:mx-5">
            <div class="sm:w-1/2 xl:w-1/3 mr-0 sm:mr-3 sm:overflow-y-scroll scrollbar-hide">
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
            </div>
            <div class="flex-grow mb-4 overflow-x-hidden overflow-y-scroll scrollbar-hide rounded-md pb-4">
                <div
                    class="grid gap-4 md:gap-6 xl:gap-8 grid-cols-2 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    @foreach($employees as $employee)
                        <x-profilecard :employee="$employee"></x-profilecard>
                    @endforeach
                </div>
            </div>
        </div>
    </form>
</x-layout>
