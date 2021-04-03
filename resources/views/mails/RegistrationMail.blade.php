@component('mail::message')

# Er is een acount voor je aangemaakt voor Smoelenboek 
Welkom bij Smoelenboek uw login gegevens zijn:<br/>
Gebruikersnaam: {{$user->email}} <br/>
Wachtwoord: {{$password}}

@component('mail::button',['url'=>$url])
login bij Smoelenboek
@endcomponent

@endcomponent