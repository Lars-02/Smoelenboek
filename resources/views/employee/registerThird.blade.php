<x-layout>
    <i class="fas fa-clock fa-2x"></i>
    <div>
            <label class="pl-1.5 py-0.5 float-left text-left text-white text-2xl w-7/12 bg-red-700 rounded font-medium">Werkdagen</label>
            @livewire('user-registration');
        <template x-for="item in items" :key="item">
            <div x-text="item"></div>
        </template>
    </div>
    </div>
</x-layout>

