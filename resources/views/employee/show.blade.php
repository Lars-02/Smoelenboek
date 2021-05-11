<x-layout>
    <div class="container mx-auto my-5 p-5">
        <div class="md:flex no-wrap md:-mx-2 " x-data="{ tab: 'account' }">
            <!-- Left Side -->
            <div class="w-full md:w-3/12">
                <!-- Side navbar -->
                <ul class="h-full mb-12 text-gray-600 hover:text-gray-700">
                    <x-sidenavlink tab="account">Account</x-sidenavlink>
                    <x-sidenavlink tab="department">Afdeling</x-sidenavlink>
                    <x-sidenavlink tab="workDay">Werkdagen</x-sidenavlink>
                    <x-sidenavlink tab="other">Blokken</x-sidenavlink>
                </ul>
                <!-- End of Side navbar -->
            </div>
            <!-- Right Side -->
            <div class="w-full md:w-9/12 mx-2 h-auto">
                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        <h1 class="text-center p-2 text-white font-bold bg-red-700">{{ session()->get('error') }}</h1>
                    </div>
                @endif
            <!-- Profile Tab -->
                <div x-show="tab === 'account'">
                    @include('employee.show.account')
                </div>
                <div x-show="tab === 'department'">
                    @include('employee.show.department')
                </div>
                <div x-show="tab === 'workDay'">
                    @include('employee.show.workDay')
                </div>
                <div x-show="tab === 'other'">
                    @include('employee.show.other')
                </div>

                <!-- End of profile tab -->

                <div class="flex justify-start pt-6">
                    @if(auth()->user()->isAdmin() || $employee->user->id == auth()->user()->id)
                        <a href="{{ route('employee.edit', ['employee' => $employee]) }}">
                            <x-button>
                                Aanpassen
                            </x-button>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script
        type="javascript">document.getElementsByClassName('w-7/12 border-red-700 border-4 rounded focus:bg-white focus:text-black')[0].click()</script>
</x-layout>
