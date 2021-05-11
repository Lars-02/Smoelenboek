<div x-data="{ selected: {{$selected ?? 'false'}} }"  @click="selected = !selected" class="text-xs sm:text-sm md:text-base lg:text-lg font-bold shadow rounded select-none">
    <div x-show="selected" class="text-red-700 shadow-inner px-4 py-2">{{substr($day->name, 0, 2)}}</div>
    <div x-show="!selected" class="px-4 py-2">{{substr($day->name, 0, 2)}}</div>
    <input name="workDays[]" value="{{ $day->id }}" type="checkbox" x-bind:checked="selected" class="hidden"/>
</div>
