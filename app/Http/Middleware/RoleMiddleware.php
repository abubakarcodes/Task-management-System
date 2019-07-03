<?php

namespace App\Http\Middleware;

use Closure;
use App\Helpers\helpers;
use Toast;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next , $allowedRoles)
    {
         if (auth()->check()) {
            // If this route allows everyone (who logged in)
            if ($allowedRoles == '*') {
                return $next($request);
            }

            $allowedRoles = explode('|', $allowedRoles);

            // If the logged in user has one of the allowed roles
            if (in_array($request->user()->user_type, $allowedRoles)) {
            //if ($request->user()->hasRole($allowedRoles)) {
                return $next($request);
            } else {

                // if(getUser()->user_type =='customer'){
                //     return redirect()->route('customer.dashboard');
                // }
                if(getUser()->user_type == 'employee'){
                    
                    Toast::error('You are not allowed to access the requested page');
                    return redirect()->back();
                }

                    Toast::error('You are not allowed to access the requested page');
                return redirect()->back();
            }
        } else {
             
            return $next($request);
        }

    }
}
