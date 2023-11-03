<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Role $role)
    {
        $permissions = Permission::query()->get();

        return view('role.permission.index', [
            'role' => $role,
            'permissions' => $permissions,
        ]);
    }

    public function store(Request $request, Role $role)
    {
        $perm = collect($request->permissions);

        $permIds = $perm->filter(fn($p) => $p === 'on')->keys();
        $role->permissions()->sync($permIds);

        return redirect()->route('roles.permissions.index', $role);
    }
}
