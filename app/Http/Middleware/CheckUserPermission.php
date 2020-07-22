<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CheckUserPermission
{

    /**
     * holds routes that do not need to be checked
     *
     * @var Array
     */
    private $routes = [
        'users.settings'
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (Auth::user()->user_type == 0 || Auth::user()->user_type == 2 || !$request->isMethod('GET')) {
            return $next($request);
        } else {
            //used from helpers.php
            $menu = getUserRoleMenusForMiddleware();
            //used from helpers.php
            $permission = getUserRolePermissionsForMiddleware();

            $route = $request->route()->getName();

            $url = url()->current();

            $permission = array_merge($permission,$this->routes);

            if (in_array($route, $permission) || in_array($route, $menu) || strpos($url , "pages/") !== false)
            {
                return $next($request);
            } else {
                return redirect('/');
            }

        }

    }
}
