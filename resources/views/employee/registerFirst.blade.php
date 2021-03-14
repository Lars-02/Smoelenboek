<x-layout>
    <div>
        <h1 class="text-5xl pl-10 pt-3 pb-2">Gegevens invullen</h1>
        <div class="bg-red-600 w-7/12 h-3 rounded-2xl"></div>
    </div>
    <div class="my-10">
        <form action="" class=" md:w-1/2 md:ml-20 px-3 mb-6 md:mb-0">
            @csrf
            <x-input id="voornaam" type="text" icon="fas fa-user">Voornaam</x-input>
            <x-input id="achternaam" type="text" icon="fas fa-user">Achternaam (Incl. Tussenvoegsel)</x-input>
            <x-input id="telefoonnummer" type="text" icon="fas fa-phone-alt">Telefoonnummer</x-input>
            <x-button>Terug</x-button>
            <x-button>Doorgaan</x-button>
        </form>
    </div>
</x-layout>
