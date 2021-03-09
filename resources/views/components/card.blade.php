@props(['title' => 'Card'])

<div class="grid place-items-center">
    <div class="w-11/12 p-12 sm:w-8/12 md:w-6/12
            px-6 py-10 sm:px-10 sm:py-6
            bg-white rounded-lg border-4 border-red-700 shadow-md my-10">
        <div class="w-1/2">
            <h2 class="font-semibold text-xl lg:text-2xl text-gray-600 mb-2">
                {{ $title }}
            </h2>
            <div class="h-2.5 bg-red-700 rounded-full"></div>
        </div>
        <div class="px-20 mt-8">
            {{ $slot }}
        </div>
    </div>
</div>
