<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    protected function sendResetLinkResponse($response)
    {
        return redirect()->route('login')->with('message', 'Email is verstuurd');
    }

    public function showLinkRequestForm()
    {
        $user = auth()->user();

        if($user != null)
            return redirect()->route('home');

        return view('auth.passwords.email');
    }


}
