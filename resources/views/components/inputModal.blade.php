<div id="popUp" class="absolute fixed transform" x-show="open" @click.away="open = false">
    <div class="p-5 bg-white border-2 border-black rounded-md"> 
        <form method="POST" action="{{ $route }}">
            <span class="m:text-sm md:text-base lg:text-lg">
                <x-input
                icon="fas fa-filter"
                id={{$slot}}
                name={{$slot}}
                value="{{$slot}}"
            >{{$slot}}
            </x-input>
            </span>
            <x-button id="opslaanbutton" type="submit" @click="open = false">Opslaan</x-button>
            <x-button id="annulerenbutton" @click="open = false">Annuleren</x-button>
        </form>
    </div>
</div>
