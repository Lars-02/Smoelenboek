<h2 class="font-bold md:text-5xl mb-5">Werkdagen</h2>
<label class="mb-1.5 pl-1.5 py-0.5 text-left text-white md:w-6/12 bg-red-700 rounded block">Selecteer
    werkzame dagen:</label>
<div class="w-full">
    <div class="flex justify-between md:w-2/3 xl:w-1/2 mb-6 col-span-2 xl:col-span-3">
        @foreach($workDays as $day)
            @if($employee->workDays->contains($day))
                <x-dayToggle :day="$day" :selected="true"></x-dayToggle>
            @else
                <x-dayToggle :day="$day"></x-dayToggle>
            @endif
        @endforeach
    </div>
</div>
