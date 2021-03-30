<x-layout>
    <div class="h-12"></div>
    <div class="flex h-screen overflow-hidden mb-2">
        <div class="w-1/3 ml-3 xl:w-1/4 overflow-y-scroll scrollbar-hide">
            <x-filterModal title="Filters 1">
                <x-filterSelector name="filter">Filter 1</x-filterSelector>
                <x-filterSelector name="filter">Filter 2</x-filterSelector>
                <x-filterSelector name="filter">Filter 3</x-filterSelector>
                <x-filterSelector name="filter">Filter 4</x-filterSelector>
                <x-filterSelector name="filter">Filter 5</x-filterSelector>
                <x-filterSelector name="filter">Filter 6</x-filterSelector>
            </x-filterModal>
            <x-filterModal title="Filters 2">
                <x-filterSelector name="filter">Filter 1</x-filterSelector>
                <x-filterSelector name="filter">Filter 2</x-filterSelector>
                <x-filterSelector name="filter">Filter 3</x-filterSelector>
                <x-filterSelector name="filter">Filter 4</x-filterSelector>
                <x-filterSelector name="filter">Filter 5</x-filterSelector>
                <x-filterSelector name="filter">Filter 6</x-filterSelector>
            </x-filterModal>
            <x-filterModal title="Filters 3">
                <x-filterSelector name="filter">Filter 1</x-filterSelector>
                <x-filterSelector name="filter">Filter 2</x-filterSelector>
                <x-filterSelector name="filter">Filter 3</x-filterSelector>
                <x-filterSelector name="filter">Filter 4</x-filterSelector>
                <x-filterSelector name="filter">Filter 5</x-filterSelector>
                <x-filterSelector name="filter">Filter 6</x-filterSelector>
            </x-filterModal>
        </div>
        <div class="flex-grow mx-4 mb-4 overflow-x-hidden overflow-y-scroll scrollbar-hide">
            <div class="grid gap-8 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach($employees as $employee)
                    <x-profilecard :employee="$employee"></x-profilecard>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
