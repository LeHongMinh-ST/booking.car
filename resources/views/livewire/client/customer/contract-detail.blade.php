@section('title')
    Hợp đồng - Chi tiết
@endsection

@section('script')

    <script>
        let config = {}
        config.font_defaultLabel = "Times New Roman"
        config.fontSize_defaultLabel = '15px';
        CKEDITOR.disableAutoInline = false;
        CKEDITOR.inline('editorContract', config)


        window.addEventListener('downloadPdf', () => {
            var newWin = window.open('', 'Print-Window');

            newWin.document.open();

            newWin.document.write('<html><body onload="window.print()">' + $('#editorContract').html() + '</body></html>');

            newWin.document.close();
        })

        window.addEventListener('openModalCheckComplete', event => {
            $('#completeModal').modal('show')
        })

        window.addEventListener('openModalCancel', event => {
            $('#cancelModal').modal('show')
        })

        window.addEventListener('closeModal', event => {
            $('#completeModal').modal('hide')
            $('#cancelModal').modal('hide')
        })
    </script>
@endsection

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div class="d-flex align-items-center me-3">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Chi tiết hợp đồng</h1>
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
                        <a href="{{ route('admin.contract') }}" class="text-muted text-hover-primary">Hợp đồng</a>
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
    <!--end::Toolbar-->
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <!--begin::Card-->
            <div class="card mb-5">
                <!--begin::Card header-->
                <div class="card-header border-0 p-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <!--begin::Svg Icon | path: icons/stockholm/General/Search.svg-->
                            <h3>{{ $contract->name }}</h3>
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <button type="button" class="btn btn-light-info me-3" wire:click="handlePrint"
                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                data-kt-menu-flip="top-end">
                            <!--begin::Svg Icon | path: icons/stockholm/Text/Filter.svg-->
                            <span class="svg-icon svg-icon-primary svg-icon-2"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Files/Import.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <rect fill="#000000" opacity="0.3"
                                          transform="translate(12.000000, 7.000000) rotate(-180.000000) translate(-12.000000, -7.000000) "
                                          x="11" y="1" width="2" height="12" rx="1"/>
                                    <path
                                            d="M17,8 C16.4477153,8 16,7.55228475 16,7 C16,6.44771525 16.4477153,6 17,6 L18,6 C20.209139,6 22,7.790861 22,10 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,9.99305689 C2,7.7839179 3.790861,5.99305689 6,5.99305689 L7.00000482,5.99305689 C7.55228957,5.99305689 8.00000482,6.44077214 8.00000482,6.99305689 C8.00000482,7.54534164 7.55228957,7.99305689 7.00000482,7.99305689 L6,7.99305689 C4.8954305,7.99305689 4,8.88848739 4,9.99305689 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,10 C20,8.8954305 19.1045695,8 18,8 L17,8 Z"
                                            fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                    <path
                                            d="M14.2928932,10.2928932 C14.6834175,9.90236893 15.3165825,9.90236893 15.7071068,10.2928932 C16.0976311,10.6834175 16.0976311,11.3165825 15.7071068,11.7071068 L12.7071068,14.7071068 C12.3165825,15.0976311 11.6834175,15.0976311 11.2928932,14.7071068 L8.29289322,11.7071068 C7.90236893,11.3165825 7.90236893,10.6834175 8.29289322,10.2928932 C8.68341751,9.90236893 9.31658249,9.90236893 9.70710678,10.2928932 L12,12.5857864 L14.2928932,10.2928932 Z"
                                            fill="#000000" fill-rule="nonzero"/>
                                </g>
                            </svg><!--end::Svg Icon--></span>
                            <!--end::Svg Icon-->Tải xuống
                        </button>
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->

            </div>
            <!--end::Card-->
            <div class="card">
                <div class="card-body">
                    <div class="container" id="editorContract">
                        {!! $contract->content !!}

                    </div>
                </div>
            </div>
            @if($contract->overtime)
                <div class="card">
                    <div class="card-header">
                        <h4> Ghi chú:
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div>
                                <h5>Số giờ phụ trội: {{ $contract->overtime }} giờ</h5>
                            </div>
                            <div>
                                <h5>Tổng tiền phải thanh toán thêm: {{ number_format($contract->overtime_price) }}
                                    VNĐ</h5>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
    <div class="modal fade" wire:ignore.self id="completeModal" tabindex="-1"
         aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Form-->
                <form class="form fv-plugins-bootstrap5 fv-plugins-framework" wire:submit.prevent="handleComplete">
                    <!--begin::Modal header-->
                    <div class="modal-header" id="kt_modal_add_customer_header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bolder">Hoàn thành hợp đồng</h2>
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
                    <div class="modal-body py-10 px-lg-17">
                        <!--begin::Scroll-->
                        <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true"
                             data-kt-scroll-activate="{default: false, lg: true}"
                             data-kt-scroll-max-height="auto"
                             data-kt-scroll-dependencies="#kt_modal_add_customer_header"
                             data-kt-scroll-wrappers="#kt_modal_add_customer_scroll"
                             data-kt-scroll-offset="300px">
                            <!--begin::Input group-->


                            <div class="fv-row mb-7 fv-plugins-icon-container">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">Số giờ phụ trội</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="number" wire:model="numberOvertime"
                                       class="form-control form-control-solid">
                            </div>

                            <div class="fv-row mb-7 fv-plugins-icon-container">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">Tiền phụ trội</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="number" wire:model="overtimePrice" disabled
                                       class="form-control form-control-solid">
                            </div>
                            <!--end::Modal body-->
                            <!--begin::Modal footer-->
                            <div class="modal-footer flex-center">
                                <!--begin::Button-->
                                <button type="submit" id="kt_modal_add_customer_submit" class="btn btn-primary">
                                    <span class="indicator-label">Lưu</span>
                                </button>

                                <button wire:click="closeModal" type="reset"
                                        id="kt_modal_add_customer_cancel" class="btn btn-white me-3">Huỷ
                                </button>
                                <!--end::Button-->
                            </div>
                        </div>
                    </div>
                    <!--end::Modal footer-->
                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>
    <div class="modal fade" id="cancelModal"
         wire:ignore.self
         tabindex="-1"
         aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-450px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Form-->
                <div class="modal-header" id="kt_modal_add_customer_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">Hủy yêu cầu</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div wire:click="closeModalCancel" id="kt_modal_add_customer_close"
                         class="btn btn-icon btn-sm btn-active-icon-primary">
                        <!--begin::Svg Icon | path: icons/stockholm/Navigation/Close.svg-->
                        <span class="svg-icon svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
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
                    <div style="font-size: 14px" class="mb-5">
                        Bạn có chắc chắn muốn tiếp tục. Dữ liệu không thể phục hồi!
                    </div>
                    <div>
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">Lý do</span>
                        </label>
                        <textarea name="" wire:model="noteCancel" id="noteCancel" class="form-control" rows="5">
                                </textarea>
                        @error('noteCancel')
                        <div class="fv-plugins-message-container">
                            <div data-field="name" data-validator="notEmpty"
                                 class="fv-help-block">{{ $message }}</div>
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="modal-footer flex-center">
                    <!--begin::Button-->
                    <button wire:click="handleDestroyContract" class="btn btn-danger">
                        <span class="indicator-label">Hủy</span>
                    </button>

                    <button wire:click="closeModal" type="reset"
                            id="kt_modal_add_customer_cancel" class="btn btn-white me-3">Đóng
                    </button>
                    <!--end::Button-->
                </div>
                <!--end::Form-->
            </div>
        </div>
    </div>
</div>
