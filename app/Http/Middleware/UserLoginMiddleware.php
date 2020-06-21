<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class UserLoginMiddleware
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
        if(Auth::check())
        {
            $user = Auth::user();
            if($user->role === 0)
            {
                return $next($request);  
            }
            else 
            {
                
                return redirect('front/login')->with('fail','Đăng nhập thất bại');
            }
              
        }
        else 
        {
            return redirect('front/login');
        }
        
        
    }
}
