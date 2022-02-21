@section('title')
    Xe thuê - Chi tiết
@endsection
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div class="d-flex align-items-center me-3">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Chi tiết xe thuê</h1>
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
                    <li class="breadcrumb-item text-muted">Chi tiết</li>
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

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <!--begin::Navbar-->
            <div class="card mb-6 mb-xl-9">
                <div class="card-body pt-9 pb-0">
                    <!--begin::Details-->
                    <div class="d-flex flex-wrap flex-sm-nowrap mb-6">
                        <!--begin::Image-->
                        <div class="d-flex flex-center flex-shrink-0 bg-light rounded w-150px w-150px w-lg-150px h-lg-150px me-7 mb-4">
                            @if($thumbnail)
                                <img class="image-input-wrapper w-150px h-150px image-input-outline" src="{{ $thumbnail }}" alt="">
                            @else
                                <img class="image-input-wrapper w-150px w-150px image-input-outline" src="{{ asset('admin/assets/img/default-image.jpg') }}" alt="">
                            @endif
                        </div>
                        <!--end::Image-->
                        <!--begin::Wrapper-->
                        <div class="flex-grow-1">
                            <!--begin::Head-->
                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                <!--begin::Details-->
                                <div class="d-flex flex-column">
                                    <!--begin::Status-->
                                    <div class="d-flex align-items-center mb-1">
                                        <a href="#" class="text-gray-800 text-hover-primary fs-2 fw-bolder me-3">{{ $name }}</a>
                                        @switch($status)
                                            @case(\App\Models\Product::STATUS['normal'])
                                            <span class="badge badge-light-success">Sẵn sàng</span>
                                            @break
                                            @case(\App\Models\Product::STATUS['hired'])
                                            <span class="badge badge-light-warning">Đang cho thuê</span>
                                            @break
                                            @case(\App\Models\Product::STATUS['hide'])
                                            <span class="badge badge-light-danger">Ẩn</span>
                                            @break
                                        @endswitch
                                    </div>
                                    <!--end::Status-->
                                    <!--begin::Description-->
                                    <div class="d-flex flex-wrap fw-bold mb-4 fs-5 text-gray-400">{{ $licensePlates }}</div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Actions-->
                                <div class="d-flex mb-4">
                                    @if(checkPermission('product-update'))
                                    <a href="{{ route('admin.product.edit', $productId)}}" class="btn btn-sm btn-primary me-3">Sửa</a>
                                    @endif
                                    @if(checkPermission('product-delete'))
                                        <a href="#" wire:click="openDeleteModal()"  class="btn btn-sm btn-danger me-3">Xóa</a>
                                    @endif
                                            <!--begin::Menu-->
                                </div>
                                <!--end::Actions-->
                            </div>
                            <!--end::Head-->
                            <!--begin::Info-->
                            <div class="d-flex flex-wrap justify-content-start">
                                <!--begin::Stats-->
                                <div class="d-flex flex-wrap">
                                    <!--begin::Stat-->
                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">

                                        <div class="fw-bold fs-6 text-gray-400">Màu sắc</div>

                                        <!--begin::Number-->
                                        <div class="d-flex align-items-center">
                                            <div class="fs-4 fw-bolder">{{ $color }}</div>
                                        </div>
                                        <!--end::Number-->
                                        <!--begin::Label-->
                                        <!--end::Label-->
                                    </div>

                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">

                                        <div class="fw-bold fs-6 text-gray-400">Ngày đăng kí</div>

                                        <!--begin::Number-->
                                        <div class="d-flex align-items-center">
                                            <div class="fs-4 fw-bolder">{{ $year }}</div>
                                        </div>
                                        <!--end::Number-->
                                        <!--begin::Label-->
                                        <!--end::Label-->
                                    </div>

                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">

                                        <div class="fw-bold fs-6 text-gray-400">Km</div>

                                        <!--begin::Number-->
                                        <div class="d-flex align-items-center">
                                            <div class="fs-4 fw-bolder">{{ $km }} KM</div>
                                        </div>
                                        <!--end::Number-->
                                        <!--begin::Label-->
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Stat-->

                                </div>
                                <!--end::Stats-->
                                <!--begin::Users-->
                                <!--end::Users-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                </div>
            </div>

            @if($showDeleteModal && checkPermission('product-delete'))
                <div class="modal fade show" id="createModal"
                     style="display: block; padding-right: 5px;"  tabindex="-1"
                     aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-450px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Form-->
                            <div class="modal-header" id="kt_modal_add_customer_header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bolder">Xóa xe thuê!</h2>
                                <!--end::Modal title-->
                                <!--begin::Close-->
                                <div wire:click="closeModal" id="kt_modal_add_customer_close"
                                     class="btn btn-icon btn-sm btn-active-icon-primary">
                                    <!--begin::Svg Icon | path: icons/stockholm/Navigation/Close.svg-->
                                    <span class="svg-icon svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1">
                                                <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                                   fill="#000000">
                                                    <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1"></rect>
                                                    <rect fill="#000000" opacity="0.5"
                                                          transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                                          x="0" y="7" width="16" height="2" rx="1"></rect>
                                                </g>
                                            </svg>
                                        </span>
                                    <!--end::Svg Icon-->
                                </div>
                                <!--end::Close-->
                            </div>
                            <!--end::Modal header-->
                            <!--begin::Modal body-->
                            <div class="modal-body">
                                <!--begin::Scroll-->
                                <div style="font-size: 14px">
                                    Bạn có chắc chắn muốn tiếp tục. Dữ liệu không thể phục hồi!
                                </div>
                            </div>

                            <div class="modal-footer flex-center">
                                <!--begin::Button-->
                                <button wire:click="destroy" class="btn btn-danger">
                                    <span class="indicator-label">Xóa</span>
                                </button>

                                <button wire:click="closeModal" type="reset"
                                        id="kt_modal_add_customer_cancel" class="btn btn-white me-3">Huỷ
                                </button>
                                <!--end::Button-->
                            </div>
                            <!--end::Form-->
                        </div>
                    </div>
                </div>
            @endif

            <div class="row g-6 g-xl-9">
                <!--begin::Col-->
                <div class="col-lg-6">
                    <!--begin::Graph-->
                    <div class="card card-flush h-lg-100 pb-9 pe-9 ps-9">
                        <!--begin::Card header-->
                        <div class="card-header mt-6 p-3">
                            <!--begin::Card title-->
                            <div class="card-title flex-column">
                                <h3 class="fw-bolder">Thông tin</h3>
                                <!--begin::Labels-->
                                <!--end::Labels-->
                            </div>
                            <!--end::Card title-->
                            <!--begin::Card toolbar-->
                            <!--end::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-10 pb-0 px-5 p">
                            <!--begin::Chart-->
                            <div id="kt_project_overview_graph" class="card-rounded-bottom">
                                <div class="fs-6 d-flex justify-content-between mb-4">
                                    <div class="fw-bold">Biển số</div>
                                    <div class="d-flex fw-bolder">{{ $licensePlates }}</div>
                                </div>
                                <div class="separator separator-dashed mb-5"></div>

                                <div class="fs-6 d-flex justify-content-between mb-4">
                                    <div class="fw-bold">Nhãn hiệu</div>
                                    <div class="d-flex fw-bolder">{{ $this->brand ? $this->brand->name : 'Chưa có' }}</div>
                                </div>
                                <div class="separator separator-dashed mb-5"></div>


                                <div class="fs-6 d-flex justify-content-between mb-4">
                                    <div class="fw-bold">Giá</div>
                                    <div class="d-flex fw-bolder">{{ number_format($price) }} đ/h</div>
                                </div>
                            </div>
                            <!--end::Chart-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Graph-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-lg-6">
                    <!--begin::Graph-->
                    <div class="card card-flush h-lg-100 pb-9 pe-9 ps-9">
                        <!--begin::Card header-->
                        <div class="card-header mt-6 p-3">
                            <!--begin::Card title-->
                            <div class="card-title flex-column">
                                <h3 class="fw-bolder">Thông số khác</h3>
                                <!--begin::Labels-->
                                <!--end::Labels-->
                            </div>
                            <!--end::Card title-->
                            <!--begin::Card toolbar-->
                            <!--end::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-10 pb-0 px-5 p">
                            <!--begin::Chart-->
                            <div id="kt_project_overview_graph" class="card-rounded-bottom">

                                @foreach($otherParameters as $otherParameter)
                                    <div class="fs-6 d-flex justify-content-between mb-4">
                                        <div class="fw-bold">{{ $otherParameter['key'] }}</div>
                                        <div class="d-flex fw-bolder">{{ $otherParameter['value'] }}</div>
                                    </div>
                                    @if($otherParameter != $loop->last)
                                        <div class="separator separator-dashed mb-5"></div>
                                    @endif
                                @endforeach
                            </div>
                            <!--end::Chart-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Graph-->
                </div>
                <div class="col-lg">
                    <!--begin::Graph-->
                    <div class="card card-flush h-lg-100">
                        <!--begin::Card header-->
                        <div class="card-header mt-6">
                            <!--begin::Card title-->
                            <div class="card-title flex-column">
                                <h3 class="fw-bolder mb-1">Mô tả</h3>
                                <!--begin::Labels-->
                                <!--end::Labels-->
                            </div>
                            <!--end::Card title-->
                            <!--end::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-10 pb-0 px-5">
                            <!--begin::Chart-->
                            <div id="kt_project_overview_graph" class="card-rounded-bottom" style="height: 300px">
                                {{ $description }}
                            </div>
                            <!--end::Chart-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Graph-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Table-->
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
</div>
