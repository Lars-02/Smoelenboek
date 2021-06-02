<x-layout>
    <div class="container mx-auto px-5 mb-5 w-full md:px-0 md:w-3/4">
        <form method="POST"
              action="{{route('employee.update', $employee)}}">
            @csrf
            <input name="_method" type="hidden" value="PUT">
        <div class="my-5 w-full bg-gray-200 rounded p-2">
            <x-button>
                <a href="{{ url()->previous() }}">
                    Terug
                </a>
            </x-button>
            <div class="float-right">
                <x-button type="submit">
                    Opslaan
                </x-button>
            </div>
            @if($employee->user->isAdmin())
                <div class="pr-2 float-right">
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
        </div>
                <!-- Right Side -->

                <!-- Profile Tab -->
                <form class="w-full overflow-y-auto md:w-9/12 md:mx-2" method="POST" enctype="multipart/form-data"
                      action="{{route('employee.update', $employee)}}">
                    @csrf
                    <input name="_method" type="hidden" value="PUT">
                    <div
                        class="flex flex-col justify-center md:flex-row md:justify-start md:items-center md:space-x-2 font-semibold text-gray-900 leading-8 mb-12 md:flex-shrink-0">

                        @if (empty($employee->user->photoUrl))
                            <img src="https://www.shareicon.net/data/128x128/2016/07/26/801997_user_512x512.png"
                                 class="w-48 md:w-auto md:flex-shrink-0 min-h-full max-h-full m-auto md:m-0">
                        @else
                            <img src="{{asset('storage/' . $employee->user->photoUrl)}}" class="w-40">
                        @endif

                            <input class="form-control-file" name="photoUrl" type="file">
                        <p class="text-center md:text-left md:text-5xl sm:text-3xl select-all">{{$employee->firstname}} {{$employee->lastname}} </p>
                    </div>


                    <div x-show="tab === 'account'">
                        @include('employee.edit.account')
                    </div>
                    <div x-show="tab === 'department'">
                        @include('employee.edit.department')
                    </div>
                    <div x-show="tab === 'workDay'">
                        @include('employee.edit.workDay')
                    </div>
                    <div x-show="tab === 'other'">
                        @include('employee.edit.other')
                    </div>

        @if(session()->has('error'))
            <div class="alert alert-danger">
                <h1 class="text-center p-2 text-white font-bold bg-red-700">{{ session()->get('error') }}</h1>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-x-3 gap-y-5">
            @include('employee.edit.account')
            @include('employee.edit.other')
        </div>
        </form>
    </div>
</x-layout>
