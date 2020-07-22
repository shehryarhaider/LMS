<?php
use App\Configuration;
use App\Menu;
use App\Permission;
use App\Role;
use App\ActionHistroy;
use Illuminate\Http\Request;

/**
 * @param \Illuminate\Http\Request $request
 * @return \Illuminate\Http\Response
 */
function getCurrentMenuId(Request $request) {
    return Menu::where('route' , $request->route()->getName())->select('id')->first()->id;
}

/**
 * @param $route
 * @return \Illuminate\Http\Response
 */
function getCurrentMenuIdByRouteName($route) {
    return Menu::where('route' , $route)->select('id')->first()->id;
}

function getMenus()
{
    return Menu::where('status',1)->get()->sortBy('sort');
}

function getAllPermissions()
{
    return Permission::all();
}

/**
 * @param App\User $roleId
 */
function getUserRoleMenus($roleId)
{
    return Role::findOrFail($roleId)->menus()->where('status',1)->get()->sortBy('sort');
}

/**
 * @param App\User $roleId
 */
function getUserRoleMenusForMiddleware()
{
    $roleId = Auth::user()->role_id;
    return Role::findOrFail($roleId)->menus()->where('status',1)->get()->sortBy('sort')->pluck('route')->toArray();
}

/**
 * returns the name of permissions in an array
 *
 * @param App\User $roleId
 */
function getUserRolePermissions($roleId, $menu_id)
{
    return Role::findOrFail($roleId)->permissions()->where('menu_id', $menu_id)->pluck('name')->toArray();
}

/**
 * returns the route of permissions in an array
 *
 * @param App\User $roleId
 */
function getUserRolePermissionsForMiddleware()
{
    $roleId = Auth::user()->role_id;
    return Role::findOrFail($roleId)->permissions()->pluck('route')->toArray();
}

/**
 * gets the permissions data for displaying on the front end.
 *
 * @param $menu_id
 * @return Array
 */
function getFrontEndPermissionsSetup($menu_id)
{
    $permission = Auth::user()->user_type == 0 || Auth::user()->user_type == 2 ? "is_admin" : getUserRolePermissions(Auth::user()->role_id, $menu_id);

    $count = 0;

    if ($permission == "is_admin") {
        $count = 2;
    } else if (count($permission) > 0) {
        $count = in_array('edit', $permission) ? $count += 1 : $count;
        $count = in_array('delete', $permission) ? $count += 1 : $count;
        $count = in_array('status', $permission) ? $count += 1 : $count;
        $count = in_array('download', $permission) ? $count += 1 : $count;
        $count = in_array('highlight-edit', $permission) ? $count += 1 : $count;
        $count = in_array('highlight-status', $permission) ? $count += 1 : $count;
        $count = in_array('highlight-delete', $permission) ? $count += 1 : $count;
        $count = in_array('import', $permission) ? $count += 1 : $count;
        $count = in_array('import-add', $permission) ? $count += 1 : $count;
        $count = in_array('import-edit', $permission) ? $count += 1 : $count;
        $count = in_array('import-delete', $permission) ? $count += 1 : $count;
    }

    return [
        'permissions' => $permission,
        'count' => $count,
    ];
}

/**
 * return the value of a configuration
 *
 * @param String @key
 * @return String
 */
function getConfig($key)
{
    return Cache::rememberForever($key, function () use($key) {
        return Configuration::select('value')->where('key', $key)->first()->value;
    });
}

/**
 * Logs the CRUD action into the database
 *
 * @param \Illuminate\Http\Request $request
 * @return \Illuminate\Http\Response
 */
function logAction(Request $request)
{
    // return 0;
    if (!$request->isMethod('GET')) {

        $permission = Permission::where('route', $request->route()->getName())->first();
        if (!$permission) {
            // get the previous route and replace it with the base url to only get web.php
            // defined urls
            $previous = str_replace(url('/'), '', url()->previous());
            //https://stackoverflow.com/questions/40690202/previous-route-name-in-laravel-5-1-5-6
            $routeName = app('router')->getRoutes()->match(app('request')->create($previous))->getName();
            $permission = Permission::where('route', $routeName)->first();
        }

        if (!$permission) {
            //exit the function
            return 0;
        }

        $log = new ActionHistroy;
        $log->user_id = Auth::user()->id;
        $log->menu_id = $permission->menu_id;
        $log->permission_id = $permission->id;
        $log->user_name = Auth::user()->name;
        $log->menu_name = $permission->menus->name ?? $permission->name;
        $log->permission_name = $permission->name;
        $log->datetime = now()->toDateTimeString();

        $log->save();

        //exit the function
        return 0;
    }
}
