<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="{{ route('admin.index') }}"><img src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li
                    class="sidebar-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }} ">
                    <a href="{{ route('admin.dashboard') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Bảng điều khiển</span>
                    </a>
                </li>
                <li class="sidebar-title">Tài nguyên</li>

                <li class="sidebar-item  {{ request()->routeIs('admin.product*') ? 'active' : '' }} ">
                    <a href="{{ route('admin.product') }}" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Quản lý xe thuê</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->routeIs('admin.brand*') ? 'active' : '' }}">
                    <a href="{{ route('admin.brand') }}" class='sidebar-link'>
                        <i class="bi bi-collection-fill"></i>
                        <span>Quản lý nhãn hiệu</span>
                    </a>
                </li>

                <li
                    class="sidebar-item {{ request()->routeIs('admin.category-product*') ? 'active' : '' }}">
                    <a href="{{ route('admin.category-product') }}" class='sidebar-link'>
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>Quản lý loại xe</span>
                    </a>
                </li>

                <li class="sidebar-title">Hợp đồng & Khách hàng</li>

                <li
                    class="sidebar-item  {{ request()->routeIs('admin.contract*') ? 'active' : '' }}">
                    <a href="{{ route('admin.contract') }}" class='sidebar-link'>
                        <i class="bi bi-file-earmark-medical-fill"></i>
                        <span>Quản lý hợp đồng</span>
                    </a>
                </li>

                <li
                    class="sidebar-item {{ request()->routeIs('admin.order*') ? 'active' : '' }}">
                    <a href="{{ route('admin.order') }}" class='sidebar-link'>
                        <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                        <span>Yêu cầu thuê xe</span>
                    </a>
                </li>

                <li
                    class="sidebar-item {{ request()->routeIs('admin.customer*') ? 'active' : '' }}">
                    <a href="{{ route('admin.customer') }}" class='sidebar-link'>
                        <i class="bi bi-people-fill"></i>
                        <span>Quản lý khách hàng</span>
                    </a>
                </li>

                <li
                    class="sidebar-item {{ request()->routeIs('admin.contact*') ? 'active' : '' }}">
                    <a href="{{ route('admin.contact') }}" class='sidebar-link'>
                        <i class="bi bi-volume-down"></i>
                        <span>Khách hàng liên hệ</span>
                    </a>
                </li>

                <li class="sidebar-title">Blog</li>

                <li
                    class="sidebar-item {{ request()->routeIs('admin.post*') ? 'active' : '' }}">
                    <a href="{{ route('admin.post') }}" class='sidebar-link'>
                        <i class="bi bi-file-earmark-post"></i>
                        <span>Quản lý bài viết</span>
                    </a>
                </li>

                <li
                    class="sidebar-item {{ request()->routeIs('admin.category-post*') ? 'active' : '' }}">
                    <a href="{{ route('admin.category-post') }}" class='sidebar-link'>
                        <i class="bi bi-folder"></i>
                        <span>Quản lý danh mục</span>
                    </a>
                </li>


                <li class="sidebar-title">Báo cáo thống kê</li>

                <li
                    class="sidebar-item {{ request()->routeIs('admin.statistic.revenue') ? 'active' : '' }} ">
                    <a href="{{ route('admin.statistic.revenue') }}" class='sidebar-link'>
                        <i class="bi bi-bar-chart"></i>
                        <span>Báo cáo doanh thu</span>
                    </a>
                </li>

                <li
                    class="sidebar-item {{ request()->routeIs('admin.statistic.product') ? 'active' : '' }}">
                    <a href="{{ route('admin.statistic.product') }}" class='sidebar-link'>
                        <i class="bi bi-bar-chart-steps"></i>
                        <span>Thống kê loại xe</span>
                    </a>
                </li>

                <li class="sidebar-title">Hệ thống</li>

                <li
                    class="sidebar-item {{ request()->routeIs('admin.account') ? 'active' : '' }} ">
                    <a href="{{ route('admin.account') }}" class='sidebar-link'>
                        <i class="bi bi-person-fill"></i>
                        <span>Tài khoản</span>
                    </a>
                </li>

                <li
                    class="sidebar-item  {{ request()->routeIs('admin.role') ? 'active' : '' }}">
                    <a href="{{ route('admin.role') }}" class='sidebar-link'>
                        <i class="bi bi-life-preserver"></i>
                        <span>Phân quyền</span>
                    </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
