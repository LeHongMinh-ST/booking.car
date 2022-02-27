@section('title')
    Tài khoản - Tạo mới
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
                                        <span class="required">Tên tài khoản</span>
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
                                        <span class="required">Email</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" wire:model="email" class="form-control form-control-solid" placeholder="">
                                    @error('email')
                                    <div class="fv-plugins-message-container">
                                        <div data-field="name" data-validator="notEmpty" class="fv-help-block">{{ $message }}</div>
                                    </div>
                                    @enderror
                                </div>

                                <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                        <span>Số điện thoại</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" wire:model="phone" class="form-control form-control-solid" placeholder="">
                                    @error('phone')
                                    <div class="fv-plugins-message-container">
                                        <div data-field="name" data-validator="notEmpty" class="fv-help-block">{{ $message }}</div>
                                    </div>
                                    @enderror
                                </div>

                            </form>
                            <!--begin::Tab content-->
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
                                        <a href="{{ route('admin.account') }}" class="btn btn-warning me-3 w-100">
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
                                <h3 class="m-0 text-gray-900">Vai trò</h3>
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
                                <select wire:model="roleId" class="form-select form-select-solid">
                                    <option value="">Chọn vai trò</option>
                                    @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                <!--end::Select-->
                                @error('roleId')
                                <div class="fv-plugins-message-container">
                                    <div data-field="email" data-validator="notEmpty" class="fv-help-block">{{ $message }}</div>
                                </div>
                                @enderror
                            </div>
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
                                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{ $avatar ? $avatar->temporaryUrl() : asset('admin/assets/img/default-image.jpg') }})">
                                    <!--begin::Preview existing avatar-->
                                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ $avatar ? $avatar->temporaryUrl() : asset('admin/assets/img/default-image.jpg') }});"></div>
                                    <!--end::Preview existing avatar-->
                                    <!--begin::Label-->
                                    <label id="lfm" class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="" data-bs-original-title="Chọn ảnh">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <!--begin::Inputs-->
                                        <input type="file" wire:model="avatar" id="image" accept=".png, .jpg, .jpeg">
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
                                    <span wire:click="clearImagePreview" class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="" data-bs-original-title="Remove avatar">
																				<i class="bi bi-x fs-2"></i>
																			</span>
                                    <!--end::Remove-->
                                </div>

                                <!--end::Image input-->
                                <!--begin::Hint-->
                                <div class="form-text">
                                    Loại tệp được phép: png, jpg, jpeg.</div>

                                @error('avatar')
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

