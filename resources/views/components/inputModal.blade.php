<div id="popUp" class="absolute fixed transform" x-show="open" @click.away="open = false">
    <div class="p-5 bg-white border-2 border-black rounded-md"> 
        <form method="POST" action="{{ $route }}">
            @csrf
            <span class="m:text-sm md:text-base lg:text-lg">
                {{-- <x-input
                icon="fas fa-filter"
                id={{$slot}}
                name="name"
                value="{{$slot}}"
            >{{$slot}}
            </x-input> --}}

            <div class="select-none mb-2">
                <x-input.label id="{{$slot}}">{{$slot}}</x-input.label>
                <div class="relative">
                    <input
                        id="{{$slot}}"
                        placeholder="{{$slot}}..."
                        {{$attributes->class(['select-text relative text-xs sm:text-sm md:text-base lg:text-lg px-2.5 py-2.5 pl-8 w-full rounded border-gray-400  border-2 focus:border-gray-400 text-gray-600 focus:ring-0'])}}
                        value="{{$slot}}"
                    />
                    <i class="select-none absolute left-3 bottom-3 sm:bottom-4 text-gray-600 fas fa-filter"></i>
                </div>
            </div>
            
            </span>
            <x-button id="opslaanbutton" type="submit" @click="open = false">Opslaan</x-button>
            <x-button id="annulerenbutton" @click="open = false">Annuleren</x-button>
        </form>
    </div>
</div>
