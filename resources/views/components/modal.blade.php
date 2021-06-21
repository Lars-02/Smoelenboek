<div id="popUp" class="absolute fixed transform" x-show="VerwijderPopUp" @click.away="VerwijderPopUp = false">
    <div class="p-5 bg-white border-2 border-black rounded-md"> 
        <form method="POST" action="{{ $route }}">
            @csrf
            @method($method)
            <div class="bg-white">
                <div class="sm:flex sm:items-start">
                    @if(!is_null($icon))
                        <div
                            class="bg-red-200 text-red-700 mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full sm:mx-0 sm:h-10 sm:w-10">
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

            <div class="bg-gray-50 px-4 py-3 sm:px-6 flex flex-row-reverse">
                <div class="flex rounded-md shadow-sm ml-3 w-auto">
                    <x-button id="opslaanbutton" type="submit">{{ $submitLabel ?? 'Submit' }}</x-button>
                </div>
                <div class="flex rounded-md shadow-sm ml-3 w-auto">
                    <x-button id="annulerenbutton" @click="VerwijderPopUp = false">{{$cancelLabel ?? 'Annuleren'}}</x-button>
                </div>
            </div>
        </form>
    </div>
</div>