<div class="mb-8">
    <x-input.label id="{{$id}}">{{$slot}}</x-input.label>

    @if(isset($error))
        <p class="relative mb-3 bg-red-200 relative text-red-500 py-3 px-3 rounded-lg clear-both">
            {{$error}}
        </p>
    @endif

    <div class="relative clear-both">
        <i class="absolute pl-3 top-4 text-gray-600 {{ $icon }}"></i>
        <input
            id="{{$id}}"
            placeholder="{{$slot}}..."
            {{$attributes->class(['text-xs sm:text-sm md:text-base lg:text-lg px-2.5 py-2.5 pl-8 w-full rounded border-gray-400 focus:border-gray-400 text-gray-600 focus:ring-0'])}}
        />
    </div>
</div>
