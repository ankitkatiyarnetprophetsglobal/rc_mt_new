<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class CustomLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {   
        if(Session::has('user')){
            if(Session::get('user')->token_expire_time <= time()){
                $request->session()->forget('user');
                $request->session()->forget('role_details');
                $request->session()->forget('token');
                if($request->ajax()){
                    return response()->json(['success' => false, 'error_code' => 401,'url' => route('login')]);
                }
                return redirect()->route('login');
             }
            return $next($request);
        }
        return redirect()->route('login');
        
    }
}
