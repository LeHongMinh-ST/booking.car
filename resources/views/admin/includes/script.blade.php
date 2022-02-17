@livewireScripts
<script src="{{ asset('admin/assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('admin/assets/js/scripts.bundle.js') }}"></script>
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

@yield('script')
