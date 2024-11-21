<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Models\Role;

class UserController extends Controller implements HasMiddleware
{
    static function  middleware(){
        return [
            new Middleware("can:list-user", only: ["index", "show"]),
            new Middleware("can:create-user", only: ["create", "store"]),
            new Middleware("can:edit-user", only: ["edit", "update"]),
            new Middleware("can:delete-user", only: ["destory"]),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = UserResource::collection(User::get());
        return inertia("User/index",
        compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::get();
        return inertia("User/create", 
        compact("roles"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        $role = Role::findById($request->role_id);
        $user->assignRole($role);
        return to_route("users.index")->with("message", "User Stored");
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::get();
        $user->load('roles');
        $user->role_id = $user->roles->pluck('id')->first();    
        return inertia("User/edit",
            compact("user", "roles"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
