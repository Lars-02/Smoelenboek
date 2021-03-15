<div class="bg-white inline-block mx-8 my-9 justify-center items-center overflow-hidden md:max-w-sm rounded-lg ">
    <div class="relative h-40">
        <img class="absolute h-full w-full object-cover" src="{{asset($imageAssetPath)}}">
    </div>
    <div class="relative mx-auto h-24 w-24 -my-12 border-white rounded-full overflow-hidden border-4">
        <img class="object-cover w-full h-full" src="{{asset($imageAssetPath)}}">
    </div>
    <div class="mt-16">
        <h1 class="text-lg text-center font-semibold">
            {{ $userName }}
        </h1>
        <p class="text-sm text-gray-600 text-center">
            {{ $departementAndFunction }}
        </p>
        <p class="text-sm text-red-600 text-center">
            {{ $email }}
        </p>
        <p class="text-sm text-red-600 text-center">
            {{ $telephoneNumber }}
        </p>
        <div class="mt-1 mx-6 border-t">
        <p class="text-sm text-grey-600 font-bold text-center">
            Expertise
        </p>
        @foreach(array_slice($expertise, 0, 2) as $field)
            <p class="text-sm text-black-600 text-center">{{ $field }}</p>
            @endforeach
        </div>
    </div>

    <div class="mt-1 pt-1 flex flex-wrap mx-6 border-t">
        <h6 class="text-xs mr-2 my-1">Werkdagen:</h6>
        @if(! in_array('Maandag', $workweek))
            <div class="text-xs mr-2 my-1 uppercase border px-2 text-black-600 border-black-600">
                Ma
            </div>
        @else
            <div class="text-xs mr-2 my-1 uppercase  border px-2 text-red-600 border-red-600">
                Ma
            </div>
        @endif
        @if(! in_array('Dinsdag', $workweek))
            <div class="text-xs mr-2 my-1 uppercase border px-2 text-black-600 border-black-600">
                Di
            </div>
        @else
            <div class="text-xs mr-2 my-1 uppercase border px-2 text-red-600 border-red-600">
                Di
            </div>
        @endif
        @if(! in_array('Woensdag', $workweek))
            <div class="text-xs mr-2 my-1 uppercase border px-2 text-black-600 border-black-600">
                Wo
            </div>
        @else
            <div class="text-xs mr-2 my-1 uppercase border px-2 text-red-600 border-red-600">
                Wo
            </div>
        @endif
        @if(! in_array('Donderdag', $workweek))
            <div class="text-xs mr-2 my-1 uppercase border px-2 text-black-600 border-black-600">
                Do
            </div>
        @else
            <div class="text-xs mr-2 my-1 uppercase border px-2 text-red-600 border-red-600">
                Do
            </div>
        @endif
        @if(! in_array('Vrijdag', $workweek))
            <div class="text-xs mr-2 my-1 uppercase border px-2 text-black-600 border-black-600">
                Vr
            </div>
        @else
            <div class="text-xs mr-2 my-1 uppercase border px-2 text-red-600 border-red-600">
                Vr
            </div>
        @endif
    </div>
    <div class="text-center mt-5">
        <x-button href="{{ $profileLink }}" class="px-8 py-1 mb-6 bg-red-600 rounded text-white text-center">
            Meer info
        </x-button>
    </div>
</div>
