<x-layout>
    <div class="container mx-auto px-5 mb-5 w-full md:px-0 md:w-3/4">
        <div class="my-5 w-full bg-gray-200 rounded p-2">
            <x-button>
                <a href="{{ url()->previous() }}">
                    Terug
                </a>
            </x-button>
            <div class="float-right">
                @if(auth()->user()->isAdmin() || $employee->user->id == auth()->user()->id)
                    <a href="{{ route('employee.edit', ['employee' => $employee]) }}">
                        <x-button>
                            Aanpassen
                        </x-button>
                    </a>
                @endif
            </div>
        </div>

        @if(session()->has('error'))
            <div class="alert alert-danger">
                <h1 class="text-center p-2 text-white font-bold bg-red-700">{{ session()->get('error') }}</h1>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-x-3">
            @include('employee.show.account')
            @include('employee.show.other')
        </div>
    </div>
</x-layout>
