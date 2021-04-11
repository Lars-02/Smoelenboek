<div class="bg-red-700 rounded-md shadow-lg mb-4 py-3 px-6" x-data="{ open: false }">
    <div class="text-white text-xl md:text2xl lg:text-3xl"  @click="open = !open">
        {{ $title }}
    </div>
    <div x-show.transition.duration.300ms="open">
        <div class="h-2 w-full bg-white rounded-full my-2"  @click="open = !open"></div>
        {{ $slot }}
    </div>
</div>
