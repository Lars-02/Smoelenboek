<div class="flex items-center justify-center fixed left-0 bottom-0 w-full h-full">
    <div class="rounded-lg w-1/3 bg-gray-800">
        <div class="flex flex-col items-start p-4">
            <div class="flex items-center w-full">
                <div class="text-white font-medium text-lg">{{ $title }}</div>
                <x-button class="ml-auto w-10 h-10" type="button" click="">
                    <svg class="ml-auto fill-current -ml-2 text-white w-6 h-6 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"/>
                    </svg>
                </x-button>
            </div>
            <hr>
            <div class="text-white">{{ $message }}</div>
            <hr>
            <div class="ml-auto text-white">
                <x-button type="button" click="">{{ $buttonLeft }}</x-button>
                <x-button type="button" click="">{{ $buttonRight }}</x-button>
            </div>
        </div>
    </div>
</div>
