<div x-data="{ open: false }">
    <div @click="open = true">
        {{ $trigger }}
    </div>

    <div class="fixed top-10 sm:top-20 md:top-32 lg:top-40 xl:top-52 px-4 pb-4 inset-0 items-center justify-center z-10" x-show="open">
        <div
            class="fixed inset-0 transition-opacity"
            x-show="open"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
        >
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-2xl mx-auto"
             role="dialog"
             aria-modal="true"
             aria-labelledby="modal-headline"
             x-show="open"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        >
            <form method="POST" action="{{ $route }}">
                @csrf
                @method($method)
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        @if(!is_null($icon))
                            <div
                                class="bg-gray-200 text-gray-700 mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full sm:mx-0 sm:h-10 sm:w-10">
                                <i class="{{ $icon }}"></i>
                            </div>
                        @endif
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900"
                                id="modal-headline"
                            >
                                {{ $modalTitle }}
                            </h3>
                            <div class="mt-2 line">
                                {{ $slot }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 px-4 py-3 sm:px-6 flex flex-row-reverse z-10">
                    <div class="flex rounded-md shadow-sm ml-3 w-auto">
                        <x-button type="submit">
                            {{ $submitLabel ?? 'Submit' }}
                        </x-button>
                    </div>
                    <div class="flex rounded-md shadow-sm mt-0 w-auto z-10">
                        <x-button @click="open = false">
                            {{ $cancelLabel ?? 'Cancel' }}
                        </x-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
