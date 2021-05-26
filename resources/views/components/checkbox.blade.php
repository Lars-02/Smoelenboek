<div class="select-none mb-8">
    <label
        class="select-none text-xs sm:text-sm md:text-base lg:text-lg mb-1.5 pl-1.5 py-0.5 float-left text-left text-white w-2/3 bg-red-700 rounded font-medium">{{$slot}}</label>
    <div class="h-32 mt-10 overflow-y-scroll overflow-x-hidden border-b-2">
        @foreach($options as $option => $value)
            <div>
                <input @isset($employee) @if ($employee->$options->contains($value->id)) checked @endif @endisset
                value="{{ $option }}"
                       @if (old($id) !== null)
                       @foreach(old($id) as $val)
                       @if($val == $option)
                       checked
                       @endif
                       @endforeach
                       @endif
                       type="checkbox" name="{{$id}}[]">
                <label>{{$value}}</label>
            </div>
        @endforeach
    </div>
    @error($id)
    <span class="text-red-600">{{ $message }}</span>
    @enderror
</div>
