@section('title')
    Xe thuê - Tạo mới
@endsection

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div class="d-flex align-items-center me-3">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Cập nhật xe thuê</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-200 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">Bảng điều
                            khiển</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>

                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('admin.product') }}" class="text-muted text-hover-primary">Xe thuê</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Tạo mới</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <!--end::Actions-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <!--begin::Card-->
            <div class="row g-xxl-9">
                <!--begin::Col-->


                <div class="col-xxl-8">
                    <!--begin::Security summary-->
                    <div class="card mb-5 mb-xl-10">
                        <!--begin::Header-->
                        <div class="card-header card-header-stretch">
                            <!--begin::Title-->
                            <div class="card-title">
                                <h3 class="m-0 text-gray-900">Thông tin cơ bản</h3>
                            </div>
                            <!--end::Title-->
                            <!--begin::Toolbar-->
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="modal-body mx-5 mx-xl-15 my-7">
                            <form class="form fv-plugins-bootstrap5 fv-plugins-framework">
                                <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                        <span class="required">Tên xe</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" wire:model="name" class="form-control form-control-solid" placeholder="">
                                    @error('name')
                                    <div class="fv-plugins-message-container">
                                        <div data-field="name" data-validator="notEmpty" class="fv-help-block">{{ $message }}</div>
                                    </div>
                                    @enderror
                                </div>

                                <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                        <span class="required">Biển kiểm soát</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" wire:model="licensePlates" class="form-control form-control-solid" placeholder="">
                                    @error('licensePlates')
                                    <div class="fv-plugins-message-container">
                                        <div data-field="name" data-validator="notEmpty" class="fv-help-block">{{ $message }}</div>
                                    </div>
                                    @enderror
                                </div>

                                <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                        <span class="required">Giá thuê/h</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" wire:model="price" class="form-control form-control-solid" placeholder="">
                                    @error('price')
                                    <div class="fv-plugins-message-container">
                                        <div data-field="name" data-validator="notEmpty" class="fv-help-block">{{ $message }}</div>
                                    </div>
                                    @enderror
                                </div>

                                <div class="row mb-5">
                                    <!--begin::Col-->
                                    <div class="col-md-4 fv-row fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-bold mb-2">Màu sắc</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" wire:model="color" class="form-control form-control-solid" placeholder="" name="first-name">
                                        <!--end::Input-->
                                        @error('color')
                                        <div class="fv-plugins-message-container">
                                            <div data-field="name" data-validator="notEmpty" class="fv-help-block">{{ $message }}</div>
                                        </div>
                                        @enderror
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-4 fv-row fv-plugins-icon-container">
                                        <!--end::Label-->
                                        <label class="required fs-5 fw-bold mb-2">Ngày đăng ký</label>
                                        <!--end::Label-->
                                        <!--end::Input-->
                                        <input type="text" wire:model="year" class="form-control form-control-solid" placeholder="" name="last-name">
                                        <!--end::Input-->
                                        @error('year')
                                        <div class="fv-plugins-message-container">
                                            <div data-field="name" data-validator="notEmpty" class="fv-help-block">{{ $message }}</div>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 fv-row fv-plugins-icon-container">
                                        <!--end::Label-->
                                        <label class="required fs-5 fw-bold mb-2">Km đã sử dụng</label>
                                        <!--end::Label-->
                                        <!--end::Input-->
                                        <input wire:model="km" type="text" class="form-control form-control-solid" placeholder="" name="last-name">
                                        <!--end::Input-->
                                        @error('km')
                                        <div class="fv-plugins-message-container">
                                            <div data-field="name" data-validator="notEmpty" class="fv-help-block">{{ $message }}</div>
                                        </div>
                                        @enderror
                                    </div>

                                    <!--end::Col-->
                                </div>

                                <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                        <span>Thông số khác</span>
                                        <button wire:click="addOtherParameter" type="button" class="btn btn-success btn-sm" style="margin-left: 5px">
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"></rect>
                                                    <rect fill="#000000" opacity="0.5" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000)" x="4" y="11" width="16" height="2" rx="1"></rect>
                                                </svg>
                                            </span>
                                        </button>
                                    </label>
                                    <!--end::Label-->
                                    @if(count($otherParameters) > 0)
                                    <div class="row">
                                        <div class="col-4">Từ khoá</div>
                                        <div class="col-6">Giá trị</div>
                                    </div>
                                    @endif
                                    @foreach($otherParameters as $otherParameter)
                                    <div class="row" style="margin-bottom: 10px">
                                        <div class="col-4">
                                            <input type="text" wire:model="otherParameters.{{$loop->index}}.key" class="form-control form-control-solid" placeholder="">
                                        </div>
                                        <div class="col-6">
                                            <input type="text" wire:model="otherParameters.{{$loop->index}}.value" class="form-control form-control-solid" placeholder="">
                                        </div>
                                        <div class="col-2" style=" display: flex; align-items: center;">
                                            <span style="cursor: pointer" title="Xoá" wire:click="deleteOtherParameter({{$loop->index}})" class="svg-icon svg-icon-2"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Navigation/Close.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                                                                <rect x="0" y="7" width="16" height="2" rx="1"/>
                                                                <rect opacity="0.3" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000) " x="0" y="7" width="16" height="2" rx="1"/>
                                                            </g>
                                                        </g>
                                                    </svg><!--end::Svg Icon-->
                                                </span>
                                        </div>

                                    </div>
                                    @endforeach
                                </div>

                                <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container" wire:ignore>
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                        <span>Mô tả</span>
                                    </label>
                                    <!--end::Label-->
                                    <textarea wire:model="description" id="editor"
                                              class="form-control form-control-solid" rows="5" placeholder="">
                                        {!! $description !!}
                                    </textarea>
                                </div><!--end::Tab content-->
                            </form>
                            <!--begin::Tab content-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <div class="card mb-5 mb-xl-10">
                        <!--begin::Header-->
                        <div class="card-header">
                            <!--begin::Title-->
                            <div class="card-title">
                                <h3 class="m-0 text-gray-900">Thư viện ảnh</h3>
                            </div>
                            <!--end::Title-->
                            <!--begin::Toolbar-->
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body">
                            <div class="card-content">
                                <div class="img-preview">
                                    @foreach($images as $key => $image)
                                        <div class="image-input image-input-outline" data-kt-image-input="true"
                                             style="background-image: url({{ $image }}); margin-right: 10px">
                                            <!--begin::Preview existing avatar-->
                                            <div class="image-input-wrapper w-125px h-125px"
                                                 style="background-image: url({{ $image }})"></div>
                                            <!--end::Preview existing avatar-->
                                            <!--begin::Label-->
                                            <label wire:click="deleteImage({{ $key }})"
                                                   class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                   data-kt-image-input-action="change" data-bs-toggle="tooltip" title=""
                                                   data-bs-original-title="Chọn ảnh">
                                                <i class="bi bi-x fs-2"></i>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Cancel-->
                                            <!--end::Remove-->
                                        </div>
                                    @endforeach
                                </div>
                                <a href="#" id="lfms" data-input="thumbnails">Lựu chọn hình ảnh</a>
                                @if(count($images) > 0)
                                    <a href="#" wire:click="deleteAllImage" style="color: #F1416C">Làm mới thư viện</a>
                                @endif
                                <input id="thumbnails" class="form-control" hidden type="text" name="filepath">
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Security summary-->
                </div>

                <div class="col-xxl-4">
                    <!--begin::Security recent alerts-->
                    <div class="card mb-5 mb-xl-10">

                        <div class="card-header card-header-stretch">
                            <!--begin::Title-->
                            <div class="card-title">
                                <h3 class="m-0 text-gray-900">Hành động</h3>
                            </div>
                            <!--end::Title-->
                            <!--begin::Toolbar-->
                            <!--end::Toolbar-->
                        </div>
                        <!--begin::Body-->
                        <div class="card-body pt-5">
                            <!--begin::Carousel-->
                            <div class="carousel carousel-custom carousel-stretch slide">
                                <div class="row">
                                    <div class="col">
                                        <button wire:click="store" type="submit" class="btn btn-primary w-100">
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"></rect>
                                                    <rect fill="#000000" opacity="0.5" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000)" x="4" y="11" width="16" height="2" rx="1"></rect>
                                                </svg>
                                            </span>
                                            <span class="indicator-label">Tạo mới</span>
                                        </button>
                                    </div>
                                    <div class="col">
                                        <a href="{{ route('admin.product') }}" class="btn btn-warning me-3 w-100">
                                            <span class="svg-icon svg-icon-primary svg-icon-2"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Design/Circle.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <circle fill="#000000" cx="12" cy="12" r="8"/>
                                                    </g>
                                                </svg><!--end::Svg Icon-->
                                            </span>
                                            Huỷ
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--end::Carousel-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Security recent alerts-->

                    <div class="card mb-5 mb-xl-10">

                        <div class="card-header card-header-stretch">
                            <!--begin::Title-->
                            <div class="card-title">
                                <h3 class="m-0 text-gray-900">Nhãn hiệu</h3>
                            </div>
                            <!--end::Title-->
                            <!--begin::Toolbar-->
                            <!--end::Toolbar-->
                        </div>
                        <!--begin::Body-->
                        <div class="card-body pt-5">
                            <!--begin::Carousel-->
                            <div class="d-flex flex-column mb-10 fv-row">
                                <!--begin::Label-->
                                <!--end::Label-->
                                <!--begin::Select-->
                                <select wire:model="brandId" class="form-select form-select-solid">
                                    <option value="">Chọn nhãn hiệu</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                                <!--end::Select-->
                            </div>
                            <!--end::Carousel-->
                        </div>
                        <!--end::Body-->
                    </div>

                    <div class="card mb-5 mb-xl-10">

                        <div class="card-header card-header-stretch">
                            <!--begin::Title-->
                            <div class="card-title">
                                <h3 class="m-0 text-gray-900">Danh mục</h3>
                            </div>
                            <!--end::Title-->
                            <!--begin::Toolbar-->
                            <!--end::Toolbar-->
                        </div>
                        <!--begin::Body-->
                        <div class="card-body pt-5">
                            <!--begin::Carousel-->
                            @forelse($categories as $category)
                                @include('admin.includes.category-option',['$category' => $category])
                            @empty
                                Chưa có danh mục !
                            @endforelse
                            <!--end::Carousel-->
                        </div>
                        <!--end::Body-->
                    </div>

                    <div class="card mb-5 mb-xl-10">

                        <div class="card-header card-header-stretch">
                            <!--begin::Title-->
                            <div class="card-title">
                                <h3 class="m-0 text-gray-900">Ảnh đại diện</h3>
                            </div>
                            <!--end::Title-->
                            <!--begin::Toolbar-->
                            <!--end::Toolbar-->
                        </div>
                        <!--begin::Body-->
                        <div class="card-body pt-5">
                            <!--begin::Carousel-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <!--end::Label-->
                                <!--begin::Image input-->
                                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{ $thumbnail ?? asset('admin/assets/img/default-image.jpg') }})">
                                    <!--begin::Preview existing avatar-->
                                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ $thumbnail ?? asset('admin/assets/img/default-image.jpg') }})"></div>
                                    <!--end::Preview existing avatar-->
                                    <!--begin::Label-->
                                    <label id="lfm" data-input="image" class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="" data-bs-original-title="Chọn ảnh">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <!--begin::Inputs-->
                                        <input type="file" accept=".png, .jpg, .jpeg">
                                        <input type="text" wire:model="thumbnail" hidden id="image" accept=".png, .jpg, .jpeg">
                                        <input type="hidden" name="avatar_remove">
                                        <!--end::Inputs-->
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Cancel-->
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="" data-bs-original-title="Cancel avatar">
																				<i class="bi bi-x fs-2"></i>
																			</span>
                                    <!--end::Cancel-->
                                    <!--begin::Remove-->
                                    <span wire:click="clearImagePreview" class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="" data-bs-original-title="Xóa ảnh">
																				<i class="bi bi-x fs-2"></i>
																			</span>
                                    <!--end::Remove-->
                                </div>

                                <!--end::Image input-->
                                <!--begin::Hint-->
                                <div class="form-text">
                                    Loại tệp được phép: png, jpg, jpeg.</div>

                                @error('thumbnail')
                                    <div class="fv-plugins-message-container">
                                        <div data-field="email" data-validator="notEmpty" class="fv-help-block">{{ $message }}</div>
                                    </div>
                                @enderror
                            <!--end::Hint-->
                            </div>
                            <!--end::Carousel-->
                        </div>
                        <!--end::Body-->
                    </div>
                </div>
            </div>

            <!--end::Card-->
            <!--begin::Modals-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>

@section('script')
    <script>
        $('#image').change(function () {
            Livewire.emit('changeImage', this.value)
        })

        $('#thumbnails').change(function () {
            Livewire.emit('changeImages', this.value)
        })
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
            language: 'vi'
        };
        CKEDITOR.replace('editor', options).on('change', (e) => {
            Livewire.emit('updateDescription', e.editor.getData())
        })
    </script>
@endsection
