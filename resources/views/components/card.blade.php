            bg-white rounded-lg border-4 border-red-700 shadow-md my-10">
<div class="grid justify-items-center pt-5">
    <div class="max-w-xs rounded overflow-hidden shadow-lg border-4 border-red-700 my-2 bg-white max-w-3xl ">
        <div class="px-6 py-4 items-center">
            <div class="font-bold text-xl mb-2">{{$title}}</div>
            <div class="h-2.5 w-6/12 bg-red-700 rounded-full"></div>
            <p class=" ">
                {{ $slot }}
            </p>
        </div>
    </div>
</div>

