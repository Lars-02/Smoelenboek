<x-layout>
    <div class="grid gap-4 md:gap-6 xl:gap-8 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        <x-subfiltercard filter="Cursussen" title="courses" :options="$courses"></x-subfiltercard>
        <x-subfiltercard filter="Afdelingen" title="departments" :options="$departments"></x-subfiltercard>
        <x-subfiltercard filter="Expertises" title="expertises" :options="$expertises"></x-subfiltercard>
        <x-subfiltercard filter="Hobby's" title="hobbies" :options="$hobbies"></x-subfiltercard>
        <x-subfiltercard filter="Leerlijnen" title="learningLines" :options="$learningLines"></x-subfiltercard>
        <x-subfiltercard filter="Lectoraten" title="lectorates" :options="$lectorates"></x-subfiltercard>
        <x-subfiltercard filter="Minors" title="minors" :options="$minors"></x-subfiltercard>
        <x-subfiltercard filter="Rollen" title="roles" :options="$roles"></x-subfiltercard>
</x-layout>
