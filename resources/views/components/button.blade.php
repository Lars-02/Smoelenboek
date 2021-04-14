@props(['type' => 'button', 'route' => ''])

<a href="{{ $route }}">
    <button {{ $attributes->class(["bg-red-700 hover:bg-red-900 text-white font-bold py-2 px-4 rounded focus:outline-none"]) }} type="{{ $type }}">
        {{ $slot }}
    </button>
</a>
