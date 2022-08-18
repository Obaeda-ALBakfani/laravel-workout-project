<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
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
        try{
      $admin_role =auth()->user()->role;
      if($admin_role != 'admin'){
        return response()->json(['message'=>'not allowed .. you are not Admin'],401);
    }
}catch(\Exception $e){
    return response()->json(['message'=>'an error occured in admin auth']);
}
        return $next($request);
    }
}
