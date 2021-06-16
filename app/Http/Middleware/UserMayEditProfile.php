<?php

namespace App\Http\Middleware;

use App\Http\Controllers\EmployeeController;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMayEditProfile
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::user()->isAdmin() && $request->getUri() != env('APP_URL') . 'employee/' . Auth::id() . '/edit')
            return redirect('home');

        return $next($request);
    }
}
