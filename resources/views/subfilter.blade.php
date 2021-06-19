<x-layout>
    <div class="grid gap-4 md:gap-6 xl:gap-8 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5">
        <x-subfiltercard title="courses" :options="$courses"></x-subfiltercard>
        <x-subfiltercard title="departments" :options="$departments"></x-subfiltercard>
        <x-subfiltercard title="expertises" :options="$expertises"></x-subfiltercard>
        <x-subfiltercard title="hobbies" :options="$hobbies"></x-subfiltercard>
        <x-subfiltercard title="learningLines" :options="$learningLines"></x-subfiltercard>
        <x-subfiltercard title="lectorates" :options="$lectorates"></x-subfiltercard>
        <x-subfiltercard title="minors" :options="$minors"></x-subfiltercard>
        <x-subfiltercard title="roles" :options="$roles"></x-subfiltercard>
        <x-subfiltercard title="workDays" :options="$workDays"></x-subfiltercard>
</x-layout>
