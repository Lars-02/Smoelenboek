<nav x-data="{ open: false }">
    <div class="border-b-8 border-red-700 flex bg-white px-6 py-3">
        <img href="{{ route('home') }}" class="h-10 mx-3 hidden sm:block" src="{{ asset("img/avans-log.png") }}" alt="Logo of Avans">
        <div class="flex-none self-center p-2 text-xl text-red-700 hover:text-red-800 font-bold">
            <a href="{{ route('home') }}">{{ __('Home') }}</a>
        </div>
        {{--TODO: Check if role is admin--}}
        {{--@auth('admin')--}}
        <div class="flex-none self-center p-2 text-xl text-red-700 hover:text-red-800 font-bold hidden lg:block">
            <a href="#">{{ __('Gegevens') }}</a>
        </div>
        {{--@endauth--}}
        <div class="flex-auto"></div>
        @guest()
            <div class="flex-none self-center p-2 text-xl text-red-700 hover:text-red-800 font-bold hidden lg:block">
                <a href="{{ route('login') }}">Login</a>
            </div>
        @else
            <div class="flex-none self-center p-2 text-xl text-red-700 hover:text-red-800 font-bold hidden lg:block">
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
            </div>

            <div class="flex-none self-center p-2 text-xl text-red-700 hover:text-red-800 font-bold hidden lg:block">
                @if(Auth::user()->employee != null)
                    <a href="{{ route('employee.show', ['employee' => Auth::user()->employee]) }}">{{ Auth::user()->email }}</a>
                @endif
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        @endguest
        <div class="flex-none self-center p-2 text-xl text-red-700 hover:text-red-800 font-bold lg:hidden">
            <div @click="open = !open"
                 class="focus:outline-none cursor-pointer"
            >
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </div>
    <div class="bg-white w-full border-b-4 border-red-700 lg:hidden" x-show="open">
        {{--TODO: Check if role is admin--}}
        {{--@auth('admin')--}}
        <div class="self-center p-2 text-xl text-red-700 hover:text-red-800 font-bold">
            <a href="#">{{ __('Gegevens') }}</a>
        </div>
        {{--@endauth--}}
        @guest()
            <div class="self-center p-2 text-xl text-red-700 hover:text-red-800 font-bold">
                <a href="{{ route('login') }}">Login</a>
            </div>
        @else
            <div class="self-center p-2 text-xl text-red-700 hover:text-red-800 font-bold">
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        @endguest
    </div>
</nav>
