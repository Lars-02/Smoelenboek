<div class=" flex py-6">
    <div class="flex w-full max-w-xl max- p-4 bg-gray-200">
        <ul class="flex flex-col w-full">
            <li class="my-px">
                <a x-data="{ open: false }">
                    <span class="ml-3">{{$title}}</span>
                    <span type="button" @click="open = true" class="flex items-center justify-center text-xl text-white  bg-red-700 h-6 px-2 rounded-full ml-auto m-0">{{$title}} toevoegen</span>
                    <x-inputModal
                    route="{{route('createsubfilter', ['filter' => $title])}}"
                    >{{$title}}</x-inputModal>
                </a>
            </li>
            <li class="my-px">
                <span class="flex font-medium text-xl text-gray-400 px-2 my-2 uppercase">Subfilters</span>
            </li>
            @foreach($options as  $option)
                <li class="my-px mb-5">
                    <a class="grid grid-cols-5 gap-4 px-4 rounded-lg text-gray-500 text-xl">
                        <span class="ml-3 col-start-1 col-end-4 break-words" name="{{ $option->name }}">
                            {{ $option->name }}
                        </span>
                        <div  x-data="{ open: false }" class="col-start-4 col-end-5">
                            <button type="button" @click="open = true"  class="fas fa-edit h-10 w-10 bg-red-700 hover:bg-red-900 text-white font-bold rounded focus:outline-none"></button>
                            <x-inputModal
                            route="{{route('editsubfilter',['id' => $option->id, 'filter'=> $title])}}"
                            >{{$option->name}}</x-inputModal>
                        </div>
                        <div x-data="{ VerwijderPopUp: false }" class="col-start-5 col-end-6">
                            <button type="button" @click="VerwijderPopUp = true"  class="fas fa-backspace h-10 w-10 bg-red-700 hover:bg-red-900 text-white font-bold rounded focus:outline-none"></button>
                            <x-removeFilterModal
                                modalTitle="Subfilter Verwijderen"
                                submitLabel="Verwijderen"
                                cancelLabel="Annuleren"
                                route="{{route('subfilter.destroy', ['id' => $option->id, 'name'=> $title])}}"
                                method="DELETE"
                                icon="fas fa-backspace">
                                <x-slot name="trigger">
                                    <x-button class="fas fa-backspace ">
                                    </x-button>
                                </x-slot>
                                <div>
                                    Weet u zeker dat u het subfilter {{ $option->name }} wilt verwijderen?
                                </div>
                            </x-removeFilterModal>
                        </div>
                    </a>

                </li>
                @endforeach
        </ul>
    </div>
</div>
