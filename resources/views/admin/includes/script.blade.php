@livewireScripts
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ asset('admin/assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('admin/assets/js/scripts.bundle.js') }}"></script>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="//cdn.ckeditor.com/4.17.2/full/ckeditor.js"></script>
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
        toastr.success('{{ \session()->pull('success') }}'),
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
    // $('#lfm').filemanager('image')
    CKEDITOR.replace( 'editor' );
</script>
@yield('script')


