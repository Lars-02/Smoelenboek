<div class="mb-8">
    @if(isset($slot))
        <label class="text-xs sm:text-sm md:text-base lg:text-lg mb-1.5 pl-1.5 py-0.5 float-left text-left text-white w-2/3 bg-red-700 rounded font-medium" for="{{$id}}">{{$slot}}</label><br/>
    @endif
    <select
        id="{{$id}}"
        name="{{ $id }}"
        multiple
        {{$attributes->class(['text-xs sm:text-sm md:text-base lg:text-lg px-2.5 py-2.5 pl-4 w-full rounded border-gray-400 focus:border-gray-400 text-gray-600 focus:ring-0'])}}
    >
        <option disabled>Kies uw {{$slot}}</option>
            @foreach($options as $option)
                <option value="{{ $option }}">{{ $option }}</option>
            @endforeach
    </select>
</div>
