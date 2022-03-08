@livewireScripts
<script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{ asset('assets/vendors/apexcharts/apexcharts.js')}}"></script>
<script src="{{ asset('assets/js/pages/dashboard.js')}}"></script>
<script src="{{ asset('assets/vendors/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('assets/vendors/choices.js/choices.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/form-element-select.js') }}"></script>
<script src="{{ asset('assets/js/extensions/sweetalert2.js') }}"></script>
<script src="{{ asset('assets/vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('assets/vendors/toastify/toastify.js') }}"></script>
<script src="{{ asset('assets/js/extensions/toastify.js') }}"></script>
<script src="{{ asset('assets/js/mazer.js')}}"></script>


<!--end::Global Javascript Bundle-->
<!--begin::Page Custom Javascript(used by this page)-->

<script>
    window.addEventListener('alert', event => {
        console.log(event)
        Toastify({
            text: event.detail.message,
            duration: 3000,
            close: true,
            backgroundColor: event.detail.color
        }).showToast();
    });

    window.addEventListener('delete', event => {
        console.log(event)
        Swal.fire({
            title: 'Cảnh báo!',
            icon: 'warning',
            text: "Dữ liệu không thể phục hồi. Bạn có chăc chắn muốn xóa?",
            showCancelButton: true,
            confirmButtonText: 'Đồng ý',
            cancelButtonText: 'Đóng',
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                Livewire.emit(event.detail.emit, event.detail.value)
            }
        })

    })

    window.livewire.on('alertSuccess', event => {
        Toastify({
            text: event.detail.message,
            duration: 3000,
            close: true,
            backgroundColor: 'green'
        }).showToast();
    });
    @if(\session()->has('success'))
    Toastify({
        text: '{{ \session()->pull('success') }}',
        duration: 3000,
        close: true,
        backgroundColor: 'green'
    }).showToast();
    @endif

    @if(\session()->has('error'))
    Toastify({
        text: '{{ \session()->pull('success') }}',
        duration: 3000,
        close: true,
        backgroundColor: 'red'
    }).showToast();
    @endif
</script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>

<script>
    var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };


    $('#lfm').filemanager('image')
</script>
@yield('script')


