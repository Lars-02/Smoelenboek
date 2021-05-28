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


{{--<x-layout>--}}
{{--    <div class="bg-white select-none">--}}
{{--        <div class="container w-screen py-5 md:py-12 md:pr-36 px-10">--}}
{{--            <div class="min-h-screen md:flex no-wrap md:-mx-2" x-data="{ tab: 'account' }">--}}
{{--                <!-- Left Side -->--}}
{{--                <div class="w-full md:w-3/12">--}}
{{--                    <!-- Side navbar -->--}}
{{--                    <ul class="h-full mb-12 text-gray-600 hover:text-gray-700">--}}
{{--                        <x-sidenavlink tab="account">Account</x-sidenavlink>--}}
{{--                        <x-sidenavlink tab="department">Afdeling</x-sidenavlink>--}}
{{--                        <x-sidenavlink tab="workDay">Werkdagen</x-sidenavlink>--}}
{{--                        <x-sidenavlink tab="other">Blokken</x-sidenavlink>--}}
{{--                    </ul>--}}
{{--                    <!-- End of Side navbar -->--}}
{{--                </div>--}}
{{--                <!-- Right Side -->--}}

{{--                <!-- Profile Tab -->--}}
{{--                <form class="w-full overflow-y-auto md:w-9/12 md:mx-2" method="POST"--}}
{{--                      action="{{route('employee.update', $employee)}}">--}}
{{--                    @csrf--}}
{{--                    <input name="_method" type="hidden" value="PUT">--}}

{{--                    <div--}}
{{--                        class="flex flex-col justify-center md:flex-row md:justify-start md:items-center md:space-x-2 font-semibold text-gray-900 leading-8 mb-12 md:flex-shrink-0">--}}

{{--                        @if (empty($employee->user->photoUrl))--}}
{{--                            <img src="https://www.shareicon.net/data/128x128/2016/07/26/801997_user_512x512.png"--}}
{{--                                 class="w-48 md:w-auto md:flex-shrink-0 min-h-full max-h-full m-auto md:m-0">--}}
{{--                        @else--}}
{{--                            <img src="{{$employee->user->photoUrl}}" class="md:flex-shrink-0 min-h-full max-h-full">--}}
{{--                        @endif--}}
{{--                        <p class="text-center md:text-left md:text-5xl sm:text-3xl select-all">{{$employee->firstname}} {{$employee->lastname}} </p>--}}
{{--                    </div>--}}

{{--                    <div x-show="tab === 'account'">--}}
{{--                        @include('employee.edit.account')--}}
{{--                    </div>--}}
{{--                    <div x-show="tab === 'department'">--}}
{{--                        @include('employee.edit.department')--}}
{{--                    </div>--}}
{{--                    <div x-show="tab === 'workDay'">--}}
{{--                        @include('employee.edit.workDay')--}}
{{--                    </div>--}}
{{--                    <div x-show="tab === 'other'">--}}
{{--                        @include('employee.edit.other')--}}
{{--                    </div>--}}

{{--                </form>--}}
{{--                <!-- End of profile tab -->--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <script--}}
{{--        type="javascript">document.getElementsByClassName('w-7/12 border-red-700 border-4 rounded focus:bg-white focus:text-black')[0].click()</script>--}}
{{--</x-layout>--}}
