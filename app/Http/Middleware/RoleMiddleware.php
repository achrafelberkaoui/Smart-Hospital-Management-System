<?php

namespace App\Http\Middleware;

use App\services\RoleService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function __construct(protected RoleService $roleService)
    {
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $roles): Response
    {
        $rolesArray = explode('|', $roles);
        if(!$request->user() || !$this->roleService->hasRole($request->user(), $rolesArray)){
            abort(403, 'Acces denied');
        }
        return $next($request);
    }
}
