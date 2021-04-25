<x-layout>
    <div class="h-12"></div>
    <div class="sm:flex sm:h-screen sm:overflow-hidden mb-2 mx-3 sm:mx-4 md:mx-5">
        <div class="sm:w-1/3 xl:w-1/4 mr-0 sm:mr-3 sm:overflow-y-scroll scrollbar-hide">

            <div class="sticky top-0">
                <div class="mb-8">
                    <span class="absolute pl-3 pt-3 text-gray-600">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text" name="searchbar" id="searchbar" placeholder="Zoeken..." class="text-xs sm:text-sm md:text-base lg:text-lg px-2.5 py-2.5 pl-8 w-full rounded border-gray-400 focus:border-gray-400 text-gray-600 focus:ring-0"/>
                </div>
                <!-- buttons kunnen hier geplaatst worden -->
            </div>

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
        <div class="flex-grow mb-4 overflow-x-hidden overflow-y-scroll scrollbar-hide">
            <div class="grid gap-4 md:gap-6 xl:gap-8 grid-cols-2 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach($employees as $employee)
                    <x-profilecard :employee="$employee"></x-profilecard>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
