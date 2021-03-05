<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RegistrationController extends Controller
{
    //Create returns a view with a form on which input can be delivered
    public function index() {
        $viewname = 'viewnameregistrationform';

        if(view()->exists($viewname)) {
            return view($viewname /*, ['parameter' -> value]*/);
        }
        else {
            abort(404);
        }
    }

    //Store makes sure the input from the form is passed to a method which handles storage
    public function store(Request $request /*, Form info*/) {
        //Retrieve and store request data
        
        //Access the model to save changes

    }
}
