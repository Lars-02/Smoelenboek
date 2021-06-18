<div class="bg-white rounded lg:p-10 col-span-1 lg:col-span-2 lg:shadow bg-opacity-0 lg:bg-opacity-100">
    <ul class=" block mx-auto">
        <div class="float-right">
            <x-contextHelp>{{__('Vink aan voor de lectoraten die voor u van toepassing zijn, u kunt meerdere lectoraten selecteren.')}}</x-contextHelp>
        </div>
        <li class="grid md:grid-cols-1 bg-white rounded shadow-md p-5 mb-5">
            <x-checkbox id="lectorates" :options="$lectorates" :oldvals="$employee->lectorates->pluck('name', 'id')">Lectoraten</x-checkbox>
        </li>
        <div class="float-right">
            <x-contextHelp>{{__('Vink aan voor de hobbies die voor u van toepassing zijn, u kunt meerdere hobbies selecteren.')}}</x-contextHelp>
        </div>
        <li class="grid md:grid-cols-1 bg-white rounded shadow-md p-5 mb-5">
            <x-checkbox id="hobbies" :options="$hobbies" :oldvals="$employee->hobbies->pluck('name', 'id')">Hobbies</x-checkbox>
        </li>
        <div class="float-right">
            <x-contextHelp>{{__('Vink aan voor de cursussen die voor u van toepassing zijn, u kunt meerdere cursussen selecteren.')}}</x-contextHelp>
        </div>
        <li class="grid md:grid-cols-1 bg-white rounded shadow-md p-5 mb-5">
            <x-checkbox id="courses" :options="$courses" :oldvals="$employee->courses->pluck('name', 'id')">Cursussen</x-checkbox>
        </li>
        <div class="float-right">
            <x-contextHelp>{{__('Vink aan voor de expertises die voor u van toepassing zijn, u kunt meerdere expertises selecteren.')}}</x-contextHelp>
        </div>
        <li class="grid md:grid-cols-1 bg-white rounded shadow-md p-5 mb-5">
            <x-checkbox id="expertises" :options="$expertises" :oldvals="$employee->expertises->pluck('name', 'id')">Expertises</x-checkbox>
        </li>
        <div class="float-right">
            <x-contextHelp>{{__('Vink aan voor de leerlijnen die voor u van toepassing zijn, u kunt meerdere leerlijnen selecteren.')}}</x-contextHelp>
        </div>
        <li class="grid md:grid-cols-1 bg-white rounded shadow-md p-5 mb-5">
            <x-checkbox id="learningLines" :options="$learningLines" :oldvals="$employee->learningLines->pluck('name', 'id')">Leerlijnen</x-checkbox>
        </li>
        <div class="float-right">
            <x-contextHelp>{{__('Vink aan voor de minoren die voor u van toepassing zijn, u kunt meerdere minoren selecteren.')}}</x-contextHelp>
        </div>
        <li class="grid md:grid-cols-1 bg-white rounded shadow-md p-5">
            <x-checkbox id="minors" :options="$minors" :oldvals="$employee->minors->pluck('name', 'id')">Minoren</x-checkbox>
        </li>
    </ul>
</div>

