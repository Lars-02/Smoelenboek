@props(['type' => 'button', 'click' => ''])

<button {{ $attributes->class(["bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none"]) }} type="{{ $type }}" @click="{{ $click }}">
    {{ $slot }}
</button>
