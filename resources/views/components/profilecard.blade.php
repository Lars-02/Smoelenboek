<div class="mt-4 mx-7 w-72 bg-white border-2 border-gray-600 rounded">
    <div class="relative h-44">
        <div class="absolute px-2 mt-32 z-20">
            <h3 class="text-white">{{ $userName }}</h3>
            <hr class="p-1 bg-red-700 rounded">
        </div>
        <img class="absolute h-full w-full object-cover" src="{{asset($imageAssetPath)}}">
    </div>
    <div class="px-4 py-2">
        <h1 class="text-gray-500 text-2xl">{{ $departementAndFunction }}</h1>
        <div class="text-sm">
            <a class="text-red-700">{{ $email }}</a><br>
            <a class="text-red-700">{{ $telephoneNumber }}</a>
            <div class="my-1 text-gray-500">
                <h5 class="text-base">Werkt op</h5>
                <h6>

                    @for($i = 0; $i < 5; $i++)
                        @if(! in_array($allWorkingDays[$i], $workingDays))
                            <span class="mr-1">{{$dayAbbreviation[$i]}}</span>
                        @else
                            <span class="mr-1 text-red-600">{{$dayAbbreviation[$i]}}</span>
                        @endif
                    @endfor

                    {{--@if(! in_array('Maandag', $workweek))
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
                    @endif--}}
                </h6>
            </div>
            <div class="mb-3">
                <h5 class="text-base text-gray-500">Expertise</h5>
                @if(!$expertises)
                    @foreach(array_slice($expertises, 0, 2) as $expertise)
                        <h6 class="text-red-700">{{ $expertise }}</h6>
                    @endforeach
                    <h6 class="text-red-700">...</h6>
                @else
                    <span class="mr-1">Niet ingesteld</span>
                @endif
            </div>
        </div>
        <button href="{{ $profileLink }}" class="px-8 py-1 mb-6 bg-red-700 rounded text-white">
            Meer info
        </button>
    </div>
</div>
