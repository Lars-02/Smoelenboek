<div class=" flex py-6">
    <div class="flex w-full max-w-xl max- p-4 bg-gray-200">
        <ul class="flex flex-col w-full">
            <li class="my-px">
                <a>
                <span class="ml-3">{{$title}}</span>
                <span class="flex items-center justify-center text-xl text-white  bg-red-700 h-6 px-2 rounded-full ml-auto m-0">{{$title}} toevoegen</span>
                </a>
            </li>
            <li class="my-px">
                <span class="flex font-medium text-xl text-gray-400 px-2 my-2 uppercase">Subfilters</span>
            </li>
            @foreach($options as  $option)
                <li class="my-px mb-5">
                    <a class="flex flex-row items-center px-4 rounded-lg text-gray-500 text-xl">
                            <span class="ml-3" name="{{ $option->name }}">
                                {{ $option->name }}
                            </span>
                        <div class="ml-auto">
                            <x-modal
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
                            </x-modal>
                        </div>

                    </a>

                </li>
                @endforeach
        </ul>
    </div>
</div>
