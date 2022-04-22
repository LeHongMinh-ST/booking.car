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
            'code' => 'post-index',
            'name' => 'Xem danh sách danh mục bài viết',
            'group_code' => 'post',
            'description' => 'Có quyền xem danh sách danh mục bài viết'
        ]);

        self::checkIssetBeforeCreate([
            'code' => 'post-create',
            'name' => 'Tạo mới bài viết',
            'group_code' => 'post',
            'description' => 'Có quyền tạo mới bài viết'
        ]);

        self::checkIssetBeforeCreate([
            'code' => 'post-update',
            'name' => 'Cập nhật bài viết',
            'group_code' => 'post',
            'description' => 'Có quyền cập nhật vài viết'
        ]);

        self::checkIssetBeforeCreate([
            'code' => 'post-delete',
            'name' => 'Xoá bài viết',
            'group_code' => 'post',
            'description' => 'Có quyền xoá bài viết'
        ]);

        self::checkIssetBeforeCreate([
            'code' => 'category-post-index',
            'name' => 'Xem danh sách danh mục bài viết',
            'group_code' => 'category-post',
            'description' => 'Có quyền xem danh sách danh mục bài viết'
        ]);

        self::checkIssetBeforeCreate([
            'code' => 'category-post-create',
            'name' => 'Tạo mới danh mục bài viết',
            'group_code' => 'category-post',
            'description' => 'Có quyền tạo mới danh mục bài viết'
        ]);

        self::checkIssetBeforeCreate([
            'code' => 'category-post-update',
            'name' => 'Cập nhật danh mục bài viết',
            'group_code' => 'category-post',
            'description' => 'Có quyền cập nhật danh mục vài viết'
        ]);

        self::checkIssetBeforeCreate([
            'code' => 'category-post-delete',
            'name' => 'Xoá                                                                                                                                       danh mục bài viết',
            'group_code' => 'category-post',
            'description' => 'Có quyền xoá danh mục bài viết'
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

        self::checkIssetBeforeCreate([
            'code' => 'account-index',
            'name' => 'Xem danh sách tài khoản',
            'group_code' => 'account',
            'description' => 'Có quyền xem danh sách tài khoản'
        ]);

        self::checkIssetBeforeCreate([
            'code' => 'account-create',
            'name' => 'Tạo mới tải khoản',
            'group_code' => 'account',
            'description' => 'Có quyền tạo mới tài khoản'
        ]);

        self::checkIssetBeforeCreate([
            'code' => 'account-update',
            'name' => 'Cập nhật tài khoản',
            'group_code' => 'account',
            'description' => 'Có quyền cập nhật tài khoản'
        ]);

        self::checkIssetBeforeCreate([
            'code' => 'account-delete',
            'name' => 'Xoá tài khoản',
            'group_code' => 'account',
            'description' => 'Có quyền xoá tài khoản'
        ]);

        self::checkIssetBeforeCreate([
            'code' => 'order-index',
            'name' => 'Xem danh sách yêu cầu',
            'group_code' => 'order',
            'description' => 'Có quyền xem danh sách yêu cầu'
        ]);

        self::checkIssetBeforeCreate([
            'code' => 'order-create',
            'name' => 'Tạo mới yêu cầu',
            'group_code' => 'order',
            'description' => 'Có quyền tạo mới yêu cầu'
        ]);

        self::checkIssetBeforeCreate([
            'code' => 'order-update',
            'name' => 'Cập nhật yêu cầu',
            'group_code' => 'order',
            'description' => 'Có quyền cập nhật yêu cầu'
        ]);

        self::checkIssetBeforeCreate([
            'code' => 'order-approved',
            'name' => 'Duyệt yêu cầu',
            'group_code' => 'order',
            'description' => 'Có duyệt yêu cầu'
        ]);

        self::checkIssetBeforeCreate([
            'code' => 'order-delete',
            'name' => 'Xoá yêu cầu',
            'group_code' => 'order',
            'description' => 'Có quyền xoá yêu cầu'
        ]);

        self::checkIssetBeforeCreate([
            'code' => 'contract-index',
            'name' => 'Xem danh sách hợp đồng',
            'group_code' => 'contract',
            'description' => 'Có quyền xem danh sách hợp đồng'
        ]);

        self::checkIssetBeforeCreate([
            'code' => 'contract-create',
            'name' => 'Tạo mới hợp đồng',
            'group_code' => 'contract',
            'description' => 'Có quyền tạo mới hợp đồng'
        ]);

        self::checkIssetBeforeCreate([
            'code' => 'contract-update',
            'name' => 'Cập nhật hợp đồng',
            'group_code' => 'contract',
            'description' => 'Có quyền cập nhật hợp đồng'
        ]);

        self::checkIssetBeforeCreate([
            'code' => 'contract-delete',
            'name' => 'Xoá hợp đồng',
            'group_code' => 'contract',
            'description' => 'Có quyền xoá hợp đồng'
        ]);

        self::checkIssetBeforeCreate([
            'code' => 'customer-index',
            'name' => 'Xem danh sách khách hàng',
            'group_code' => 'customer',
            'description' => 'Có quyền xem danh sách khách hàng'
        ]);

        self::checkIssetBeforeCreate([
            'code' => 'customer-create',
            'name' => 'Tạo mới khách hàng',
            'group_code' => 'customer',
            'description' => 'Có quyền tạo mới khách hàng'
        ]);

        self::checkIssetBeforeCreate([
            'code' => 'customer-update',
            'name' => 'Cập nhật khách hàng',
            'group_code' => 'customer',
            'description' => 'Có quyền cập nhật khách hàng'
        ]);

        self::checkIssetBeforeCreate([
            'code' => 'customer-delete',
            'name' => 'Xoá khách hàng',
            'group_code' => 'customer',
            'description' => 'Có quyền xoá khách hàng'
        ]);

        self::checkIssetBeforeCreate([
            'code' => 'customer-reset-password',
            'name' => 'Đặt mật khẩu tài khoản khách hàng',
            'group_code' => 'customer',
            'description' => 'Có quyền đặt mật khẩu tài khoản khách hàng'
        ]);

        self::checkIssetBeforeCreate([
            'code' => 'statistic-revenue',
            'name' => 'Xem thống kê doanh thu',
            'group_code' => 'statistic',
            'description' => 'Có quyền xem thống kê doanh thu'
        ]);

        self::checkIssetBeforeCreate([
            'code' => 'statistic-product',
            'name' => 'Xem thống kê xe',
            'group_code' => 'statistic',
            'description' => 'Có quyền xem thống kê xe'
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
