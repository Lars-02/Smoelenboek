<div class="mb-8">
    <x-input.label id="{{$id}}">{{$slot}}</x-input.label>
    <div>
        <i class="absolute pl-3 pt-4 text-gray-600 {{ $icon }}"></i>
        <input
            id="{{$id}}"
            placeholder="{{$slot}}..."
            {{$attributes->class(['relative text-xs sm:text-sm md:text-base lg:text-lg px-2.5 py-2.5 pl-8 w-full rounded border-gray-400 focus:border-gray-400 text-gray-600 focus:ring-0'])}}
        />
    </div>
</div>
