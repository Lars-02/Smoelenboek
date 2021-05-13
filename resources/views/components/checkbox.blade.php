<div class="mb-5 md:pr-5">
    <label class="mb-1.5 pl-1.5 py-0.5 float-left text-left text-white w-6/12 bg-red-700 rounded">{{$slot}}</label>
    <div class="h-32 mt-10 overflow-y-scroll overflow-x-hidden border-b-2">
        @foreach($options as $option => $value)
            <div>
            <input @isset($employee) @if ($employee->$options->contains($value->id)) checked
                    @endif @endisset
                value="{{ $option }}" type="checkbox" name="{{$id}}[]">
                <label>{{$value}}</label>
            </div>
        @endforeach
    </div>
</div>
