<div class="grid justify-items-center py-5">

    <div class="w-11/12 sm:max-w-3xl overflow-hidden sm:shadow-lg rounded border-2 border-gray-500 bg-white ">
        <div class="p-2.5 items-center">
            <div class="tracking-wide text-xl text-center sm:text-left">{{$title}}</div>
            <div class="h-2 w-full sm:w-6/12 bg-red-700 rounded-full"></div>
            <div class="px-5 sm:px-16">
                {{ $slot }}
            </div>
        </div>
    </div>

</div>

