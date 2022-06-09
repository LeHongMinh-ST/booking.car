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
                                    <div
                                        class="d-flex flex-wrap fw-bold mb-4 fs-5 text-gray-400">{{ $licensePlates }}</div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Actions-->
                                <div class="d-flex mb-4">
                                    @if(checkPermission('product-update'))
                                        <a href="{{ route('admin.product.edit', $productId)}}"
                                           class="btn btn-sm btn-primary me-3">
                                            <span class="svg-icon svg-icon-primary svg-icon-2"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Design/Edit.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path
                                                        d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
                                                        fill="#000000" fill-rule="nonzero"
                                                        transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
                                                    <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
                                                </g>
                                            </svg><!--end::Svg Icon-->
                                            </span>
                                            Sửa
                                        </a>
                                    @endif
                                    @if(checkPermission('product-delete'))
                                        <a href="#" wire:click="openDeleteModal()" class="btn btn-sm btn-danger me-3">
                                        <span class="svg-icon svg-icon-primary svg-icon-2"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Home/Trash.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path d="M6,8 L18,8 L17.106535,19.6150447 C17.04642,20.3965405 16.3947578,21 15.6109533,21 L8.38904671,21 C7.60524225,21 6.95358004,20.3965405 6.89346498,19.6150447 L6,8 Z M8,10 L8.45438229,14.0894406 L15.5517885,14.0339036 L16,10 L8,10 Z" fill="#000000" fill-rule="nonzero"/>
                                                    <path d="M14,4.5 L14,3.5 C14,3.22385763 13.7761424,3 13.5,3 L10.5,3 C10.2238576,3 10,3.22385763 10,3.5 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>
                                                </g>
                                            </svg><!--end::Svg Icon-->
                                        </span>
                                            Xóa
                                        </a>
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

                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">

                                        <div class="fw-bold fs-6 text-gray-400">Hộp số</div>

                                        <!--begin::Number-->
                                        <div class="d-flex align-items-center">
                                            <div class="fs-4 fw-bolder">{{ $typeCar== \App\Models\Product::TYPE_CAR['auto'] ? "Tự động" : "Sàn" }}</div>
                                        </div>
                                        <!--end::Number-->
                                        <!--begin::Label-->
                                        <!--end::Label-->
                                    </div>
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

                                        <div class="fw-bold fs-6 text-gray-400">Ngày đăng ký</div>

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

                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">

                                        <div class="fw-bold fs-6 text-gray-400">Số chỗ</div>

                                        <!--begin::Number-->
                                        <div class="d-flex align-items-center">
                                            <div class="fs-4 fw-bolder">{{ $number }}</div>
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
                                                 width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1">
                                                <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                                   fill="#000000">
                                                    <rect fill="#000000" x="0" y="7" width="16" height="2"
                                                          rx="1"></rect>
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
                <div class="col-lg-6">
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
                <div class="col-lg-6">
                    <!--begin::Graph-->
                    <div class="card card-flush h-lg-100">
                        <!--begin::Card header-->
                        <div class="card-header mt-6">
                            <!--begin::Card title-->
                            <div class="card-title flex-column">
                                <h3 class="fw-bolder mb-1">Ảnh</h3>
                                <!--begin::Labels-->
                                <!--end::Labels-->
                            </div>
                            <!--end::Card title-->
                            <!--end::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body">
                            <!--begin::Chart-->
                            <div id="kt_carousel_1_carousel" class="carousel carousel-custom slide" data-bs-ride="carousel" data-bs-interval="8000">
                                <!--begin::Heading-->

                                <!--end::Heading-->

                                <!--begin::Carousel-->
                                <div class="carousel-inner pt-8 text-center">
                                    <!--begin::Item-->
                                    @foreach($images as $image)
                                    <div class="carousel-item @if($loop->index == 0) active @endif">
                                        <img src="{{ $image->image_url }}" alt="">
                                    </div>
                                    <!--end::Item-->
                                     @endforeach
                                    <!--end::Item-->
                                </div>

                                <div class="d-flex align-items-center justify-content-evenly flex-wrap">
                                    <!--begin::Label-->
                                    <!--end::Label-->
                                    <!--begin::Carousel Indicators-->
                                    <ol class="p-0 m-0 carousel-indicators carousel-indicators-dots">
                                        @foreach($images as $image)
                                            <li data-bs-target="#kt_carousel_1_carousel" data-bs-slide-to="{{ $loop->index }}" class="ms-1 @if($loop->index == 0) active @endif"></li>
                                            <!--end::Item-->
                                        @endforeach
                                    </ol>
                                    <!--end::Carousel Indicators-->
                                </div>
                                <!--end::Carousel-->
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
