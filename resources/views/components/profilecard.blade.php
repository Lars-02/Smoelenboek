<div class="mt-4 mx-7 w-1/5 border-2 border-gray-600 rounded">
    <div class="bg-gray-800">
        <img class="max-h-50 m-auto" src="{{asset($imageAssetPath)}}"/>
        <div class="absolute px-2 -mt-10 w-1/6">
            <h3 class="text-white">{{ $userName }}</h3>
            <hr class="p-1 w-full bg-red-600 rounded">
        </div>
    </div>
    <div class="px-4 py-2 bg-white">
        <h1 class="text-gray-500 text-2xl">{{ $departementAndFunction }}</h1>
        <a class="text-red-600">{{ $email }}</a><br>
        <a class="text-red-600">{{ $telephoneNumber }}</a>
        <div class="my-1">
            <h6 class="text-gray-500">Werkt op</h6>
            <h6>
                @if(! in_array('Maandag', $workweek))
                    <span class="mr-1">Ma</span>
                @else
                    <span class="mr-1 text-red-600">Ma</span>
                @endif
                @if(! in_array('Dinsdag', $workweek))
                    <span class="mx-1">Di</span>
                @else
                    <span class="mr-1 text-red-600">Di</span>
                @endif
                @if(! in_array('Woensdag', $workweek))
                    <span class="mx-1">Wo</span>
                @else
                    <span class="mr-1 text-red-600">Wo</span>
                @endif
                @if(! in_array('Donderdag', $workweek))
                    <span class="mx-1">Do</span>
                @else
                    <span class="mr-1 text-red-600">Do</span>
                @endif
                @if(! in_array('Vrijdag', $workweek))
                    <span class="ml-1">Vr</span>
                @else
                    <span class="mr-1 text-red-600">Vr</span>
                @endif
            </h6>
        </div>
        <div class="mb-3">
            <h6 class="text-gray-500">Expertise</h6>
            @foreach(array_slice($expertise, 0, 2) as $field)
                <h6>{{ $field }}</h6>
            @endforeach
            <h6>...</h6>
        </div>
        <button href="{{ $profileLink }}" class="px-8 py-1 mb-6 bg-red-600 rounded text-white">
            Meer info
        </button>
    </div>
</div>
