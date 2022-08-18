<div class="cursor-pointer bg-red-700 rounded-md shadow-lg mb-4 py-3 px-6" x-data="{ open: false }">
    <div class="select-none text-white text-xl md:text2xl lg:text-3xl"  @click="open = !open">
        <div class="grid grid-cols-2 w-full">
            {{ $title }}
            <svg
                class="fill-current h-7 w-7 transform group-hover:-rotate-180
            transition duration-150 ease-in-out self-end place-self-end"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
            >
                <path
                    d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                />
            </svg>
        </div>
    </div>
    <div x-show.transition.duration.300ms="open">
        <div class="h-2 w-full bg-white rounded-full my-2"  @click="open = !open"></div>
        {{ $slot }}
    </div>
</div>
