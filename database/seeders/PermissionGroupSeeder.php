<?php

namespace Database\Seeders;

use App\Models\GroupPermission;
use App\Models\PermissionGroup;
use Illuminate\Database\Seeder;

class PermissionGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        self::checkIssetBeforeCreate([
            'name' => 'Tổng quan',
            'code' => 'dashboard',
            'description' => 'Quản lý toàn bộ chức năng liên quan đến tổng quan'
        ]);
    }

    public function checkIssetBeforeCreate($data) {
        $groupPermission = GroupPermission::where('code', $data['code'])->first();
        if (empty($groupPermission)) {
            GroupPermission::create($data);
        } else {
            $groupPermission->update($data);
        }
    }
}
