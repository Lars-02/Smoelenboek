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
        if($request->user()->employee->id != Auth::user()->id && !Auth::user()->isAdmin())
            return redirect('home');

        return $next($request);
    }
}
