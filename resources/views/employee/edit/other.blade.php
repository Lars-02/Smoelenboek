<h2 class="font-bold md:text-5xl mb-5">Overige zaken</h2>
<div class="grid md:grid-cols-2">
    <x-checkbox id="lectorates" :options="$lectorates">Lectoraten</x-checkbox>

    <x-checkbox id="hobbies" :options="$hobbies">Hobbies</x-checkbox>

    <x-checkbox id="courses" :options="$courses">Vakken</x-checkbox>

    <x-checkbox id="learningLines" :options="$learningLines">Leerlijnen</x-checkbox>

    <x-checkbox id="expertises" :options="$expertises">Expertises</x-checkbox>

    <x-checkbox id="minors" :options="$minors">Minoren</x-checkbox>
</div>

