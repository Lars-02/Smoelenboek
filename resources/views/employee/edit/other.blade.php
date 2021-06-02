<div class="bg-white rounded lg:p-10 col-span-1 lg:col-span-2 lg:shadow bg-opacity-0 lg:bg-opacity-100">
    <ul class=" block mx-auto">
        <li class="grid md:grid-cols-1 bg-white rounded shadow-md p-5 mb-5">
            <x-checkbox id="lectorates" :options="$lectorates" :oldvals="$employee->lectorates->pluck('name', 'id')">Lectoraten</x-checkbox>
        </li>
        <li class="grid md:grid-cols-1 bg-white rounded shadow-md p-5 mb-5">
            <x-checkbox id="hobbies" :options="$hobbies" :oldvals="$employee->hobbies->pluck('name', 'id')">Hobbies</x-checkbox>
        </li>
        <li class="grid md:grid-cols-1 bg-white rounded shadow-md p-5 mb-5">
            <x-checkbox id="courses" :options="$courses" :oldvals="$employee->courses->pluck('name', 'id')">Cursussen</x-checkbox>
        </li>
        <li class="grid md:grid-cols-1 bg-white rounded shadow-md p-5 mb-5">
            <x-checkbox id="expertises" :options="$expertises" :oldvals="$employee->expertises->pluck('name', 'id')">Expertises</x-checkbox>
        </li>
        <li class="grid md:grid-cols-1 bg-white rounded shadow-md p-5 mb-5">
            <x-checkbox id="learningLines" :options="$learningLines" :oldvals="$employee->learningLines->pluck('name', 'id')">Leerlijnen</x-checkbox>
        </li>
        <li class="grid md:grid-cols-1 bg-white rounded shadow-md p-5">
            <x-checkbox id="minors" :options="$minors" :oldvals="$employee->minors->pluck('name', 'id')">Minoren</x-checkbox>
        </li>
    </ul>
</div>


{{--<h2 class="font-bold md:text-5xl mb-5">Overige zaken</h2>--}}
{{--<div class="grid md:grid-cols-2">--}}
{{--    <x-checkbox id="lectorates" :options="$lectorates">Lectoraten</x-checkbox>--}}

{{--    <x-checkbox id="hobbies" :options="$hobbies">Hobbies</x-checkbox>--}}

{{--    <x-checkbox id="courses" :options="$courses">Cursussen</x-checkbox>--}}

{{--    <x-checkbox id="learningLines" :options="$learningLines">Leerlijnen</x-checkbox>--}}

{{--    <x-checkbox id="expertises" :options="$expertises">Expertises</x-checkbox>--}}

{{--    <x-checkbox id="minors" :options="$minors">Minoren</x-checkbox>--}}
{{--</div>--}}

{{--</div>--}}

{{--<div class="pt-6">--}}
{{--    @if($employee->user->isAdmin())--}}
{{--        <div class="inline-block">--}}
{{--            <x-modal--}}
{{--                modalTitle="Account Verwijderen"--}}
{{--                submitLabel="Verwijderen"--}}
{{--                cancelLabel="Annuleren"--}}
{{--                route="{{ route('home') }}"--}}
{{--                method="GET"--}}
{{--                icon="fas fa-trash">--}}
{{--                <x-slot name="trigger">--}}
{{--                    <x-button>--}}
{{--                        Account verwijderen--}}
{{--                    </x-button>--}}
{{--                </x-slot>--}}
{{--                <div>--}}
{{--                    Weet u zeker dat u het account--}}
{{--                    van {{$employee->firstname}} {{$employee->lastname}} wil verwijderen?--}}
{{--                </div>--}}
{{--            </x-modal>--}}
{{--        </div>--}}
{{--    @endif--}}
{{--    <div class="float-right">--}}
{{--        <x-button type="submit">--}}
{{--            Opslaan--}}
{{--        </x-button>--}}
{{--        <a href="{{ route('employee.show', ['employee' => $employee]) }}">--}}
{{--            <x-button>--}}
{{--                Annuleren--}}
{{--            </x-button>--}}
{{--        </a>--}}
{{--    </div>--}}
