<?php

namespace App\Http\Middleware;

use Closure;
use App\Permission;

class AssignRole
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
		// Assign Permissions to Auth
		$type = \Auth::user()->type;
		$permissions = Permission::where("role_id", $type)->get()->toarray();
		\Auth::user()->permissions = array_column($permissions, 'permission');
		
        return $next($request);
    }
}
