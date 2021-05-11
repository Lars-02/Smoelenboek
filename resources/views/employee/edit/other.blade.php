<h2 class="font-bold md:text-5xl mb-5">Overige zaken</h2>
<div class="grid md:grid-cols-2">
    <div class="mb-5 md:pr-5">
        <label
            class="mb-1.5 pl-1.5 py-0.5 float-left text-left text-white w-6/12 bg-red-700 rounded">Lectoraten:</label>
        <div class="h-32 mt-10 overflow-scroll border-b-2">
            @foreach ($errors->get('lectorates.*') as $message)
                <div class="error">{{ $message }}</div>
            @endforeach
            @foreach($lectorates as $lectorate)
                <div>
                    <input @if ($employee->lectorates->contains($lectorate->id)) checked
                           @endif value="{{$lectorate->id}}" name="lectorates[]"
                           type="checkbox">
                    <label>{{$lectorate->name}}</label>
                </div>
            @endforeach
        </div>
    </div>
    <div class="mb-5 md:pr-5">
        <label
            class="mb-1.5 pl-1.5 py-0.5 float-left text-left text-white w-6/12 bg-red-700 rounded">Hobby's:</label>
        <div class="h-32 mt-10 overflow-scroll border-b-2">
            @foreach ($errors->get('hobbies.*') as $message)
                <div class="error">{{ $message }}</div>
            @endforeach
            @foreach($hobbies as $hobby)
                <div>
                    <input @if ($employee->hobbies->contains($hobby->id)) checked
                           @endif value="{{$hobby->id}}" name="hobbies[]" type="checkbox">
                    <label>{{$hobby->name}}</label>
                </div>
            @endforeach
        </div>
    </div>
    <div class="mb-5 md:pr-5">
        <label
            class="mb-1.5 pl-1.5 py-0.5 float-left text-left text-white w-6/12 bg-red-700 rounded">Cursussen:</label>
        <div class="h-32 mt-10 overflow-scroll border-b-2">
            @foreach ($errors->get('courses.*') as $message)
                <div class="error">{{ $message }}</div>
            @endforeach
            @foreach($courses as $course)
                <div>
                    <input @if ($employee->courses->contains($course->id)) checked
                           @endif value="{{$course->id}}" name="courses[]" type="checkbox">
                    <label>{{$course->name}}</label>
                </div>
            @endforeach
        </div>
    </div>
    <div class="mb-5 md:pr-5">
        <label
            class="mb-1.5 pl-1.5 py-0.5 float-left text-left text-white w-6/12 bg-red-700 rounded">Leerlijnen:</label>
        <div class="h-32 mt-10 overflow-scroll border-b-2">
            @foreach ($errors->get('learningLines.*') as $message)
                <div class="error">{{ $message }}</div>
            @endforeach
            @foreach($learningLines as $learningLine)
                <div>
                    <input @if ($employee->learningLines->contains($learningLine->id)) checked
                           @endif value="{{$learningLine->id}}" name="learningLines[]"
                           type="checkbox">
                    <label>{{$learningLine->name}}</label>
                </div>
            @endforeach
        </div>
    </div>
    <div class="mb-5 md:pr-5">
        <label
            class="mb-1.5 pl-1.5 py-0.5 float-left text-left text-white w-6/12 bg-red-700 rounded">Expertises:</label>
        <div class="h-32 mt-10 overflow-scroll border-b-2">
            @foreach ($errors->get('expertises.*') as $message)
                <div class="error">{{ $message }}</div>
            @endforeach
            @foreach($expertises as $expertise)
                <div>
                    <input @if ($employee->expertises->contains($expertise->id)) checked
                           @endif value="{{$expertise->id}}" name="expertises[]"
                           type="checkbox">
                    <label>{{$expertise->name}}</label>
                </div>
            @endforeach
        </div>
    </div>
    <div class="mb-5 md:pr-5">
        <label
            class="mb-1.5 pl-1.5 py-0.5 float-left text-left text-white w-6/12 bg-red-700 rounded">Minoren:</label>
        <div class="h-32 mt-10 overflow-scroll border-b-2">
            @foreach ($errors->get('minors.*') as $message)
                <div class="error">{{ $message }}</div>
            @endforeach
            @foreach($minors as $minor)
                <div>
                    <input @if ($employee->minors->contains($minor->id)) checked
                           @endif value="{{$minor->id}}" name="minors[]" type="checkbox">
                    <label>{{$minor->name}}</label>
                </div>
            @endforeach
        </div>
    </div>
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
        <x-button>
            <a href="{{ route('employee.show', ['employee' => $employee]) }}">Annuleren</a>
        </x-button>
    </div>
