<script type='text/javascript' src='{{ asset('client/js/jquery.js') }}'></script>
<script type='text/javascript' src='{{ asset('client/js/jquery-migrate.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('client/js/plugins/grandcarrental-custom-post/js/jquery.barrating.js') }}'></script>
<script type='text/javascript' src='{{ asset('client/js/plugins/revslider/public/assets/js/jquery.themepunch.tools.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('client/js/plugins/revslider/public/assets/js/jquery.themepunch.revolution.min.js') }}'></script>
<script src="/vendor/laravel-filemanager/js/script.js"></script>
<script type="text/javascript">
    function setREVStartSize(e) {
        try {
            var i = jQuery(window).width(),
                t = 9999,
                r = 0,
                n = 0,
                l = 0,
                f = 0,
                s = 0,
                h = 0;
            if (e.responsiveLevels && (jQuery.each(e.responsiveLevels, function(e, f) {
                f > i && (t = r = f, l = e), i > f && f > r && (r = f, n = e)
            }), t > r && (l = n)), f = e.gridheight[l] || e.gridheight[0] || e.gridheight, s = e.gridwidth[l] || e.gridwidth[0] || e.gridwidth, h = i / s, h = h > 1 ? 1 : h, f = Math.round(h * f), "fullscreen" == e.sliderLayout) {
                var u = (e.c.width(), jQuery(window).height());
                if (void 0 != e.fullScreenOffsetContainer) {
                    var c = e.fullScreenOffsetContainer.split(",");
                    if (c) jQuery.each(c, function(e, i) {
                        u = jQuery(i).length > 0 ? u - jQuery(i).outerHeight(!0) : u
                    }), e.fullScreenOffset.split("%").length > 1 && void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 ? u -= jQuery(window).height() * parseInt(e.fullScreenOffset, 0) / 100 : void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 && (u -= parseInt(e.fullScreenOffset, 0))
                }
                f = u
            } else void 0 != e.minHeight && f < e.minHeight && (f = e.minHeight);
            e.c.closest(".rev_slider_wrapper").css({
                height: f
            })
        } catch (d) {
            console.log("Failure at Presize of Slider:" + d)
        }
    };
</script>
<script>
    (function() {
        function addEventListener(element, event, handler) {
            if (element.addEventListener) {
                element.addEventListener(event, handler, false);
            } else if (element.attachEvent) {
                element.attachEvent('on' + event, handler);
            }
        }

        function maybePrefixUrlField() {
            if (this.value.trim() !== '' && this.value.indexOf('http') !== 0) {
                this.value = "http://" + this.value;
            }
        }

        var urlFields = document.querySelectorAll('.mc4wp-form input[type="url"]');
        if (urlFields && urlFields.length > 0) {
            for (var j = 0; j < urlFields.length; j++) {
                addEventListener(urlFields[j], 'blur', maybePrefixUrlField);
            }
        } /* test if browser supports date fields */
        var testInput = document.createElement('input');
        testInput.setAttribute('type', 'date');
        if (testInput.type !== 'date') {

            /* add placeholder & pattern to all date fields */
            var dateFields = document.querySelectorAll('.mc4wp-form input[type="date"]');
            for (var i = 0; i < dateFields.length; i++) {
                if (!dateFields[i].placeholder) {
                    dateFields[i].placeholder = 'YYYY-MM-DD';
                }
                if (!dateFields[i].pattern) {
                    dateFields[i].pattern = '[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])';
                }
            }
        }

    })();
</script>
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
<script type='text/javascript' src='{{ asset('client/js/plugins/jarallax.js') }}'></script>
<script type='text/javascript' src='{{ asset('client/js/plugins/jquery.sticky-kit.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('client/js/plugins/jquery.stellar.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('client/js/plugins/jquery.cookie.js') }}'></script>
<script type='text/javascript' src='{{ asset('client/js/plugins/custom_plugins.js') }}'></script>
<script type='text/javascript' src='{{ asset('client/js/plugins/custom.js') }}'></script>
<script type='text/javascript' src='{{ asset('client/js/plugins/custom_onepage.js') }}'></script>
<script type='text/javascript' src='{{ asset('client/js/plugins/jarallax-video.js') }}'></script>
<script type='text/javascript' src='{{ asset('client/js/plugins/jquery.cookie.js') }}'></script>
<script type='text/javascript'>
    /* <![CDATA[ */
    var mc4wp_forms_config = [];
    /* ]]> */

</script>
</script>
@section('script')
