<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use App\Http\Resources\PermissionResource;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = PermissionResource::collection(Permission::get());
        return inertia("Permission/index",
    compact("permissions"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia("Permission/create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PermissionRequest $request)
    {
        Permission::create($request->validated());
        return to_route("permissions.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $permission = new PermissionResource(Permission::findById($id));
        return inertia("Permission/show",
    compact("permission"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permission = new PermissionResource(Permission::findById($id));
        return inertia("Permission/edit",
    compact("permission"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PermissionRequest $request, string $id)
    {
        $permission = Permission::findById($id);
        $permission->update($request->validated());
        return to_route("permissions.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permission = Permission::findById($id);
        $permission->delete();
        return to_route("permissions.index");
    }
}
