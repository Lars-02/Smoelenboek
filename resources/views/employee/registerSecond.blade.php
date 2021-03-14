<x-layout>
    <div>
        <h1 class="text-5xl pl-10 pt-3 pb-2">Gegevens invullen</h1>
        <div class="bg-red-600 w-7/12 h-3 rounded-2xl"></div>
    </div>
    <div  class="my-10">
        <form action="" class="md:w-1/2 md:ml-20 px-3 mb-6 md:mb-0">
            @csrf
            <x-select id="afdeling" :options="$afdeling">Afdeling</x-select>
            <x-select id="functie" :options="$functie">Functie</x-select>
            <x-select id="expertise" :options="$expertise">Expertise</x-select>
            <x-button>Terug</x-button>
            <x-button>Doorgaan</x-button>
        </form>
    </div>
</x-layout>
