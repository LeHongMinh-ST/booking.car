@livewireScripts

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ asset('admin/assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('admin/assets/js/scripts.bundle.js') }}"></script>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="//cdn.ckeditor.com/4.17.2/full/ckeditor.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Custom Javascript(used by this page)-->

<script>
    window.addEventListener('alert', event => {
        toastr[event.detail.type](event.detail.message,
            event.detail.title ?? ''), toastr.options = {
            "closeButton": true,
            "progressBar": true,
        }
    });

    window.livewire.on('alertSuccess', event => {
        toastr[event.detail.type](event.detail.message,
            event.detail.title ?? ''), toastr.options = {
            "closeButton": true,
            "progressBar": true,
        }
    });
    @if(\session()->has('success'))
        toastr.success('{{ \session()->get('success')['message'] }}', '{{ \session()->pull('success')['title'] }}'),
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
        }
    @endif

    @if(\session()->has('error'))
    toastr.error('{{ \session()->pull('error') }}'),
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
        }
    @endif
</script>
<script>

    var routePrefix = "/filemanager";
    $('#lfm').filemanager('image', {prefix: routePrefix});
    $('#lfmUpdate').filemanager('image', {prefix: routePrefix});
    $('#lfms').filemanager('image', {prefix: routePrefix});
</script>
@yield('script')


