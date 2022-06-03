<!DOCTYPE html>
<html lang="en-US" data-menu="leftalign">

<head>

@include('client.includes.style')
    @livewireStyles
</head>

<body class="home page-template-default page page-id-3075 woocommerce-no-js ppb_enable">

<input type="hidden" id="pp_menu_layout" name="pp_menu_layout" value="leftalign" />
<input type="hidden" id="pp_enable_right_click" name="pp_enable_right_click" value="0" />
<input type="hidden" id="pp_enable_dragging" name="pp_enable_dragging" value="0" />
<input type="hidden" id="pp_image_path" name="pp_image_path" value="http://themes.themegoods.com/grandcarrental/demo/wp-content/themes/grandcarrental/images/" />
<input type="hidden" id="pp_homepage_url" name="pp_homepage_url" value="index.html" />
<input type="hidden" id="pp_fixed_menu" name="pp_fixed_menu" value="1" />
<input type="hidden" id="tg_smart_fixed_menu" name="tg_smart_fixed_menu" value="0" />
<input type="hidden" id="tg_sidebar_sticky" name="tg_sidebar_sticky" value="1" />
<input type="hidden" id="pp_topbar" name="pp_topbar" value="1" />
<input type="hidden" id="post_client_column" name="post_client_column" value="4" />
<input type="hidden" id="pp_back" name="pp_back" value="Back" />
<input type="hidden" id="pp_page_title_img_blur" name="pp_page_title_img_blur" value="" />
<input type="hidden" id="tg_portfolio_filterable_link" name="tg_portfolio_filterable_link" value="" />
<input type="hidden" id="tg_flow_enable_reflection" name="tg_flow_enable_reflection" value="" />
<input type="hidden" id="tg_lightbox_skin" name="tg_lightbox_skin" value="metro-black" />
<input type="hidden" id="tg_lightbox_thumbnails" name="tg_lightbox_thumbnails" value="horizontal" />
<input type="hidden" id="tg_lightbox_thumbnails_display" name="tg_lightbox_thumbnails_display" value="1" />
<input type="hidden" id="tg_lightbox_opacity" name="tg_lightbox_opacity" value="0.8" />
<input type="hidden" id="tg_cart_url" name="tg_cart_url" value="http://themes.themegoods.com/grandcarrental/demo/cart/" />
<input type="hidden" id="tg_live_builder" name="tg_live_builder" value="0" />
<input type="hidden" id="pp_footer_style" name="pp_footer_style" value="3" />

<!-- Begin mobile menu -->
@include('client.includes.mb')
<!-- End mobile menu -->
<!-- Begin template wrapper -->

<div id="wrapper" class="hasbg transparent">

    @include('client.includes.header')

    @yield('content')

    @include('client.includes.footer')

</div>
<div class="load-page">
    <div class="cover-spin position-sticky" id="code-spin"></div>

</div>

<div id="side_menu_wrapper" class="overlay_background">
    <a id="close_share" href="javascript:;"><span class="ti-close"></span></a>
</div>



@include('client.includes.script')

</body>

</html>

<!--
Performance optimized by W3 Total Cache. Learn more: https://www.w3-edge.com/products/

Page Caching using disk: enhanced
Content Delivery Network via themegoods-cdn-pzbycso8wng.stackpathdns.com

Served from: themes.themegoods.com @ 2019-10-28 10:07:46 by W3 Total Cache
-->
