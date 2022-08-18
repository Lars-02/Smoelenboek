<x-layout>
    @if ($message = Session::get('success'))
        <x-flash title="Succes" type="success">{{ $message }}</x-flash>
    @endif
    <div class="grid gap-4 md:gap-6 grid-cols-1 lg:grid-cols-2 2xl:grid-cols-3 m-4 md:m-6 xl:m-8">
        <x-subfiltercard filter="Cursussen" title="courses" :options="$courses"></x-subfiltercard>
        <x-subfiltercard filter="Afdelingen" title="departments" :options="$departments"></x-subfiltercard>
        <x-subfiltercard filter="Expertises" title="expertises" :options="$expertises"></x-subfiltercard>
        <x-subfiltercard filter="Hobby's" title="hobbies" :options="$hobbies"></x-subfiltercard>
        <x-subfiltercard filter="Leerlijnen" title="learningLines" :options="$learningLines"></x-subfiltercard>
        <x-subfiltercard filter="Lectoraten" title="lectorates" :options="$lectorates"></x-subfiltercard>
        <x-subfiltercard filter="Minors" title="minors" :options="$minors"></x-subfiltercard>
        <x-subfiltercard filter="Rollen" title="roles" :options="$roles"></x-subfiltercard>
    </div>
</x-layout>
