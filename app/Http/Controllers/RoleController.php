<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoleRequest;
use App\Http\Resources\PermissionResource;
use App\Http\Resources\RoleResource;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = RoleResource::collection(Role::get());
        return inertia("Role/index", 
    compact("roles"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = PermissionResource::collection(Permission::get());
        return inertia("Role/create", [
            "permissions" => $permissions
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRoleRequest $request)
    {
        $role = Role::create($request->validated());
        $role->syncPermissions($request->permissions);
        return to_route("roles.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role = new RoleResource(Role::findById($id));
        return inertia("Role/show",
    compact("role"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = new RoleResource(Role::findById($id));
        $role->load('permissions');
        $permissions = PermissionResource::collection(Permission::get());
        return inertia("Role/edit",
    compact("role", "permissions"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateRoleRequest $request, string $id)
    {
        $role = Role::findById($id);
        $role->update($request->validated());
        $role->syncPermissions($request->permissions);
        return to_route("roles.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::findById($id);
        $role->delete();
        return to_route("roles.index");
    }
}
