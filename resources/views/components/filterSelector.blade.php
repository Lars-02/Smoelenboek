<div
    x-data="{ checked: false }"
    @click="checked = !checked"
    class="text-white text-sm sm:text-md md:text-lg lg:text-xl cursor-pointer select-none truncate">
    <i class="far fa-square" x-show="!checked"></i>
    <i class="fas fa-check-square" x-show="checked"></i>
    {{ $slot }}
    <input name="{{ $name }}" type="checkbox" x-bind:checked="checked" class="hidden"/>
</div>
