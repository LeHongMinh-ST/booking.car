<div class="header_style_wrapper">

    <!-- Begin top bar -->
    <div class="above_top_bar">
        <div class="page_content_wrapper">

            <div class="social_wrapper">
                <ul>
                    <li class="facebook"><a target="_blank" href="#"><i class="fa fa-facebook-official"></i></a></li>
                    <li class="twitter"><a target="_blank" href="http://twitter.com/#"><i class="fa fa-twitter"></i></a></li>
                    <li class="youtube"><a target="_blank" title="Youtube" href="#"><i class="fa fa-youtube"></i></a></li>
                    <li class="pinterest"><a target="_blank" title="Pinterest" href="http://pinterest.com/#"><i class="fa fa-pinterest"></i></a></li>
                    <li class="instagram"><a target="_blank" title="Instagram" href="http://instagram.com/theplanetd"><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div>
            <div class="top_contact_info">
                <div class="company_address">
                    <div id="top_contact_address"><span class="ti-location-pin"></span>Trâu Quỳ, Gia Lâm, Hà Nội</div>
                </div>
                <div>
                    <div id="top_contact_number"><a href="tel:1.800.456.6743"><span class="ti-mobile"></span>035 599 9555</a></div>
                </div>
                <div>
                    <div id="top_contact_hours"><span class="ti-alarm-clock"></span>Thứ 2 - Thứ 6 09.00 - 17.00</div>
                </div>
            </div>
            <br class="clear" />
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
                            <img src="{{ asset('client/images/logo@2x_white.png') }}" alt="" width="175" height="24" />
                        </a>
                    </div>
                </div>

                <div id="logo_transparent" class="logo_container">
                    <div class="logo_align">
                        <a id="custom_logo_transparent" class="logo_wrapper default" href="{{ route('home') }}">
                            <img src="{{ asset('client/images/logo@2x_white.png') }}" alt="" width="175" height="24" />
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
                                        <li class="menu-item {{ request()->is('/') ? 'current-menu-item' : '' }}  menu-item-has-children"><a href="{{ route('home') }}">Trang chủ</a></li>
                                        <li class="menu-item {{ request()->is('/about') ? 'current-menu-item' : '' }} menu-item-has-children"><a href="{{ route('about') }}">Giới thiệu</a></li>
                                        <li class="menu-item  {{ request()->is('/service') ? 'current-menu-item' : '' }} menu-item-has-children"><a href="{{ route('service') }}">Dịch vụ</a></li>
                                        <li class="menu-item  {{ request()->is('/products') ? 'current-menu-item' : '' }} menu-item-has-children"><a href="{{ route('products') }}">Thuê xe</a></li>
                                        <li class="menu-item  {{ request()->is('/about') ? 'current-menu-item' : '' }} menu-item-has-children arrow"><a href="#">Danh mục xe</a>
                                            <ul class="sub-menu">
                                                <li class="menu-item menu-item-has-children arrow"><a href="car-list-right-sidebar.html">Car List Sidebar</a>
                                                    <ul class="sub-menu">
                                                        <li class="menu-item"><a href="car-list-right-sidebar.html">Right Sidebar</a></li>
                                                        <li class="menu-item"><a href="car-list-left-sidebar.html">Left Sidebar</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item menu-item-has-children arrow"><a href="car-list-thumbnail-right-sidebar.html">Car List Thumbnail Sidebar</a>
                                                    <ul class="sub-menu">
                                                        <li class="menu-item"><a href="car-list-thumbnail-right-sidebar.html">Right Sidebar</a></li>
                                                        <li class="menu-item"><a href="car-list-thumbnail-left-sidebar.html">Left Sidebar</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item menu-item-has-children arrow"><a href="car-2-columns-classic.html">Car Classic Fullwidth</a>
                                                    <ul class="sub-menu">
                                                        <li class="menu-item"><a href="car-2-columns-classic.html">2 Columns</a></li>
                                                        <li class="menu-item"><a href="car-3-columns-classic.html">3 Columns</a></li>
                                                        <li class="menu-item"><a href="car-4-columns-classic.html">4 Columns</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item menu-item-has-children arrow"><a href="car-2-columns-classic-right-sidebar.html">Car Classic Right Sidebar</a>
                                                    <ul class="sub-menu">
                                                        <li class="menu-item"><a href="car-2-columns-classic-right-sidebar.html">Right Sidebar</a></li>
                                                        <li class="menu-item"><a href="car-2-columns-classic-left-sidebar.html">Left Sidebar</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item menu-item-has-children arrow"><a href="car-2-columns-grid.html">Car Grid Fullwidth</a>
                                                    <ul class="sub-menu">
                                                        <li class="menu-item"><a href="car-2-columns-grid.html">2 Columns</a></li>
                                                        <li class="menu-item"><a href="car-3-columns-grid.html">3 Columns</a></li>
                                                        <li class="menu-item"><a href="car-4-columns-grid.html">4 Columns</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item menu-item-has-children arrow"><a href="car-grid-right-sidebar.html">Car Grid Sidebar</a>
                                                    <ul class="sub-menu">
                                                        <li class="menu-item"><a href="car-grid-right-sidebar.html">Right Sidebar</a></li>
                                                        <li class="menu-item"><a href="car-grid-left-sidebar.html">Left Sidebar</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item"><a href="car-by-brand-type-fullwidth.html">Car By Brand &#038; Type Fullwidth</a></li>
                                                <li class="menu-item menu-item-has-children arrow"><a href="#">Car By Brands</a>
                                                    <ul class="sub-menu">
                                                        <li class="menu-item"><a href="audi.html">Audi</a></li>
                                                        <li class="menu-item"><a href="bmw.html">BMW</a></li>
                                                        <li class="menu-item"><a href="lexus.html">Lexus</a></li>
                                                        <li class="menu-item"><a href="mercedes-benz.html">Mercedes Benz</a></li>
                                                        <li class="menu-item"><a href="porsche.html">Porsche</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item menu-item-has-children arrow"><a href="#">Car By Types</a>
                                                    <ul class="sub-menu">
                                                        <li class="menu-item"><a href="coupe.html">Coupe</a></li>
                                                        <li class="menu-item"><a href="sedan.html">Sedan</a></li>
                                                        <li class="menu-item"><a href="suv.html">SUV</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item menu-item-has-children arrow"><a href="#">Nhãn hiệu</a>
                                            <ul class="sub-menu">
                                                <li class="menu-item menu-item-has-children arrow"><a href="car-list-right-sidebar.html">Car List Sidebar</a>
                                                    <ul class="sub-menu">
                                                        <li class="menu-item"><a href="car-list-right-sidebar.html">Right Sidebar</a></li>
                                                        <li class="menu-item"><a href="car-list-left-sidebar.html">Left Sidebar</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item menu-item-has-children arrow"><a href="car-list-thumbnail-right-sidebar.html">Car List Thumbnail Sidebar</a>
                                                    <ul class="sub-menu">
                                                        <li class="menu-item"><a href="car-list-thumbnail-right-sidebar.html">Right Sidebar</a></li>
                                                        <li class="menu-item"><a href="car-list-thumbnail-left-sidebar.html">Left Sidebar</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item menu-item-has-children arrow"><a href="car-2-columns-classic.html">Car Classic Fullwidth</a>
                                                    <ul class="sub-menu">
                                                        <li class="menu-item"><a href="car-2-columns-classic.html">2 Columns</a></li>
                                                        <li class="menu-item"><a href="car-3-columns-classic.html">3 Columns</a></li>
                                                        <li class="menu-item"><a href="car-4-columns-classic.html">4 Columns</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item menu-item-has-children arrow"><a href="car-2-columns-classic-right-sidebar.html">Car Classic Right Sidebar</a>
                                                    <ul class="sub-menu">
                                                        <li class="menu-item"><a href="car-2-columns-classic-right-sidebar.html">Right Sidebar</a></li>
                                                        <li class="menu-item"><a href="car-2-columns-classic-left-sidebar.html">Left Sidebar</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item menu-item-has-children arrow"><a href="car-2-columns-grid.html">Car Grid Fullwidth</a>
                                                    <ul class="sub-menu">
                                                        <li class="menu-item"><a href="car-2-columns-grid.html">2 Columns</a></li>
                                                        <li class="menu-item"><a href="car-3-columns-grid.html">3 Columns</a></li>
                                                        <li class="menu-item"><a href="car-4-columns-grid.html">4 Columns</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item menu-item-has-children arrow"><a href="car-grid-right-sidebar.html">Car Grid Sidebar</a>
                                                    <ul class="sub-menu">
                                                        <li class="menu-item"><a href="car-grid-right-sidebar.html">Right Sidebar</a></li>
                                                        <li class="menu-item"><a href="car-grid-left-sidebar.html">Left Sidebar</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item"><a href="car-by-brand-type-fullwidth.html">Car By Brand &#038; Type Fullwidth</a></li>
                                                <li class="menu-item menu-item-has-children arrow"><a href="#">Car By Brands</a>
                                                    <ul class="sub-menu">
                                                        <li class="menu-item"><a href="audi.html">Audi</a></li>
                                                        <li class="menu-item"><a href="bmw.html">BMW</a></li>
                                                        <li class="menu-item"><a href="lexus.html">Lexus</a></li>
                                                        <li class="menu-item"><a href="mercedes-benz.html">Mercedes Benz</a></li>
                                                        <li class="menu-item"><a href="porsche.html">Porsche</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item menu-item-has-children arrow"><a href="#">Car By Types</a>
                                                    <ul class="sub-menu">
                                                        <li class="menu-item"><a href="coupe.html">Coupe</a></li>
                                                        <li class="menu-item"><a href="sedan.html">Sedan</a></li>
                                                        <li class="menu-item"><a href="suv.html">SUV</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item {{ request()->is('/blog') ? 'current-menu-item' : '' }} menu-item-has-children"><a href="{{ route('blog') }}">Bài viết</a></li>
                                        <li class="menu-item  {{ request()->is('/contact') ? 'current-menu-item' : '' }} menu-item-has-children"><a href="{{ route('contact') }}">Liên hệ</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Begin right corner buttons -->
                        <div id="logo_right_button">

                            <!-- Begin side menu -->
                            <a href="javascript:;" id="mobile_nav_icon"><span class="ti-menu"></span></a>
                            <!-- End side menu -->
                        </div>
                        <!-- End right corner buttons -->
                    </div>
                    <!-- End main nav -->
                </div>

            </div>
        </div>
    </div>
</div>
