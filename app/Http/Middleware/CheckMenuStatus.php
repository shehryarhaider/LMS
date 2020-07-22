<?php

namespace App\Http\Middleware;
use App\Menu;
use Closure;

class CheckMenuStatus
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
        $menu = Menu::where('route',$request->route()->getName())->first();


        if($menu == null)
        {
            return $next($request);
        }

        if( $menu->status == 0 || $menu->father != null && $menu->father->status == 0)
        {
            return redirect('/404');
        }

        return $next($request);
    }
}
