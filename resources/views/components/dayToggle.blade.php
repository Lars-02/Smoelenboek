<div x-data="{ selected: false }"  @click="selected = !selected" class="text-xs sm:text-sm md:text-base lg:text-lg font-bold shadow rounded">
    <div x-show="selected" class="text-red-700 shadow-inner px-4 py-2">{{substr($slot, 0, 2)}}</div>
    <div x-show="!selected" class="px-4 py-2">{{substr($slot, 0, 2)}}</div>
    <input name="{{ $slot }}" type="checkbox" x-bind:checked="selected" class="hidden"/>
</div>
