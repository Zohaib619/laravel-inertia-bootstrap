<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(["name" => "admin"]);
        Role::create(["name" => "moderator"]);
        Role::create(["name" => "user"]);

        $permissions = [
            "user.list",
            "user.create",
            "user.edit",
            "user.delete"
        ];

        foreach($permissions as $permission){
            Permission::create(["name" => $permission]);
        }
        $admin->syncPermissions(Permission::get());
    }
}
