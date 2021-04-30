<div class="grid justify-items-center py-5">
    <div class="w-11/12 sm:w-5/6 md:w-3/4 lg:w-2/3 xl:w-1/2 shadow rounded-md bg-white ">
        <div class="py-4 px-6 items-center">
            <div class="text-lg sm:text-xl md:text-2xl mb-2 font-medium text-center sm:text-left">
                {{$title}}
            </div>
            <div class="h-2 w-full sm:w-6/12 bg-red-700 rounded-full"></div>
            <div class="pt-5 px-4 sm:px-8 md:px-12 lg:px-16 xl:px-20">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
