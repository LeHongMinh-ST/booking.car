<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use App\Models\Role;
use Closure;
use Illuminate\Http\Request;

class PermissionUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \never
     */
    public function handle(Request $request, Closure $next, $codePermission)
    {
        try {
            $user = Auth::user();
            $role = Role::find($user->role_id);
            if ($role->permissions) {
                $isSuperAdmin = $this->hasPermission($role, 'super-admin');
                $isAdmin = $this->hasPermission($role, 'admin');
                if ($isSuperAdmin || $isAdmin) {
                    return $next($request);
                }

                $isPermission = $this->hasPermission($role, $codePermission);
                if ($isPermission) {
                    return $next($request);
                }
            }
            return abort(403);
        } catch (Exception $e) {
            Log::error('Error middleware permission for user', [
                'method' => __METHOD__,
                'message' => $e->getMessage()
            ]);

            return $this->responseError();
        }
    }

    private function hasPermission($role, $codePermission)
    {
        $idPermission = Permission::where('code', $codePermission)->first();
        return $role->permissions->contains($idPermission->id);
    }
}
