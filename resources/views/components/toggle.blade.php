@props(['name' => '', 'default' => 'false'])

<div x-data="{ selected: {{ $default }} }" class="my-3">
    <div class=" mb-3 pl-1.5 py-0.5 text-left text-white w-6/12 bg-red-700 rounded font-medium">{{$slot}}</div>
    <div dusk="select-admin" class="w-14 h-8 bg-gray-400 rounded-full shadow-inner flex content-center justify-end" x-show="!selected" @click="selected = !selected">
        <div class="w-6 h-6 bg-white m-1 self-center rounded-full shadow
                    transform -translate-x-6 transition-transform duration-300">
        </div>
    </div>

    <div class="w-14 h-8 bg-red-700 rounded-full shadow-inner flex content-center" x-show="selected" @click="selected = !selected">
        <div class="w-6 h-6 bg-white m-1 self-center rounded-full shadow
                    transform translate-x-6 transition-transform duration-300">
        </div>
    </div>

    <input name="{{ $name }}" type="checkbox" x-bind:checked="selected" class="hidden"/>
</div>
