<link rel="shortcut icon" href="{{ asset('client/upload/TG-Thumb.png') }}" />

<title>Booking Car | @yield('title', 'Trang chủ')</title>


<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta name="format-detection" content="telephone=no">

<link rel='stylesheet' href='{{ asset('client/js/plugins/grandcarrental-custom-post/css/fontawesome-stars-o.css') }}' type='text/css' media='all' />
<link rel='stylesheet' href='{{ asset('client/js/plugins/post-views-counter/css/frontend.css') }}' type='text/css' media='all' />
<link rel='stylesheet' href='{{ asset('client/js/plugins/revslider/public/assets/css/settings.css') }}' type='text/css' media='all' />
<link rel='stylesheet' href='{{ asset('client/css/reset.css') }}' type='text/css' media='all' />
<link rel='stylesheet' href='{{ asset('client/css/wordpress.css') }}' type='text/css' media='all' />
<link rel='stylesheet' href='{{ asset('client/css/animation.css') }}' type='text/css' media='all' />
<link rel='stylesheet' href='{{ asset('client/css/ilightbox/ilightbox.css') }}' type='text/css' media='all' />
<link rel='stylesheet' href='{{ asset('client/css/jqueryui/custom.css') }}' type='text/css' media='all' />
{{--<link rel='stylesheet' href='{{ asset('client/js/plugins/mediaelement/mediaelementplayer-legacy.min.css') }}' type='text/css' media='all' />--}}
<link rel='stylesheet' href='{{ asset('client/js/plugins/flexslider/flexslider.css') }}' type='text/css' media='all' />
<link rel='stylesheet' href='{{ asset('client/css/tooltipster.css') }}' type='text/css' media='all' />
<link rel='stylesheet' href='{{ asset('client/css/odometer-theme-minimal.css') }}' type='text/css' media='all' />
<link rel='stylesheet' href='{{ asset('client/css/style.css') }}' type='text/css' media='all' />
<link rel='stylesheet' href='{{ asset('client/css/menus/leftalignmenu.css') }}' type='text/css' media='all' />
<link rel='stylesheet' href='{{ asset('client/css/font-awesome.min.css') }}' type='text/css' media='all' />
<link rel='stylesheet' href='{{ asset('client/css/themify-icons.css') }}' type='text/css' media='all' />
<link rel='stylesheet' href='{{ asset('client/css/kirki.css') }}' type='text/css' media='all' />
<link rel='stylesheet' href='{{ asset('client/css/grid.css') }}' type='text/css' media='all' />


<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Work+Sans%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900%7CPoppins%3A300%2Cregular%2C500%2C600%2C700%2C900&#038;subset' type='text/css' media='all' />
<style>
    .cover-spin {
        position:fixed;
        width:100%;
        left:0;right:0;top:0;bottom:0;
        background-color: rgba(255,255,255,0.7);
        z-index:9999;
        display:none;
    }

    .show-spin {
        display:block!important;
    }

    @-webkit-keyframes spin {
        from {-webkit-transform:rotate(0deg);}
        to {-webkit-transform:rotate(360deg);}
    }

    @keyframes spin {
        from {transform:rotate(0deg);}
        to {transform:rotate(360deg);}
    }

    .cover-spin::after {
        content:'';
        display:block;
        position:absolute;
        left:48%;top:40%;
        width:40px;height:40px;
        border-style:solid;
        border-color:black;
        border-top-color:transparent;
        border-width: 4px;
        border-radius:50%;
        -webkit-animation: spin .8s linear infinite;
        animation: spin .8s linear infinite;
    }
</style>
@yield('style')

