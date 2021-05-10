<x-layout>
    <div class="container mx-auto my-5 p-5">
        <div class="md:flex no-wrap md:-mx-2 " x-data="{ tab: 'account' }">
            <!-- Left Side -->
            <div class="w-full md:w-5/12 md:mx-2">
                <!-- Side navbar -->
                <div class="bg-white p-3 border-t-4 border-red-700">
                    <ul class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                        <x-sidenavlink tab="account">Account</x-sidenavlink>
                        <x-sidenavlink tab="department">Afdeling</x-sidenavlink>
                        <x-sidenavlink tab="workday">Werkdagen</x-sidenavlink>
                        <x-sidenavlink tab="term">Blokken</x-sidenavlink>
                    </ul>
                </div>
                <!-- End of Side navbar -->
            </div>
            <!-- Right Side -->
            <div class="w-full md:w-9/12 mx-2 h-auto">
                @if (!empty($succes))
                    <h1 class="text-center p-2 text-white font-bold bg-red-700">{{$succes}}</h1>
                @endif
                <!-- Profile Tab -->
                <div x-show="tab === 'account'" class="bg-white p-3 shadow-sm rounded-sm md:h-2/3">
                    @include('employee.show.account')
                </div>

                <div x-show="tab === 'department'" class="bg-white p-3 shadow-sm rounded-sm h-full ">
                    @include('employee.show.department')
                </div>

                <div x-show="tab === 'workday'" class="bg-white p-3 shadow-sm rounded-sm h-full ">
                    @include('employee.show.workDay')
                </div>

                <div x-show="tab === 'term'" class="bg-white p-3 shadow-sm rounded-sm h-full ">
                    @include('employee.show.term')
                </div>

                <!-- End of profile tab -->

                <div class="flex justify-start pt-6">
                    @if(auth()->user()->isAdmin() || $employee->user->id == auth()->user()->id)
                    <x-button>
                        <a href="{{ route('employee.edit', ['employee' => $employee]) }}">Aanpassen</a>
                    </x-button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script type="javascript">document.getElementsByClassName('w-7/12 border-red-700 border-4 rounded focus:bg-white focus:text-black')[0].click()</script>
</x-layout>
