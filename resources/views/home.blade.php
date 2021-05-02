<x-layout>
    <div class="h-12"></div>
    <div class="sm:flex sm:h-screen sm:overflow-hidden mb-2 mx-3 sm:mx-4 md:mx-5">
        <div class="sm:w-1/3 xl:w-1/4 mr-0 sm:mr-3 sm:overflow-y-scroll scrollbar-hide">
            <x-filterModal title="Hobbies">
                @foreach($hobbies as $hobby)
                    @if(isset($request->get("Hobbies")[$hobby->id]))
                        <x-filterSelector name="Hobbies[{{ $hobby->id }}]" checked="true">
                            {{ $hobby->name }}
                        </x-filterSelector>
                    @else
                        <x-filterSelector name="Hobbies[{{ $hobby->id }}]" checked="false">
                            {{ $hobby->name }}
                        </x-filterSelector>
                    @endif
                @endforeach
            </x-filterModal>
            <x-filterModal title="Lectorates">
                @foreach($Lectorates as $Lectorate)
                    @if(isset($request->get("Lectorates")[$Lectorate->id]))
                        <x-filterSelector name="Lectorates[{{ $Lectorate->id }}]" checked="true">
                            {{ $Lectorate->name }}
                        </x-filterSelector>
                    @else
                        <x-filterSelector name="Lectorates[{{ $Lectorate->id }}]" checked="false">
                            {{ $Lectorate->name }}
                        </x-filterSelector>
                    @endif
                @endforeach
            </x-filterModal>
            <x-filterModal title="Minors">
                @foreach($minors as $minor)
                    @if(isset($request->get("expertises")[$minor->id]))
                        <x-filterSelector name="Minors[{{ $minor->id }}]" checked="true">
                            {{ $minor->name }}
                        </x-filterSelector>
                    @else
                        <x-filterSelector name="Minors[{{ $minor->id }}]" checked="false">
                            {{ $minor->name }}
                        </x-filterSelector>
                    @endif
                @endforeach
            </x-filterModal>
            <x-filterModal title="Expertises">
                @foreach($expertises as $expertise)
                    @if(isset($request->get("expertises")[$expertise->id]))
                        <x-filterSelector name="Expertises[{{ $expertise->id }}]" checked="true">
                            {{ $expertise->name }}
                        </x-filterSelector>
                    @else
                        <x-filterSelector name="Expertises[{{ $expertise->id }}]" checked="false">
                            {{ $expertise->name }}
                        </x-filterSelector>
                    @endif
                @endforeach
            </x-filterModal>
        </div>
        <div class="flex-grow mb-4 overflow-x-hidden overflow-y-scroll scrollbar-hide">
            <div class="grid gap-4 md:gap-6 xl:gap-8 grid-cols-2 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach($employees as $employee)
                    <x-profilecard userHref="/profile/{{ $employee->username }}" :employee="$employee"></x-profilecard>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
