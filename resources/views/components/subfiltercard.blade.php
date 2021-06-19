<div class=" flex py-6">
    <div class="flex w-full max-w-sm max- p-4 bg-gray-200">
        <ul class="flex flex-col w-full">
            <li class="my-px">
                <a
                <span class="ml-3">{{$title}}</span>
                <span class="flex items-center justify-center text-xl text-white  bg-red-700 h-6 px-2 rounded-full ml-auto m-0">{{$title}} toevoegen</span>
                </a>
            </li>
            <li class="my-px">
                <span class="flex font-medium text-sm text-gray-400 px-2 my-2 uppercase">Subfilters</span>
            </li>
            @foreach($options as  $option)
                <li class="my-px">
                    <a
                        class="flex flex-row items-center h-8 px-4 rounded-lg text-gray-500 ">
                            <span class="ml-3" name="learningLines[{{ $option->id }}]">
                                {{ $option->name }}
                                <i class="fas fa-edit"></i>
                                <a href="{{route('subfilter.destroy', ['subfilter' => $option])}}"> <i class="fas fa-backspace"></i></a>
                            </span>
                    </a>
                </li>
                @endforeach
        </ul>
    </div>
</div>
