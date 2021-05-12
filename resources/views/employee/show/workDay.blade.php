<h2 class="font-bold md:text-5xl mb-5 select-none">Werkdagen</h2>
@foreach($allDays as $day)
    @if(in_array($day, $workingDays))
        <span class="select-all text-red-700 shadow-inner px-4 py-2 font-bold shadow rounded text-xs sm:text-sm md:text-base lg:text-lg">
            {{ substr($day, 0, 2) }}
        </span>
    @endif
@endforeach
