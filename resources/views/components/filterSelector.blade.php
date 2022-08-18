<div
    x-data="{ checked: {{ $checked }} }"
    @click="checked = !checked"
    class="text-white text-sm sm:text-md md:text-lg lg:text-xl cursor-pointer select-none">
    <div class="flex">
        <i class="mt-1 far fa-square" x-show="!checked"></i>
        <i class="mt-1 fas fa-check-square" x-show="checked"></i>
        <input name="{{ $name }}" type="checkbox" x-bind:checked="checked" class="hidden"/>
        <div class="ml-2 break-normal">{{ $slot }}</div>
    </div>
</div>
