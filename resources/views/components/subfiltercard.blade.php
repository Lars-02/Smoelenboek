<div class="flex flex-col bg-gray-200 rounded shadow">
    <div class="flex justify-center m-6">
        <div class="flex font-medium text-xl text-gray-400 px-2 my-4 uppercase my-auto">{{ $filter }}</div>
        <x-modal
            modalTitle="{{ $filter . ' aanmaken' }}"
            submitLabel="Opslaan"
            cancelLabel="Annuleren"
            route="{{route('createsubfilter', ['filter' => $title])}}"
            method="POST"
            icon="far fa-plus-square">
            <x-slot name="trigger">
                <x-button class="rounded-full">
                    {{ $filter . ' aanmaken' }}
                </x-button>
            </x-slot>
            <div class="flex justify-center">
                <x-input type="text" name="name" id="{{ $filter }}"
                         icon="fas fa-filter">{{ $filter }}</x-input>
            </div>
        </x-modal>
    </div>
    <div class="flex font-medium text-xl text-gray-400 px-2 my-4 uppercase">Subfilters</div>
    <div class="flex flex-col">
        @foreach($options as  $option)
            <div class="flex justify-between select-none m-2">
                <div class="ml-3 text-gray-500 text-xl break-words">{{ $option->name }}</div>
                <div class="flex gap-2">
                    <x-modal
                        modalTitle="{{ $filter . ' aanpassen' }}"
                        submitLabel="Opslaan"
                        cancelLabel="Annuleren"
                        route="{{route('editsubfilter',['id' => $option->id, 'filter'=> $title])}}"
                        method="PUT"
                        icon="fas fa-edit">
                        <x-slot name="trigger">
                            <x-button class="rounded"><span class="fas fa-edit"></span></x-button>
                        </x-slot>
                        <div class="flex justify-center">
                            <x-input type="text" name="name" id="{{ $filter }}"
                                     icon="fas fa-filter" value="{{ $option->name }}">{{ $filter }}</x-input>
                        </div>
                    </x-modal>
                    <x-modal
                        modalTitle="{{ $filter . ' verwijderen' }}"
                        submitLabel="Opslaan"
                        cancelLabel="Annuleren"
                        route="{{route('destroysubfilter', ['id' => $option->id, 'name'=> $title])}}"
                        method="DELETE"
                        icon="fas fa-trash">
                        <x-slot name="trigger">
                            <x-button class="rounded"><span class="fas fa-trash"></span></x-button>
                        </x-slot>
                        <div>
                            Weet u zeker dat u het subfilter {{ $option->name }} wilt verwijderen?
                        </div>
                    </x-modal>
                </div>
            </div>
        @endforeach
    </div>
</div>
