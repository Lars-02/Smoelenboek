<nav class="border-b-8 border-red-600 flex items-center justify-between flex-wrap bg-teal px-6 py-3">
    <div x-data="{isOpen: false}" class="flex items-center flex-no-shrink text-red-600 mr-6">
        <a href="#"> <img href="#" class="h-10" src="{{ asset("img/avans-log.png") }}">
    </div>
    <div class=" block lg:hidden " x-data="{showMenu : false}">
        <button @click="isOpen = true" class="flex items-center px-3 py-2 border rounded text-red-600 border-red-600 hover:text-red-600 hover:border-black">
            <i class="fas fa-bars"></i>
        </button>
    </div>
    <div x-show="isOpen" class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
        <div class="text-sm lg:flex-grow">
            <a href="#" class="block mt-4 lg:inline-block text-xl lg:mt-0 text-red-600 hover:text-black mr-4">
                <b>Home</b>
            </a>
            <a href="#" class="block mt-4 lg:inline-block text-xl lg:mt-0 text-red-600 hover:text-black mr-4">
                <b>Gegevens</b>
            </a>
            @auth
                <div class="sm:float-right inline-block">
                    <a href="{{ route("#") }}" class="inline-block mt-4 text-xl leading-none text-red-600 border-red-600 hover:text-black "><b>Uitloggen</b></a>
                    <a class="fas fa-user"></a>
                </div>
            @else
                <div class="sm:float-right inline-block">
                    <a href="/login" class="inline-block mt-4 text-xl lg:mt-0 leading-none text-red-600 border-red-600 hover:text-black "><b>Inloggen</b></a>
                    <a class="fas fa-user fa-2x fa-" ></a>
                </div>
            @endauth
        </div>

    </div>
</nav>
