<a id="close_mobile_menu" href="javascript:;"></a>

<div class="mobile_menu_wrapper">
    <a id="mobile_menu_close" href="javascript:;" class="button"><span class="ti-close"></span></a>

    <div class="mobile_menu_content">

        <div class="menu-main-menu-container">
            <ul id="mobile_main_menu" class="mobile_main_nav">
                <li class="menu-item {{ request()->is('/') ? 'current-menu-item' : '' }}  menu-item-has-children"><a href="{{ route('home') }}">Trang chủ</a></li>
                <li class="menu-item {{ request()->is('/about') ? 'current-menu-item' : '' }} menu-item-has-children"><a href="{{ route('about') }}">Giới thiệu</a></li>
                <li class="menu-item  {{ request()->is('/service') ? 'current-menu-item' : '' }} menu-item-has-children"><a href="{{ route('service') }}">Dịch vụ</a></li>
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
        <!-- Begin side menu sidebar -->
        <div class="page_content_wrapper">
            <div class="sidebar_wrapper">
                <div class="sidebar">

                    <div class="content">

                        <ul class="sidebar_widget">
                            <li id="text-8" class="widget widget_text">
                                <h2 class="widgettitle">For More Informations</h2>
                                <div class="textwidget"><span class="ti-mobile" style="margin-right:10px;"></span>1-567-124-44227
                                    <br/>
                                    <span class="ti-alarm-clock" style="margin-right:10px;"></span>Mon - Sat 8.00 - 18.00</div>
                            </li>
                        </ul>

                    </div>

                </div>
            </div>
        </div>
        <!-- End side menu sidebar -->

        <div class="social_wrapper">
            <ul>
                <li class="facebook"><a target="_blank" href="#"><i class="fa fa-facebook-official"></i></a></li>
                <li class="twitter"><a target="_blank" href="http://twitter.com/#"><i class="fa fa-twitter"></i></a></li>
                <li class="youtube"><a target="_blank" title="Youtube" href="#"><i class="fa fa-youtube"></i></a></li>
                <li class="pinterest"><a target="_blank" title="Pinterest" href="http://pinterest.com/#"><i class="fa fa-pinterest"></i></a></li>
                <li class="instagram"><a target="_blank" title="Instagram" href="http://instagram.com/theplanetd"><i class="fa fa-instagram"></i></a></li>
            </ul>
        </div>
    </div>
</div>
