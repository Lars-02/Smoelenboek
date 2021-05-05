<div
    x-data="{ checked: {{ $checked }} }"
    @click="checked = !checked"
    class="text-white text-sm sm:text-md md:text-lg lg:text-xl cursor-pointer select-none break-words">
    <i class="far fa-square" x-show="!checked"></i>
    <i class="fas fa-check-square" x-show="checked"></i>
    <input name="{{ $name }}" type="checkbox" x-bind:checked="checked" class="hidden"/>
    {{ $slot }}
</div>
