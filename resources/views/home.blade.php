<x-layout>
    <form id="filterForm" method="GET" action="{{ route('home') }}">
        <div class="sm:mx-4 md:mx-5 my-4">
            <div class="sm:w-1/3 xl:w-1/4">
                <x-button type="submit">Apply</x-button>
            </div>
        </div>
        <div class="sm:flex sm:h-screen sm:overflow-hidden mb-2 mx-3 sm:mx-4 md:mx-5">
            <div class="sm:w-1/3 xl:w-1/4 mr-0 sm:mr-3 sm:overflow-y-scroll scrollbar-hide">
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
            <div class="flex-grow mb-4 overflow-x-hidden overflow-y-scroll scrollbar-hide">
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
