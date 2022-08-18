@component('mail::message')

# Er is een account voor u aangemaakt bij Smoelenboek
Welkom bij Smoelenboek. Uw inloggegevens zijn:<br/>
Email: {{$user->email}} <br/>
Wachtwoord: {{$password}}

@component('mail::button',['url'=>$url])
Inloggen bij Smoelenboek
@endcomponent

@endcomponent
