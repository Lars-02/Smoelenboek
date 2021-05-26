<div class="text-gray-700">
    <div class="grid md:grid-cols-2 text-sm">
        <div class="mb-5 md:pr-5">
            <x-input value="{{$employee->firstname}}" type="text"
                     name="firstname" id="firstname" icon="fas fa-user-circle">Voornaam:
            </x-input>
        </div>
        <div class="mb-5 md:pr-5">
            <x-input value="{{$employee->lastname}}" type="text"
                     name="lastname" id="lastname" icon="fas fa-user-circle">Achternaam:
            </x-input>
        </div>
        <div class="mb-5 md:pr-5">
            <x-input value="{{$employee->user->email}}" type="text"
                     name="email" id="email" icon="fas fa-user-circle">Email:
            </x-input>
        </div>
        <div class="mb-5 md:pr-5">
            <x-input value="{{$employee->phoneNumber}}" type="text"
                     name="phoneNumber" id="phoneNumber" icon="fas fa-user-circle">
                Telefoonnummer:
            </x-input>
        </div>
        <div class="mb-5 md:pr-5">
            <x-input value="{{$employee->linkedInUrl}}" type="text"
                     name="linkedInUrl" id="linkedInUrl" icon="fas fa-user-circle">LinkedIn url:
            </x-input>
        </div>
    </div>
</div>
