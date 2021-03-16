<div>
    <form method="POST" action="/employee/store" class="md:w-1/2 md:ml-20 px-3 mb-6 md:mb-0">
        @csrf
        <table class="table-auto">
            @foreach($weekDays as $index => $weekDays)
            <tr>
                <td>
                    <label>Ma / </label>
                    <button class="btn btn-sm btn-secondary" wire:click.prevent="addTime">+ Add Another time / </button>
                    @foreach ($workHours as $hours)
                        Van: <x-time name="monday[{{$index}}][start_time]"></x-time>
                        Tot: <x-time name="monday[1][end_time]"></x-time>
                        {{$index}}
                    @endforeach
                </td>
                </tr>
                @endforeach
        </table>
    </form>
</div>
