<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class KhotbaPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$id)
    {
        
        $user = $request->user();
        if($user->hasPermission($id)){
            return $next($request);
        }
        abort(403);
    }
}
