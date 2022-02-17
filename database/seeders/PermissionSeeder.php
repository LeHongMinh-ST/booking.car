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

        self::checkIssetBeforeCreate([
            'code' => 'dashboard-index',
            'name' => 'Xem Trang bảng điều khiển',
            'group_code' => 'dashboard',
            'description' => 'Có quyền xem Trang bảng điều khiển'
        ]);

        self::checkIssetBeforeCreate([
            'code' => 'role-index',
            'name' => 'Xem danh sách vai trò',
            'group_code' => 'role',
            'description' => 'Có quyền xem danh sách vai trò'
        ]);

        self::checkIssetBeforeCreate([
            'code' => 'role-create',
            'name' => 'Tạo mới vai trò',
            'group_code' => 'role',
            'description' => 'Có quyền tạo mới vai trò'
        ]);

        self::checkIssetBeforeCreate([
            'code' => 'role-read',
            'name' => 'Xem chi tiết vai trò',
            'group_code' => 'role',
            'description' => 'Có quyền xem chi tiết vai trò'
        ]);

        self::checkIssetBeforeCreate([
            'code' => 'role-update',
            'name' => 'Cập nhật vai trò',
            'group_code' => 'role',
            'description' => 'Có quyền cập nhật vai trò'
        ]);

        self::checkIssetBeforeCreate([
            'code' => 'role-delete',
            'name' => 'Xoá vai trò',
            'group_code' => 'role',
            'description' => 'Có quyền xoá vai trò'
        ]);

        self::checkIssetBeforeCreate([
            'code' => 'product-index',
            'name' => 'Xem danh sách xe thuê',
            'group_code' => 'product',
            'description' => 'Có quyền xem danh sách xe thuê'
        ]);

        self::checkIssetBeforeCreate([
            'code' => 'product-create',
            'name' => 'Tạo mới xe thuê',
            'group_code' => 'product',
            'description' => 'Có quyền tạo mới xe thuê'
        ]);

        self::checkIssetBeforeCreate([
            'code' => 'product-read',
            'name' => 'Xem chi tiết xe thuê',
            'group_code' => 'product',
            'description' => 'Có quyền xem chi tiết xe thuê'
        ]);

        self::checkIssetBeforeCreate([
            'code' => 'product-update',
            'name' => 'Cập nhật xe thuê',
            'group_code' => 'product',
            'description' => 'Có quyền cập nhật xe thuê'
        ]);

        self::checkIssetBeforeCreate([
            'code' => 'product-delete',
            'name' => 'Xoá xe thuê',
            'group_code' => 'product',
            'description' => 'Có quyền xoá xe thuê'
        ]);

        self::checkIssetBeforeCreate([
            'code' => 'category-index',
            'name' => 'Xem danh sách loại xe',
            'group_code' => 'category',
            'description' => 'Có quyền xem danh sách loại xe'
        ]);

        self::checkIssetBeforeCreate([
            'code' => 'category-create',
            'name' => 'Tạo mới loại xe',
            'group_code' => 'category',
            'description' => 'Có quyền tạo mới loại xe'
        ]);

        self::checkIssetBeforeCreate([
            'code' => 'category-update',
            'name' => 'Cập nhật loại xe',
            'group_code' => 'category',
            'description' => 'Có quyền cập nhật loại xe'
        ]);

        self::checkIssetBeforeCreate([
            'code' => 'category-delete',
            'name' => 'Xoá vai loại xe',
            'group_code' => 'category',
            'description' => 'Có quyền xoá loại xe'
        ]);

        self::checkIssetBeforeCreate([
            'code' => 'brand-index',
            'name' => 'Xem danh sách nhãn hiệu',
            'group_code' => 'brand',
            'description' => 'Có quyền xem danh sách nhãn hiệu'
        ]);

        self::checkIssetBeforeCreate([
            'code' => 'brand-create',
            'name' => 'Tạo mới nhãn hiệu',
            'group_code' => 'brand',
            'description' => 'Có quyền tạo mới nhãn hiệu'
        ]);

        self::checkIssetBeforeCreate([
            'code' => 'brand-update',
            'name' => 'Cập nhật nhãn hiệu',
            'group_code' => 'brand',
            'description' => 'Có quyền cập nhật nhãn hiệu'
        ]);

        self::checkIssetBeforeCreate([
            'code' => 'brand-delete',
            'name' => 'Xoá vai nhãn hiệu',
            'group_code' => 'brand',
            'description' => 'Có quyền xoá nhãn hiệu'
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
