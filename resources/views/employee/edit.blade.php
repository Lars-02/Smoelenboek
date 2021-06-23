<x-layout>
    <div class="container mx-auto px-5 mb-5 w-full md:px-0 md:w-3/4">
        <div class="my-5 w-full bg-gray-200 rounded p-2">
            <x-button>
                <a href="{{ route('employee.show', $employee) }}">
                    Annuleren
                </a>
            </x-button>
            <div class="float-right">
                <x-button type="submit" form="edit-form">
                    Opslaan
                </x-button>
            </div>
            @if(auth()->user()->isAdmin())
                <div class="pr-2 float-right">
                    <x-modal
                        modalTitle="Account Verwijderen"
                        submitLabel="Verwijderen"
                        cancelLabel="Annuleren"
                        route="{{ route('employee.destroy', ['employee' => $employee]) }}"
                        method="DELETE"
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
        <form id="edit-form" method="POST" action="{{route('employee.update', $employee)}}">
            @csrf
            @method('PUT')
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
        <div class="my-5 w-full bg-gray-200 rounded p-2">
            <x-button>
                <a href="{{ route('home') }}">
                    Annuleren
                </a>
            </x-button>
            <div class="float-right">
                <x-button type="submit" form="edit-form">
                    Opslaan
                </x-button>
            </div>
            @if(auth()->user()->isAdmin())
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
            <div class="content-center flex items-center justify-center flex-grow overflow-x-hidden scrollbar-hide rounded-md">
                <div class="text-xl grid gap-4 content-center flex items-center justify-center md:gap-6 xl:gap-8 grid-cols-1">
                    Log uit om uw wachtwoord te wijzigen.
                </div>
            </div>
        </div>
    </div>
</x-layout>
