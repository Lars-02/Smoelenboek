<x-layout>
    @if(\Illuminate\Support\Facades\Session::has('succes'))
        <h2 class="bg-green-500 text-center p-1">{{ \Illuminate\Support\Facades\Session::get('succes')  }}</h2>
    @endif
    <div class="container">

    </div>
</x-layout>
