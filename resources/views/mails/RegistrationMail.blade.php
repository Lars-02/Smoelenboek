@component('mail::message')

# Er is een inlog voor je aangemaakt voor Smoelenboek 
Welkom bij smoelenboek uw login gegevens zijn:<br/>
Gebruikersnaam: {{$user->email}} <br/>
Wachtwoord: {{$password}}

@component('mail::button',['url'=>$url])
login bij smoelenboek
@endcomponent

@endcomponent