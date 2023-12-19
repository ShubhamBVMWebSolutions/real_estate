<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use RealRashid\SweetAlert\Facades\Alert;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user() != null) {
            if(auth()->user()->is_admin == 1){
                Alert::success("Login Successfull","Welcome To the Dashboard");
                return $next($request);
            }
            Alert::error('Un-Authenticated Access', "You Don't have required Previlages");
            return redirect()->back();
        }
         Alert::error('Login Required', 'Please Login or Register First');
         return redirect()->route('login');

    }
}
