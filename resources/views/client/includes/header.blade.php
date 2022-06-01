<div class="header_style_wrapper">

    <!-- Begin top bar -->
    <div class="above_top_bar">
        <div class="page_content_wrapper">

            <div class="social_wrapper" style="    line-height: 44px;">
                @if(auth()->check())
                    <div class="company_address">
                        <div class="top_contact_address">
                            <a href="{{ route('customer.order') }}">Xin chào {{ auth()->user()->name }}</a> |
                            <a href="{{ route('logout') }}" >Đăng xuất</a>
                        </div>
                    </div>

                @else
                    <div class="company_address">
                        <div class="top_contact_address">
                            <a href="{{ route('login.form') }}">Đăng Nhập</a> |
                            <a href="{{ route('register.form') }}">Đăng Ký</a>
                        </div>
                    </div>
                @endif
            </div>
            <div class="top_contact_info">
                <div class="company_address">
                    <div id="top_contact_address"><span class="ti-location-pin"></span>Trâu Quỳ, Gia Lâm, Hà Nội</div>
                </div>
                <div>
                    <div id="top_contact_number"><a href="tel:1.800.456.6743"><span class="ti-mobile"></span>035 599
                            9555</a></div>
                </div>
                <div>
                    <div id="top_contact_hours"><span class="ti-alarm-clock"></span>Thứ 2 - Thứ 6 09.00 - 17.00</div>
                </div>
            </div>
            <br class="clear"/>
        </div>
    </div>
    <!-- End top bar -->
    <div class="top_bar hasbg">
        <div class="standard_wrapper">
            <!-- Begin logo -->
            <div id="logo_wrapper">

                <div id="logo_normal" class="logo_container">
                    <div class="logo_align">
                        <a id="custom_logo" class="logo_wrapper hidden" href="{{ route('home') }}">
                            <img src="{{ asset('client/images/logo@2x_white.png') }}" alt="" width="175" height="24"/>
                        </a>
                    </div>
                </div>

                <div id="logo_transparent" class="logo_container">
                    <div class="logo_align">
                        <a id="custom_logo_transparent" class="logo_wrapper default" href="{{ route('home') }}">
                            <img src="{{ asset('client/images/logo@2x_white.png') }}" alt="" width="175" height="24"/>
                        </a>
                    </div>
                </div>
                <!-- End logo -->

                <div id="menu_wrapper">
                    <div id="nav_wrapper">
                        <div class="nav_wrapper_inner">
                            <div id="menu_border_wrapper">
                                <div class="menu-main-menu-container">
                                    <ul id="main_menu" class="nav">
                                        <li class="menu-item {{ request()->is('/') ? 'current-menu-item' : '' }}  menu-item-has-children">
                                            <a href="{{ route('home') }}">Trang chủ</a></li>
                                        <li class="menu-item {{ request()->is('/about') ? 'current-menu-item' : '' }} menu-item-has-children">
                                            <a href="{{ route('about') }}">Giới thiệu</a></li>
                                        <li class="menu-item  {{ request()->is('/service') ? 'current-menu-item' : '' }} menu-item-has-children">
                                            <a href="{{ route('service') }}">Dịch vụ</a></li>
                                        <li class="menu-item  {{ request()->is('/products') ? 'current-menu-item' : '' }} menu-item-has-children">
                                            <a href="{{ route('products') }}">Thuê xe</a></li>
                                        <li class="menu-item  {{ request()->is('/about') ? 'current-menu-item' : '' }} menu-item-has-children arrow">
                                            <a href="{{ route('products') }}">Danh mục xe</a>
                                            @include('client.includes.menu-categories', ['categories' => $menuCategories])
                                        </li>
                                        <li class="menu-item menu-item-has-children arrow"><a
                                                    href="{{ route('products') }}">Nhãn hiệu</a>
                                            <ul class="sub-menu">
                                                @foreach($menuBrands as $brand)
                                                    <li class="menu-item"><a
                                                                href="{{ route('product-by-brand', $brand->slug ?? "") }}">{{ $brand->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li class="menu-item {{ request()->is('/blog') ? 'current-menu-item' : '' }} menu-item-has-children">
                                            <a href="{{ route('blog') }}">Bài viết</a></li>
                                        <li class="menu-item  {{ request()->is('/contact') ? 'current-menu-item' : '' }} menu-item-has-children">
                                            <a href="{{ route('contact') }}">Liên hệ</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Begin right corner buttons -->
                    {{--                        <div id="logo_right_button">--}}

                    {{--                            <!-- Begin side menu -->--}}
                    {{--                            <a href="javascript:;" id="mobile_nav_icon"><span class="ti-menu"></span></a>--}}
                    {{--                            <!-- End side menu -->--}}
                    {{--                        </div>--}}
                    <!-- End right corner buttons -->
                    </div>
                    <!-- End main nav -->
                </div>

            </div>
        </div>
    </div>
</div>
