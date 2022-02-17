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

        self::checkIssetBeforeCreate([
            'name' => 'Quản lý xe thuê',
            'code' => 'product',
            'description' => 'Quản lý toàn bộ chức năng liên quan đến xe thuê'
        ]);

        self::checkIssetBeforeCreate([
            'name' => 'Quản lý loại xe',
            'code' => 'category',
            'description' => 'Quản lý toàn bộ chức năng liên quan đến loại xe'
        ]);

        self::checkIssetBeforeCreate([
            'name' => 'Quản lý nhãn hiệu',
            'code' => 'brand',
            'description' => 'Quản lý toàn bộ chức năng liên quan đến nhãn hiệu'
        ]);

        self::checkIssetBeforeCreate([
            'name' => 'Quản lý hợp đồng',
            'code' => 'contract',
            'description' => 'Quản lý toàn bộ chức năng liên quan đến hợp đồng'
        ]);

        self::checkIssetBeforeCreate([
            'name' => 'Quản lý yêu cầu thuê xe',
            'code' => 'order',
            'description' => 'Quản lý toàn bộ chức năng liên quan đến yêu cầu thuê xe'
        ]);

        self::checkIssetBeforeCreate([
            'name' => 'Quản lý báo cáo thống kê',
            'code' => 'statistic',
            'description' => 'Quản lý toàn bộ chức năng liên quan đến báo cáo thống kê'
        ]);

        self::checkIssetBeforeCreate([
            'name' => 'Quản lý khách hàng',
            'code' => 'customer',
            'description' => 'Quản lý toàn bộ chức năng liên quan đến khách hàng'
        ]);

        self::checkIssetBeforeCreate([
            'name' => 'Quản lý tài khoản',
            'code' => 'customer',
            'description' => 'Quản lý toàn bộ chức năng liên quan đến tài khoản'
        ]);

        self::checkIssetBeforeCreate([
            'name' => 'Quản lý vai trò',
            'code' => 'role',
            'description' => 'Quản lý toàn bộ chức năng liên quan đến vai trò'
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
