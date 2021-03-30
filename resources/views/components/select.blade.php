<div class="mb-8">
    @if(isset($slot))
        <label class="mb-1.5 pl-1.5 py-0.5 float-left text-left text-white w-6/12 bg-red-700 rounded" for="{{$id}}">{{$slot}}</label><br/>
    @endif
    <select
        id="{{$id}}"
        name="{{ $id }}"
        {{$attributes->class(['px-2.5 py-2.5 w-full rounded'])}}
    >
        <option selected disabled>Kies een {{$slot}}</option>
            @foreach($options as $option => $value)
                <option value="{{ $option }}">{{ $value }}</option>
            @endforeach
    </select>
</div>
