@props([
'type' => 'success',
'title' => 'Alert',
])

@php
    $colors = [
    'success' => 'bg-green-200 text-green-500',
    'warning' => 'bg-yellow-500 text-yellow-500',
    'error' => 'bg-red-200 text-red-500',
    'info' => 'bg-blue-200 text-blue-500',
    ]
@endphp


<section {{ $attributes->class([$colors[$type], 'rounded-lg p-4 border']) }} x-data="{ open: true }" x-show="open">
    <div class="flex justify-between">
        <div>
            <span class="font-bold mr-2">{{ $title }}</span>
            <span>{{ $slot }}</span>
        </div>
        <button class="text-xl flex-none" @click="open =false"><i class="far fa-times-circle"></i></button>
    </div>
</section>
