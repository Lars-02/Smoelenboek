<div class="bg-white rounded lg:p-10 col-span-2 lg:shadow bg-opacity-0 lg:bg-opacity-100">
    <ul class="block mx-auto">
        <li class="bg-white shadow-md p-5 mb-5">
            <h4 class="md:text-2xl lg:text-3xl font-bold inline-block border-b border-red-700 mb-2">Lectoraten</h4>
            <div>
                @foreach($employee->lectorates as $lectorate)
                    <p class="text-sm md:text-xl lg:text-2xl select-all">{{$lectorate->name}}</p>
                @endforeach
            </div>
        </li>
        <li class="bg-white shadow-md p-5 mb-5">
            <h4 class="md:text-2xl lg:text-3xl font-bold inline-block border-b border-red-500 mb-2">Hobby's</h4>
            <div>
                @foreach($employee->hobbies as $hobby)
                    <p class="text-sm md:text-xl lg:text-2xl select-all">{{$hobby->name}}</p>
                @endforeach
            </div>
        </li>
        <li class="bg-white shadow-md p-5 mb-5">
            <h4 class="md:text-2xl lg:text-3xl font-bold inline-block border-b border-red-500 mb-2">Cursussen</h4>
            <div>
                @foreach($employee->courses as $course)
                    <p class="text-sm md:text-xl lg:text-2xl select-all">{{$course->name}}</p>
                @endforeach
            </div>
        </li>
        <li class="bg-white shadow-md p-5 mb-5">
            <h4 class="md:text-2xl lg:text-3xl font-bold inline-block border-b border-red-500 mb-2">Expertises</h4>
            <div>
                @foreach($employee->expertises as $expertise)
                    <p class="text-sm md:text-xl lg:text-2xl select-all">{{$expertise->name}}</p>
                @endforeach
            </div>
        </li>
        <li class="bg-white shadow-md p-5 mb-5">
            <h4 class="md:text-2xl lg:text-3xl font-bold inline-block border-b border-red-500 mb-2">Leerlijnen</h4>
            <div>
                @foreach($employee->learningLines as $learningLine)
                    <p class="text-sm md:text-xl lg:text-2xl select-all">{{$learningLine->name}}</p>
                @endforeach
            </div>
        </li>
        <li class="bg-white shadow-md p-5">
            <h4 class="md:text-2xl lg:text-3xl font-bold inline-block border-b border-red-500 mb-2">Minoren</h4>
            <div>
                @foreach($employee->minors as $minor)
                    <p class="text-sm md:text-xl lg:text-2xl select-all">{{$minor->name}}</p>
                @endforeach
            </div>
        </li>
    </ul>
</div>
