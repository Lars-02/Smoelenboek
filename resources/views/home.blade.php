<x-layout>
    @if(\Illuminate\Support\Facades\Session::has('succes'))
        <h2 class="bg-green-500 text-center p-1">{{ \Illuminate\Support\Facades\Session::get('succes')  }}</h2>
    @endif
    <div class="container">

    </div>
        <div class="w-full px-10 flex flex-wrap border justify-center">
            <x-profilecard image-asset-path="uploads/maxresdefault.jpg" departement-and-function="AI&I - Docent web" user-name="Stefan van Haarlem" email="docent@avans.nl" telephone-number="0639564734"></x-profilecard>
            <x-profilecard image-asset-path="uploads/maxresdefault.jpg" departement-and-function="AI&I - Docent web" user-name="Stefan van Haarlem" email="docent@avans.nl" telephone-number="0639564734"></x-profilecard>
            <x-profilecard image-asset-path="https://tetsuro.photography/wp-content/uploads/2018/10/20160928-Lieneke-de-Windt-8641-e1539805277627.jpg" departement-and-function="AI&I - Docent web" user-name="Stefan van Haarlem" email="docent@avans.nl" telephone-number="0639564734"></x-profilecard>
        </div>
</x-layout>
