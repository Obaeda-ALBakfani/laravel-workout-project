<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class TraineeMiddleware
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
      $user_role =auth()->user()->role;
      if($user_role =='guest'){
        return response()->json(['message'=>'not allowed..you are not sign_up as a trainee..  '],401);
    }
}catch(\Exception $e){
    return response()->json(['message'=>'an error occured in trainee auth']);
}
        return $next($request);
    }
}
        
    

