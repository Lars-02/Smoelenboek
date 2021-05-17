<div class="select-none mb-8">
    <x-input.label id="{{$id}}">{{$slot}}</x-input.label>

        <div class="flex flex-wrap items-stretch w-full mb-4 relative h-15 bg-white items-center rounded mb-6 pr-10">
            <div class="flex -mr-px justify-center w-15">
              <span
                  class="flex items-center leading-normal bg-white px-3 border-0 rounded rounded-r-none text-gray-600"
              >
                <i class="select-none text-gray-600 {{ $icon }}"></i>
              </span>
            </div>
            <input
            {{$attributes->class(['select-text flex-shrink flex-grow flex-auto leading-normal w-px flex-1 border-gray-400 h-10 border-grey-light rounded px-3 self-center relative text-xs sm:text-sm md:text-base lg:text-lg focus:border-gray-400 text-gray-600 focus:ring-0'])}}
            id="{{$id}}"--}}
                placeholder="{{$slot}}..."
            />
        </div>
</div>
