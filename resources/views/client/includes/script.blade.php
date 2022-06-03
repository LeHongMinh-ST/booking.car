@livewireScripts
<script type='text/javascript' src='{{ asset('client/js/jquery.js') }}'></script>
<script type='text/javascript' src='{{ asset('client/js/jquery-migrate.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('client/js/plugins/grandcarrental-custom-post/js/jquery.barrating.js') }}'></script>
<script type='text/javascript' src='{{ asset('client/js/plugins/revslider/public/assets/js/jquery.themepunch.tools.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('client/js/plugins/revslider/public/assets/js/jquery.themepunch.revolution.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('client/js/plugins/ui/core.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('client/js/plugins/ui/datepicker.min.js') }}'></script>
<script type='text/javascript'>
    jQuery(document).ready(function(jQuery) {
        jQuery.datepicker.setDefaults({
            "closeText": "Close",
            "currentText": "Today",
            "monthNames": ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            "monthNamesShort": ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            "nextText": "Next",
            "prevText": "Previous",
            "dayNames": ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
            "dayNamesShort": ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
            "dayNamesMin": ["S", "M", "T", "W", "T", "F", "S"],
            "dateFormat": "MM d, yy",
            "firstDay": 1,
            "isRTL": false
        });
    });
</script>
<script type='text/javascript' src='{{ asset('client/js/plugins/jquery.requestAnimationFrame.js') }}'></script>
<script type='text/javascript' src='{{ asset('client/js/plugins/ilightbox.packed.js') }}'></script>
<script type='text/javascript' src='{{ asset('client/js/plugins/jquery.easing.js') }}'></script>
<script type='text/javascript' src='{{ asset('client/js/plugins/waypoints.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('client/js/plugins/jquery.isotope.js') }}'></script>
<script type='text/javascript' src='{{ asset('client/js/plugins/jquery.masory.js') }}'></script>
<script type='text/javascript' src='{{ asset('client/js/plugins/jquery.tooltipster.min.js') }}'></script>
{{--<script type='text/javascript' src='{{ asset('client/js/plugins/jarallax.js') }}'></script>--}}
<script type='text/javascript' src='{{ asset('client/js/plugins/jquery.sticky-kit.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('client/js/plugins/jquery.stellar.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('client/js/plugins/jquery.cookie.js') }}'></script>
<script type='text/javascript' src='{{ asset('client/js/plugins/custom_plugins.js') }}'></script>
{{--<script type='text/javascript' src='{{ asset('client/js/plugins/jarallax-video.js') }}'></script>--}}

{{--<script type='text/javascript' src='{{ asset('client/js/plugins/custom.js') }}'></script>--}}
<script type='text/javascript' src='{{ asset('client/js/plugins/custom_onepage.js') }}'></script>
<script type='text/javascript' src='{{ asset('client/js/plugins/jquery.cookie.js') }}'></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type='text/javascript'>
    /* <![CDATA[ */
    var mc4wp_forms_config = [];
    /* ]]> */

    @if(\session()->has('success'))
        Swal.fire({
            icon: 'success',
            title: '{{ session()->pull('success.title') }} ',
            text: '{{ session()->pull('success.message') }} ',
        })
    @endif


</script>
<script>
    window.addEventListener('showLoading', () => {
        jQuery('#code-spin').addClass('show-spin')
    })

    window.addEventListener('hideLoading', () => {
        jQuery('#code-spin').removeClass('show-spin')
    })
    window.addEventListener('alert', (e) => {
        Swal.fire({
            icon: e.detail.type,
            title: e.detail.title,
            text: e.detail.message,
        })
    })


</script>
@yield('script')
