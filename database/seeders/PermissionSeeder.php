<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        self::checkIssetBeforeCreate([
            'code' => 'super-admin',
            'name' => 'Toàn bộ quyền',
            'group_code' => null,
            'description' => 'Có toàn quyền sử dụng hệ thống'
        ]);
    }
    public function checkIssetBeforeCreate($data) {
        $permission = Permission::where('code', $data['code'])->first();
        if (empty($permission)) {
            Permission::create($data);
        } else {
            $permission->update($data);
        }
    }

}
