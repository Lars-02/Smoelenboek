<div class="select-none mb-8">
    <label class="select-none text-xs sm:text-sm md:text-base lg:text-lg mb-1.5 pl-1.5 py-0.5 float-left text-left text-white w-2/3 bg-red-700 rounded font-medium">{{$slot}}</label>
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
    @if(isset($error))
        <p class="relative mb-3 bg-red-200 relative text-red-500 py-3 px-3 rounded-lg clear-both">
            {{$error}}
        </p>
    @endif
</div>
