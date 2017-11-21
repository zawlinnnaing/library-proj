<?php

namespace App\Http\Middleware;
 
use Illuminate\Support\Facades\Auth;

use Closure;

class AdminAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
    if ($request->email == 'admin@mtu.com'){
        if ( (Auth::attempt(['email' => $request->email, 'password' => $request->password])))
        {
            return redirect('admin/panel');
        }
    }
        // return "You don't have permission to access this page";
        return $next($request);
    }
}
