<div class="mb-8">
    <x-input.label id="{{$id}}">{{$slot}}</x-input.label>

    @if(isset($error))
        <p class="relative mb-3 bg-red-200 relative text-red-500 py-3 px-3 rounded-lg clear-both">
            {{$error}}
        </p>
    @endif

    <select
        id="{{$id}}"
        name="{{$id}}[]"
        multiple
        {{$attributes->class(['text-xs sm:text-sm md:text-base lg:text-lg px-2.5 py-2.5 pl-4 w-full rounded border-gray-400 focus:border-gray-400 text-gray-600 focus:ring-0'])}}
    >
        <option disabled>Kies uw {{$slot}}</option>
        @foreach($options as $option => $value)
            <option
                value="{{ $option }}"
            >{{ $value }}</option>
        @endforeach
    </select>
</div>
