<x-layout>
    <div>
        <h1 class="text-5xl pl-10 pt-3 pb-2">Gegevens invullen</h1>
        <div class="bg-red-600 w-3/12 h-3 rounded-2xl"></div>
    </div>
    <div class="w-9/12 mt-40 pl-40 flex-col">
        <form>
            <label class="text-3xl bg-red-600 rounded-xl text-white w-full">Voornaam</label>
            <input value="Voornaam...">
            <label class="text-3xl bg-red-600 rounded-xl text-white w-full">Achternaam (incl. Tussenvoegsels)</label>
            <input value="Achternaam...">
            <label class="text-3xl bg-red-600 rounded-xl text-white w-full">Telefoonnummer</label>
            <input value="Telefoonnummer...">
            <button type="submit">Volgende</button>
        </form>
    </div>
</x-layout>
