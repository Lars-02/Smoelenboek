<h2 class="font-bold md:text-5xl mb-5">Overige zaken</h2>
<div class="grid md:grid-cols-2">
    <x-checkbox id="lectorates" :options="$lectorates">Lectoraten</x-checkbox>

    <x-checkbox id="hobbies" :options="$hobbies">Hobbies</x-checkbox>

    <x-checkbox id="courses" :options="$courses">Cursussen</x-checkbox>

    <x-checkbox id="learningLines" :options="$learningLines">Leerlijnen</x-checkbox>

    <x-checkbox id="expertises" :options="$expertises">Expertises</x-checkbox>

    <x-checkbox id="minors" :options="$minors">Minoren</x-checkbox>
</div>

</div>

<div class="pt-6">
    @if($employee->user->isAdmin())
        <div class="inline-block">
            <x-modal
                modalTitle="Account Verwijderen"
                submitLabel="Verwijderen"
                cancelLabel="Annuleren"
                route="{{ route('home') }}"
                method="GET"
                icon="fas fa-trash">
                <x-slot name="trigger">
                    <x-button>
                        Account verwijderen
                    </x-button>
                </x-slot>
                <div>
                    Weet u zeker dat u het account
                    van {{$employee->firstname}} {{$employee->lastname}} wil verwijderen?
                </div>
            </x-modal>
        </div>
    @endif
    <div class="float-right">
        <x-button type="submit">
            Opslaan
        </x-button>
        <a href="{{ route('employee.show', ['employee' => $employee]) }}">
            <x-button>
                Annuleren
            </x-button>
        </a>
    </div>
