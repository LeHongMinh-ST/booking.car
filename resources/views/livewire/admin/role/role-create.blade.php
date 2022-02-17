@section('title')
    Vai trò
@endsection

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div class="d-flex align-items-center me-3">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Danh sách vai trò</h1>
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
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Vai trò</li>
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
                    <div class="card card-xxl-stretch mb-5 mb-xl-10">
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
                                        <span class="required">Tên vai trò</span>
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
                                        <span>Mô tả</span>
                                    </label>
                                    <!--end::Label-->
                                    <textarea  wire:model="description" class="form-control form-control-solid" placeholder="" ></textarea>
                                </div><!--end::Tab content-->
                            </form>
                            <!--begin::Tab content-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Security summary-->
                </div>

                <div class="col-xxl-4">
                    <!--begin::Security recent alerts-->
                    <div class="card card-xxl-stretch-50 mb-5 mb-xl-10">

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
                                        <button class="btn btn-warning me-3 w-100">
                                            <span class="svg-icon svg-icon-primary svg-icon-2"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Design/Circle.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <circle fill="#000000" cx="12" cy="12" r="8"/>
                                                    </g>
                                                </svg><!--end::Svg Icon-->
                                            </span>
                                            Huỷ
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!--end::Carousel-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Security recent alerts-->

                </div>
            </div>

            <div class="row g-xxl-9">
                <!--begin::Col-->


                <div class="col-xxl-8">
                    <!--begin::Security summary-->
                    <div class="card card-xxl-stretch mb-5 mb-xl-10">
                        <!--begin::Header-->
                        <div class="card-header card-header-stretch">
                            <!--begin::Title-->
                            <div class="card-title">
                                <h3 class="m-0 text-gray-900">Phân quyền</h3>
                            </div>
                            <!--end::Title-->
                            <!--begin::Toolbar-->
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-7 pb-0 px-0">
                            <!--begin::Tab content-->
                            <div class="modal-body mx-5 mx-xl-15 my-7">
                                <form class="form fv-plugins-bootstrap5 fv-plugins-framework">
                                    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <h5>Supper Admin</h5>
                                        </label>
                                        <!--end::Label-->
                                        <div class="checkbox-inline">
                                            <div class="row">
                                                <div class="col-4">
                                                    <label class="checkbox">
                                                        <input type="checkbox" wire:model="permissionChecked" value="1" >
                                                        <span></span>Supper admin
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @foreach($groups as $group)
                                    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
{{--                                            <h5>{{ $group->name }}</h5>--}}
{{--                                            <button type="button" wire:click="selectAll({{$group->id}})" class="btn btn-white btn-sm">Tất cả</button>--}}
                                            <label class="checkbox">
                                                <input type="checkbox" wire:model="permissionGroupChecked" wire:change="selectAll({{$group->id}})" value="{{ $group->id }}" >
                                                <span></span><h4 style="display: inline">{{ $group->name }}</h4>
                                            </label>
                                        </label>
                                        <!--end::Label-->
                                        <div class="checkbox-inline">
                                            <div class="row">
                                                @foreach($group->permissions as $permission)
                                                <div class="col-4">
                                                    <label class="checkbox">
                                                        <input type="checkbox" wire:model="permissionChecked" value="{{ $permission->id }}" >
                                                        <span></span>{{ $permission->name }}
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </form>
                                <!--begin::Tab content-->
                            </div>
                            <!--end::Tab content-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Security summary-->
                </div>

            </div>
            <!--end::Card-->
            <!--begin::Modals-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>

