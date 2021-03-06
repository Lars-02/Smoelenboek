<div class="mb-8">
    @if(isset($slot))
        <label class="mb-1.5 pl-1.5 py-0.5 float-left text-left text-white w-6/12 bg-red-700 rounded" for="{{$name}}">{{$slot}}</label><br/>
    @endif
    <div>
        <i class="absolute pl-3 pt-6 {{ $icon }}"></i>
        <input
            name="{{$name}}"
            placeholder="{{$slot}}..."
            {{isset($attributes) ? $attributes->merge(['class' => 'px-2.5 py-2.5 pl-8 w-full rounded']) : ''}}
        />
    </div>
</div>
