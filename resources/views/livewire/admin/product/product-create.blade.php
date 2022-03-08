@section('title')
    Xe thuê - Tạo mới
@endsection
@section('header')
    <h3>Danh sách xe</h3>
    <nav aria-label="breadcrumb" style="margin-left: 10px; margin-top: 10px"
         class="breadcrumb-header float-start float-lg-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Bảng điều khiển</a></li>
            <li class="breadcrumb-item active" aria-current="page">Danh sách xe</li>
        </ol>
    </nav>
@endsection
<div>

    <div class="page-content">
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-9">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Thông tin cơ bản</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Tên xe</label>
                                                <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror">
                                                @error('name')
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">First Name</label>
                                                <div id="editor">
                                                    <p>This is some sample content.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Hành động</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <button wire:click="store" class="btn btn-outline-primary">
                                            <svg class="svg-inline--fa fa-save fa-w-14 fa-fw select-all"
                                                 aria-hidden="true" focusable="false" data-prefix="fas" data-icon="save"
                                                 role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                 data-fa-i2svg="">
                                                <path fill="currentColor"
                                                      d="M433.941 129.941l-83.882-83.882A48 48 0 0 0 316.118 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h352c26.51 0 48-21.49 48-48V163.882a48 48 0 0 0-14.059-33.941zM224 416c-35.346 0-64-28.654-64-64 0-35.346 28.654-64 64-64s64 28.654 64 64c0 35.346-28.654 64-64 64zm96-304.52V212c0 6.627-5.373 12-12 12H76c-6.627 0-12-5.373-12-12V108c0-6.627 5.373-12 12-12h228.52c3.183 0 6.235 1.264 8.485 3.515l3.48 3.48A11.996 11.996 0 0 1 320 111.48z"></path>
                                            </svg>
                                            <span class="indicator-label">Tạo mới</span>
                                        </button>
                                        <a href="{{ route('admin.product') }}" class="btn btn-outline-warning">
                                            <svg class="svg-inline--fa fa-redo-alt fa-w-16 fa-fw select-all"
                                                 aria-hidden="true" focusable="false" data-prefix="fas"
                                                 data-icon="redo-alt" role="img" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 512 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                      d="M256.455 8c66.269.119 126.437 26.233 170.859 68.685l35.715-35.715C478.149 25.851 504 36.559 504 57.941V192c0 13.255-10.745 24-24 24H345.941c-21.382 0-32.09-25.851-16.971-40.971l41.75-41.75c-30.864-28.899-70.801-44.907-113.23-45.273-92.398-.798-170.283 73.977-169.484 169.442C88.764 348.009 162.184 424 256 424c41.127 0 79.997-14.678 110.629-41.556 4.743-4.161 11.906-3.908 16.368.553l39.662 39.662c4.872 4.872 4.631 12.815-.482 17.433C378.202 479.813 319.926 504 256 504 119.034 504 8.001 392.967 8 256.002 7.999 119.193 119.646 7.755 256.455 8z"></path>
                                            </svg>
                                            Huỷ
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section">

        </section>
    </div>
</div>


@section('script')
    <script>

        $('#image').change(function (){
            Livewire.emit('changeThumbnail', this.value)

        })
    </script>
@endsection
