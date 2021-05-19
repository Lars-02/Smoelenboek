<div class="select-none mb-8">
    <x-input.label id="{{$id}}">{{$slot}}</x-input.label>
    <div class="relative">
        <input
            id="{{$id}}"
            placeholder="{{$slot}}..."
            {{$attributes->class(['select-text relative text-xs sm:text-sm md:text-base lg:text-lg px-2.5 py-2.5 pl-8 w-full rounded border-gray-400 focus:border-gray-400 text-gray-600 focus:ring-0'])}}
        />
        <i class="select-none absolute left-3 bottom-3 sm:bottom-4 text-gray-600 {{ $icon }}"></i>
    </div>
    @if(isset($error))
        <p class="relative mb-3 bg-red-200 text-red-500 py-3 px-3 rounded-lg clear-both">
            {{$error}}
        </p>
    @endif
</div>
