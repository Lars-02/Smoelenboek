<div class="md:flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-5 md:h-1/2 md:flex-shrink-0">
    @if (empty($employee->user->photoUrl))
        <img src="https://www.shareicon.net/data/128x128/2016/07/26/801997_user_512x512.png"
             class="select-none md:flex-shrink-0 md:w-48 min-h-full max-h-full">
    @else
        <img src="{{$employee->user->photoUrl}}" class="select-none md:flex-shrink-0 min-h-full max-h-full">
    @endif
    <p class="md:text-5xl sm:text-3xl select-all">{{$employee->firstname}} {{$employee->lastname}} </p>
</div>
<div class="text-gray-700">
    <div class="grid md:grid-cols-2 text-sm">
        <div class="grid grid-cols-2">
            <div class="break-words md:text-2xl select-none font-semibold">E-mail</div>
            <div class="break-words md:text-2xl select-all">{{$employee->user->email}}</div>
        </div>
        <div class="grid grid-cols-2">
            <div class="break-words md:text-2xl select-none font-semibold">Telefoon</div>
            <div class="break-words md:text-2xl select-all">{{$employee->phoneNumber}}</div>
        </div>
        <div class="grid grid-cols-2">
            <div class="break-words md:text-2xl select-none font-semibold">Voornaam</div>
            <div class="break-words md:text-2xl select-all">{{$employee->firstname}}</div>
        </div>
        <div class="grid grid-cols-2">
            <div class="break-words md:text-2xl select-none font-semibold">Achternaam</div>
            <div class="break-words md:text-2xl select-all">{{$employee->lastname}}</div>
        </div>
        <div class="grid grid-cols-2">
            <a href="{{$employee->linkedInUrl}}"
               class="break-words text-blue-500 md:text-2xl font-semibold select-none">LinkedIn</a>
        </div>
    </div>
</div>
