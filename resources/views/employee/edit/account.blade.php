<div class="text-gray-700">
    <div class="grid md:grid-cols-2 text-sm">
        <div class="mb-5 md:pr-5">
            @error('firstname')
            <x-input value="{{$employee->firstname}}" error="{{$message}}" type="text"
                     name="firstname" id="firstname" icon="fas fa-user-circle">Voornaam:
            </x-input>
            @else
                <x-input value="{{$employee->firstname}}" type="text" name="firstname"
                         id="firstname" icon="fas fa-user-circle">Voornaam:
                </x-input>
                @enderror
        </div>
        <div class="mb-5 md:pr-5">
            @error('lastname')
            <x-input value="{{$employee->lastname}}" error="{{$message}}" type="text"
                     name="lastname" id="lastname" icon="fas fa-user-circle">Achternaam:
            </x-input>
            @else
                <x-input value="{{$employee->lastname}}" type="text" name="lastname"
                         id="lastname" icon="fas fa-user-circle">Achternaam:
                </x-input>
                @enderror
        </div>
        <div class="mb-5 md:pr-5">
            @error('email')
            <x-input value="{{$employee->user->email}}" error="{{$message}}" type="text"
                     name="email" id="email" icon="fas fa-user-circle">Email:
            </x-input>
            @else
                <x-input value="{{$employee->user->email}}" type="text" name="email" id="email"
                         icon="fas fa-user-circle">Email:
                </x-input>
                @enderror
        </div>
        <div class="mb-5 md:pr-5">
            @error('phoneNumber')
            <x-input value="{{$employee->phoneNumber}}" error="{{$message}}" type="text"
                     name="phoneNumber" id="phoneNumber" icon="fas fa-user-circle">
                Telefoonnummer:
            </x-input>
            @else
                <x-input value="{{$employee->phoneNumber}}" type="text" name="phoneNumber"
                         id="phoneNumber" icon="fas fa-user-circle">Telefoonnummer:
                </x-input>
                @enderror
        </div>
        <div class="mb-5 md:pr-5">
            @error('linkedInUrl')
            <x-input value="{{$employee->linkedInUrl}}" error="{{$message}}" type="text"
                     name="linkedInUrl" id="linkedInUrl" icon="fas fa-user-circle">LinkedIn url:
            </x-input>
            @else
                <x-input value="{{$employee->linkedInUrl}}" type="text" name="linkedInUrl"
                         id="linkedInUrl" icon="fas fa-user-circle">LinkedIn url:
                </x-input>
                @enderror
        </div>
    </div>
</div>
