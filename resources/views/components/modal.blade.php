<x-button id="button1"> {{$modal}}</x-button>

<div id="overlay" class="flex items-center justify-center fixed left-0 bottom-0 w-full h-full">
    <div class="rounded-lg w-full bg-gray-800">
        <div class="flex flex-col items-start p-4">
            <div class="flex items-center w-full">
                <div class="text-white font-medium text-lg">{{ $title }}</div>
                <x-button id="button2" class="ml-auto w-10 h-10">
                    <i class="fas fa-times ml-auto fill-current -ml-2 text-white w-6 h-6 cursor-pointer"></i>
                </x-button>
            </div>
            <div class="text-white">
                {{ $slot }}
            </div>
            <div class="ml-auto text-white">
                <a href={{ $hrefLeft }}><x-button type={{ $typeLeft }}>{{ $btnNameLeft }}</x-button></a>
                <a href={{ $hrefRight }}><x-button type={{ $typeRight }}>{{ $btnNameRight }}</x-button></a>
            </div>
        </div>
    </div>
</div>

<script>
    const button = document.getElementById('button1')
    button.addEventListener('click', toggleModal)

    const overlay = document.getElementById('overlay')
    overlay.className += ' hidden'

    const button2 = document.getElementById('button2')
    button2.addEventListener('click', toggleModal)

    function toggleModal () {
        const modal = document.getElementById('overlay')

        if(modal.className.match(' hidden')) {
            modal.className -= ' hidden'
        }
        else {
            modal.className += ' hidden'
        }
    }
</script>
