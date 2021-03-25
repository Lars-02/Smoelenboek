<x-layout>
    <div class="container mx-auto my-5 p-5">
        <div class="md:flex no-wrap md:-mx-2 " x-data="{ tab: 'account' }">
            <!-- Left Side -->
            <div class="w-full md:w-3/12 md:mx-2">
                <!-- Side navbar -->
                <div class="bg-white p-3 border-t-4 border-red-700">
                    <ul class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                        <li class="flex items-center justify-center py-3">
                            <x-button class="w-7/12 focus:border-red-700 border-4 rounded focus:bg-white focus:text-black" @click="tab = 'account'">Account</x-button>
                        </li>
                        <li class="flex items-center justify-center py-3">
                            <x-button class="w-7/12 focus:border-red-700 border-4 rounded focus:bg-white focus:text-black" @click="tab = 'afdeling'">Afdeling</x-button>
                        </li>
                        <li class="flex items-center justify-center py-3">
                            <x-button class="w-7/12 focus:border-red-700 border-4 rounded focus:bg-white focus:text-black" @click="tab = 'werktijden'">Werktijden</x-button>
                        </li>
                        <li class="flex items-center justify-center py-3">
                            <x-button class="w-7/12 focus:border-red-700 border-4 rounded focus:bg-white focus:text-black" @click="tab = 'blokken'">Blokken</x-button>
                        </li>
                        <li class="flex items-center justify-center py-3">
                            <x-button class="w-7/12 focus:border-red-700 border-4 rounded focus:bg-white focus:text-black" @click="tab = 'socialmedia'">Sociale Media</x-button>
                        </li>
                    </ul>
                </div>
                <!-- End of Side navbar -->
            </div>
            <!-- Right Side -->
            <div class="w-full md:w-9/12 mx-2 h-64">
                <!-- Profile Tab -->
                <div x-show="tab === 'account'" class="bg-white p-3 shadow-sm rounded-sm">
                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                        <img src="https://www.shareicon.net/data/128x128/2016/07/26/801997_user_512x512.png" class="md:w-64 mb-5">
                        <p class="md:text-5xl">Bobby van de Straat</p>
                    </div>
                    <div class="text-gray-700">
                        <div class="grid md:grid-cols-2 text-sm">
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">E-Mail</div>
                                <div class="px-4 py-2">BobbyVanDeStraat@example.nl</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Telefoon</div>
                                <div class="px-4 py-2">+31 6 29828102</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Voornaam</div>
                                <div class="px-4 py-2">Bobby</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Achternaam</div>
                                <div class="px-4 py-2">van de Straat</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div x-show="tab === 'afdeling'" class="bg-white p-3 shadow-sm rounded-sm">
                    <p>afdeling</p>
                </div>

                <div x-show="tab === 'werktijden'" class="bg-white p-3 shadow-sm rounded-sm">
                    <p>werktijden</p>
                </div>

                <div x-show="tab === 'blokken'" class="bg-white p-3 shadow-sm rounded-sm">
                    <p>blokken</p>
                </div>

                <div x-show="tab === 'socialmedia'" class="bg-white p-3 shadow-sm rounded-sm">
                    <p>socialmedia</p>
                </div>

                <!-- End of profile tab -->
            </div>
        </div>
    </div>
</x-layout>
