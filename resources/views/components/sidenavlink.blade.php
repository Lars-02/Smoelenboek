<li class="flex items-center justify-center py-3">
    <x-button class="w-10/12" @click="tab = '{{ $tab }}'">
        {{ $slot }}
    </x-button>
</li>
