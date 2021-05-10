<x-layout>
    <div class="bg-white">
        <div class="container w-screen py-5 md:py-12 md:pr-36 px-10">
            <div class="min-h-screen md:flex no-wrap md:-mx-2" x-data="{ tab: 'account' }">
                <!-- Left Side -->
                <div class="w-full md:w-3/12">
                    <!-- Side navbar -->
                    <ul class="h-full mb-12 text-gray-600 hover:text-gray-700">
                        <x-sidenavlink tab="account">Account</x-sidenavlink>
                        <x-sidenavlink tab="department">Afdeling</x-sidenavlink>
                        <x-sidenavlink tab="workday">Werkdagen</x-sidenavlink>
                        <x-sidenavlink tab="term">Blokken</x-sidenavlink>
                    </ul>
                    <!-- End of Side navbar -->
                </div>
                <!-- Right Side -->

                <!-- Profile Tab -->
                <form class="w-full overflow-y-auto md:w-9/12 md:mx-2" method="POST"
                      action="{{route('employee.update', $employee)}}">
                    @csrf
                    <input name="_method" type="hidden" value="PUT">

                    <div
                        class="flex flex-col justify-center md:flex-row md:justify-start md:items-center md:space-x-2 font-semibold text-gray-900 leading-8 mb-12 md:flex-shrink-0">

                        @if (empty($employee->user->photoUrl))
                            <img src="https://www.shareicon.net/data/128x128/2016/07/26/801997_user_512x512.png"
                                 class="w-48 md:w-auto md:flex-shrink-0 min-h-full max-h-full m-auto md:m-0">
                        @else
                            <img src="{{$employee->user->photoUrl}}" class="md:flex-shrink-0 min-h-full max-h-full">
                        @endif
                        <p class="text-center md:text-left md:text-5xl sm:text-3xl ">{{$employee->firstname}} {{$employee->lastname}} </p>
                    </div>

                    <div x-show="tab === 'account'">

                        <div class="text-gray-700">
                            <div class="grid md:grid-cols-2 text-sm">
                                <div class="mb-5 md:pr-5">
                                    @error('firstname')
                                    <x-input value="{{$employee->firstname}}" error="{{$message}}" type="text"
                                             name="firstname" id="firstname" icon="fas fa-user-circle">Voornaam:
                                    </x-input>
                                    @else
                                        <x-input value="{{$employee->firstname}}" type="text" name="firstname"
                                                 id="firstname" icon="fas fa-user-circle">Voornaam:
                                        </x-input>
                                        @enderror
                                </div>
                                <div class="mb-5 md:pr-5">
                                    @error('lastname')
                                    <x-input value="{{$employee->lastname}}" error="{{$message}}" type="text"
                                             name="lastname" id="lastname" icon="fas fa-user-circle">Achternaam:
                                    </x-input>
                                    @else
                                        <x-input value="{{$employee->lastname}}" type="text" name="lastname"
                                                 id="lastname" icon="fas fa-user-circle">Achternaam:
                                        </x-input>
                                        @enderror
                                </div>
                                <div class="mb-5 md:pr-5">
                                    @error('email')
                                    <x-input value="{{$employee->user->email}}" error="{{$message}}" type="text"
                                             name="email" id="email" icon="fas fa-user-circle">Email:
                                    </x-input>
                                    @else
                                        <x-input value="{{$employee->user->email}}" type="text" name="email" id="email"
                                                 icon="fas fa-user-circle">Email:
                                        </x-input>
                                        @enderror
                                </div>
                                <div class="mb-5 md:pr-5">
                                    @error('phoneNumber')
                                    <x-input value="{{$employee->phoneNumber}}" error="{{$message}}" type="text"
                                             name="phoneNumber" id="phoneNumber" icon="fas fa-user-circle">
                                        Telefoonnummer:
                                    </x-input>
                                    @else
                                        <x-input value="{{$employee->phoneNumber}}" type="text" name="phoneNumber"
                                                 id="phoneNumber" icon="fas fa-user-circle">Telefoonnummer:
                                        </x-input>
                                        @enderror
                                </div>
                                <div class="mb-5 md:pr-5">
                                    @error('linkedInUrl')
                                    <x-input value="{{$employee->linkedInUrl}}" error="{{$message}}" type="text"
                                             name="linkedInUrl" id="linkedInUrl" icon="fas fa-user-circle">LinkedIn url:
                                    </x-input>
                                    @else
                                        <x-input value="{{$employee->linkedInUrl}}" type="text" name="linkedInUrl"
                                                 id="linkedInUrl" icon="fas fa-user-circle">LinkedIn url:
                                        </x-input>
                                        @enderror
                                </div>
                            </div>
                        </div>

                    </div>

                    <div x-show="tab === 'afdeling'">

                        <h2 class="font-bold md:text-5xl mb-5">Afdeling en rol</h2>
                        <div class="grid md:grid-cols-1">
                            <div class="mb-5 md:pr-5">
                                <label
                                    class="mb-1.5 pl-1.5 py-0.5 float-left text-left text-white w-6/12 bg-red-700 rounded">Wijzig
                                    de afdeling:</label>
                                <div class="h-32 mt-10 overflow-scroll border-b-2 max-w-md">
                                    @error('departments')
                                    <x-alert class="mt-16 pt-16"></x-alert>
                                    @enderror
                                    @foreach($departments as $department)
                                        <div>
                                            <input @if ($employee->departments->contains($department->id)) checked
                                                   @endif value="{{$department->id}}" name="departments[]"
                                                   type="checkbox">
                                            <label>{{$department->name}}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="mb-5 md:pr-5">
                                <label
                                    class="mb-1.5 pl-1.5 py-0.5 float-left text-left text-white w-6/12 bg-red-700 rounded">Wijzig
                                    rol:</label>
                                <div class="h-32 mt-10 overflow-scroll border-b-2 max-w-md">
                                    @error('roles')
                                    <x-alert class="mt-16 pt-16"></x-alert>
                                    @enderror
                                    @foreach($roles as $role)
                                        <div>
                                            <input @if ($employee->user->roles->contains($role->id)) checked
                                                   @endif value="{{$role->id}}" name="roles[]" type="checkbox">
                                            <label>{{$role->name}}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>

                    <div x-show="tab === 'Werkdagen'">

                        <h2 class="font-bold md:text-5xl mb-5">Werkdagen</h2>
                        <label class="mb-1.5 pl-1.5 py-0.5 text-left text-white md:w-6/12 bg-red-700 rounded block">Selecteer
                            werkzame dagen:</label>
                        <div class="w-full">
                            <div class="flex justify-between md:w-2/3 xl:w-1/2 mb-6 col-span-2 xl:col-span-3">
                                @foreach($workDays as $day)
                                    @if($employee->workDays->contains($day))
                                        <x-dayToggle :day="$day" :selected="true"></x-dayToggle>
                                    @else
                                        <x-dayToggle :day="$day"></x-dayToggle>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                    </div>

                    <div x-show="tab === 'overig'">

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
                    </div>

                </form>
                <!-- End of profile tab -->
            </div>
        </div>
    </div>
    </div>
    <script
        type="javascript">document.getElementsByClassName('w-7/12 border-red-700 border-4 rounded focus:bg-white focus:text-black')[0].click()</script>
</x-layout>
