<div class="mb-8">
    @if(isset($slot))
        <label class="text-xs sm:text-sm md:text-base lg:text-lg mb-1.5 pl-1.5 py-0.5 float-left text-left text-white w-2/3 bg-red-700 rounded font-medium" for="{{$id}}">{{$slot}}</label><br/>
    @endif
    <div>
        <i class="absolute pl-3 pt-4 text-gray-600 {{ $icon }}"></i>
        <input
            id="{{$id}}"
            placeholder="{{$slot}}..."
            {{$attributes->class(['text-xs sm:text-sm md:text-base lg:text-lg px-2.5 py-2.5 pl-8 w-full rounded border-gray-400 focus:border-gray-400 text-gray-600 focus:ring-0'])}}
        />
    </div>
</div>
