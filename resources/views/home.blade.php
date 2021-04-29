<x-layout>
    <div class="h-12"></div>
    <div class="sm:flex sm:h-screen sm:overflow-hidden mb-2 mx-3 sm:mx-4 md:mx-5">
        <div class="sm:w-1/3 xl:w-1/4 mr-0 sm:mr-3 sm:overflow-y-scroll scrollbar-hide">
            <x-filterModal title="Hobbies">
                @foreach($hobbies as $hobby)
                    <x-filterSelector name="{{ $hobby->name }}">{{ $hobby->name }}</x-filterSelector>
                @endforeach
            </x-filterModal>
            <x-filterModal title="Lectorates">
                @foreach($lectorates as $lectorate)
                    <x-filterSelector name="{{ $lectorate->name }}">{{ $lectorate->name }}</x-filterSelector>
                @endforeach
            </x-filterModal>
            <x-filterModal title="Minors">
                @foreach($minors as $minor)
                    <x-filterSelector name="{{ $minor->name }}">{{ $minor->name }}</x-filterSelector>
                @endforeach
            </x-filterModal>
            <x-filterModal title="Expertises">
                @foreach($expertises as $expertise)
                    <x-filterSelector name="{{ $expertise->name }}">{{ $expertise->name }}</x-filterSelector>
                @endforeach
            </x-filterModal>
            <x-filterModal title="Roles">
                @foreach($roles as $role)
                    <x-filterSelector name="{{ $role->name }}">{{ $role->name }}</x-filterSelector>
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
