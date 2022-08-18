<div class="mb-8 select-none">
    <label class="select-none text-xs sm:text-sm md:text-base lg:text-lg mb-1.5 pl-1.5 py-0.5 float-left text-left text-white w-2/3 bg-red-700 rounded font-medium">{{$slot}}</label>
    <select id="{{$id}}" name="{{$id}}[]" multiple {{$attributes->class(['select-text relative text-xs sm:text-sm md:text-base lg:text-lg p-2.5 pl-8 w-full rounded border-gray-400 focus:border-gray-400 text-gray-600 focus:ring-0'])}}>
        <option disabled></option>
        @foreach($options as $option => $value)
            <option value="{{ $option }}"
                    @isset($oldvals) @if ($oldvals->contains($value)) selected @endif @endisset
                    @if (old($id) !== null)
                        @foreach(old($id) as $val)
                            @if($val == $option)
                                selected
                            @endif
                        @endforeach
                    @endif>
                {{ $value }}</option>
        @endforeach
    </select>
    @error($id)
    <span class="text-red-600">{{ $message }}</span>
    @enderror
    <script type="text/javascript">
        $(document).ready(function() {
            $('#{{$id}}').select2({
                width: '100%',
                placeholder: 'Kies uw {{$slot}}'
            });
        });
    </script>
</div>
