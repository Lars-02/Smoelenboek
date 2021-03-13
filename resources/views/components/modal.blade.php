<div x-data="{open:false}">
    <x-button @click="open=true"> {{$modal}}</x-button>

    <div x-show="open" class="flex items-center justify-center h-1/2">
        <div class="rounded-lg w-full bg-gray-800">
            <div class="flex flex-col items-start p-4">
                <div class="flex items-center w-full">
                    <div class="text-white font-medium text-lg">{{ $title }}</div>
                    <x-button @click="open=false" class="ml-auto w-10 h-10">
                        <i class="fas fa-times fill-current -ml-2 text-white w-6 h-6 cursor-pointer"></i>
                    </x-button>
                </div>
                <div class="text-white mb-14">
                    {{ $slot }}
                </div>
                <div class="ml-auto text-white">
                    <a href={{ $buttonHrefLeft }}><x-button type={{ $buttonTypeLeft }}>{{ $buttonNameLeft }}</x-button></a>
                    <a href={{ $buttonHrefRight }}><x-button type={{ $buttonTypeRight }}>{{ $buttonNameRight }}</x-button></a>
                </div>
            </div>
        </div>
    </div>
</div>
