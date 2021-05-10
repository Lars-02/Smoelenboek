<h2 class="font-bold md:text-5xl mb-5">Blokken</h2>
@foreach($employee->lectorates as $lectorate)
    <p class="md:text-2xl">{{$lectorate->name}}</p>
@endforeach
@foreach($employee->hobbies as $hobby)
    <p class="md:text-2xl">Hobby: {{$hobby->name}}</p>
@endforeach
@foreach($employee->courses as $course)
    <p class="md:text-2xl">Course: {{$course->name}}</p>
@endforeach
@foreach($employee->minors as $minor)
    <p class="md:text-2xl">Minor: {{$minor->name}}</p>
@endforeach
@foreach($employee->learningLines as $learningLine)
    <p class="md:text-2xl">Leerlijn: {{$learningLine->name}}</p>
@endforeach
@foreach($employee->expertises as $expertise)
    <p class="md:text-2xl">Expertise: {{$expertise->name}}</p>
@endforeach
