<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();

        $permission = Permission::where('code', 'super-admin')->first();
        $role = Role::create([
            'name' => 'Super Admin',
            'description' => 'Quản trị hệ thống',
        ]);
        $role->permissions()->attach($permission->_id);
        $admin = Admin::where('email', 'superadmin@gmail.vn')->first();
        if ($admin) {
            $admin->role_id = $role->id;
            $admin->save();
        }
    }
}
