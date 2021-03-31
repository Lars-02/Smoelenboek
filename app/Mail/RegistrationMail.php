<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class RegistrationMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $password;
    public $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, String $password)
    {
        $this->user = $user;
        $this->password = $password;
        $this->url = route('login');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "registratie smoelenboek";
        return $this->markdown('mails.RegistrationMail')->subject($subject);
    }
}
