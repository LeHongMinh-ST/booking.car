@section('title')
    Yêu cầu thuê xe - Cập nhật
@endsection

@section('script')
    <script>

        var start = '{{ $orderTime['start'] }}'
        var end = '{{ $orderTime['end'] }}'
        var productID = '{{ $productId }}'

        $('#productId').val(productID).trigger('change')

        $("#orderTime").daterangepicker({
            timePicker: true,
            startDate: moment(start, 'DD-MM-YYYY HH:mm:ss'),
            endDate: moment(end, 'DD-MM-YYYY HH:mm:ss'),
            locale: {
                format: "DD/M/YYYY HH:mm:ss",
                cancelLabel: 'Thoát',
                applyLabel: 'Đồng ý',
                separator: " - ",
                "fromLabel": "Từ",
                "toLabel": "Đến",
                "customRangeLabel": "Custom",
                "daysOfWeek": [
                    "CN",
                    "T2",
                    "T3",
                    "T4",
                    "T5",
                    "T6",
                    "T7"
                ],
                "monthNames": [
                    "Tháng 1",
                    "Tháng 2",
                    "Tháng 3",
                    "Tháng 4",
                    "Tháng 5",
                    "Tháng 6",
                    "Tháng 7",
                    "Tháng 8",
                    "Tháng 9",
                    "Tháng 10",
                    "Tháng 11",
                    "Tháng 12",
                ],
            },
        }).on('change', function () {
            Livewire.emit('changeOrderTime', {
                'start': $(this).data('daterangepicker').startDate.format('DD-M-YYYY HH:mm:ss'),
                'end': $(this).data('daterangepicker').endDate.format('DD-M-YYYY HH:mm:ss')
            })
        })


        $('#productId').change(function () {
            Livewire.emit('changeProductId', $(this).val())
        })

        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
            language: 'vi'
        };
        CKEDITOR.replace('editor', options).on('change', (e) => {
            Livewire.emit('changeNote', e.editor.getData())
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
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Cập nhật yêu cầu</h1>
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
                        <a href="{{ route('admin.order') }}" class="text-muted text-hover-primary">Yêu cầu thuê xe</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Cập nhật yêu cầu</li>
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
                                <h3 class="m-0 text-gray-900">Thông tin</h3>
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
                                    <label class="required fs-6 fw-bold mb-2">Tên khách hàng</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" wire:model="name" class="form-control form-control-solid">
                                    @error('name')
                                    <div class="fv-plugins-message-container">
                                        <div data-field="name" data-validator="notEmpty"
                                             class="fv-help-block">{{ $message }}</div>
                                    </div>
                                    @enderror
                                </div>

                                <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-bold mb-2">CMT/CCCD</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" wire:model="personId" class="form-control form-control-solid">
                                    @error('personId')
                                    <div class="fv-plugins-message-container">
                                        <div data-field="personId" data-validator="notEmpty"
                                             class="fv-help-block">{{ $message }}</div>
                                    </div>
                                    @enderror
                                </div>

                                <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-bold mb-2">Số điện thoại</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" wire:model="phone" class="form-control form-control-solid">
                                    @error('phone')
                                    <div class="fv-plugins-message-container">
                                        <div data-field="name" data-validator="notEmpty"
                                             class="fv-help-block">{{ $message }}</div>
                                    </div>
                                    @enderror
                                </div>

                                <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                        <span class="required">Địa chỉ</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" wire:model="address" class="form-control form-control-solid"
                                           placeholder="">
                                    @error('address')
                                    <div class="fv-plugins-message-container">
                                        <div data-field="name" data-validator="notEmpty"
                                             class="fv-help-block">{{ $message }}</div>
                                    </div>
                                    @enderror
                                </div>

                                <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                        <span class="required">Hộ khẩu thường trú</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" wire:model="permanentResidence"
                                           class="form-control form-control-solid" placeholder="">
                                    @error('permanentResidence')
                                    <div class="fv-plugins-message-container">
                                        <div data-field="name" data-validator="notEmpty"
                                             class="fv-help-block">{{ $message }}</div>
                                    </div>
                                    @enderror
                                </div>

                                <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-bold mb-2">Xe thuê</label>
                                    <div wire:ignore>
                                        <select wire:model="productId"
                                                class="form-select form-select-solid"
                                                data-allow-clear="true"
                                                id="productId"
                                                data-control="select2"
                                                data-placeholder="Chọn nhãn hiệu">
                                            <option value=""></option>
                                            @foreach($products as $product)
                                                <option
                                                    value="{{ $product->id }}">{{ $product->name . ' - ' . $product->license_plates }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('productId')
                                    <div class="fv-plugins-message-container">
                                        <div data-field="productId" data-validator="notEmpty"
                                             class="fv-help-block">{{ $message }}</div>
                                    </div>
                                    @enderror
                                </div>

                                <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-bold mb-2">Tiền đặt cọc</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" wire:model="priceDeposits"
                                           class="form-control form-control-solid">
                                    @error('priceDeposits')
                                    <div class="fv-plugins-message-container">
                                        <div data-field="priceDeposits" data-validator="notEmpty"
                                             class="fv-help-block">{{ $message }}</div>
                                    </div>
                                    @enderror
                                </div>

                                <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-bold mb-2">Thời gian</label>
                                    <input class="form-control form-control-solid" wire:modal="orderTime"
                                           placeholder="Chọn thời gian thuê" id="orderTime"/>
                                    <!--end::Input group-->
                                    @error('orderTime')
                                    <div class="fv-plugins-message-container">
                                        <div data-field="orderTime" data-validator="notEmpty"
                                             class="fv-help-block">{{ $message }}</div>
                                    </div>
                                    @enderror
                                </div>

                                <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container" wire:ignore>
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                        <span>Ghi chú</span>
                                    </label>
                                    <!--end::Label-->
                                    <textarea wire:model="description" id="editor"
                                              class="form-control form-control-solid" rows="5" placeholder="">
                                        {!! $note !!}
                                    </textarea>
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
                                        <button wire:click="update" type="submit" class="btn btn-primary w-100">
                                            <span class="svg-icon svg-icon-primary svg-icon-2"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Design/Edit.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
                                                        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
                                                    </g>
                                                </svg><!--end::Svg Icon-->
                                            </span>
                                            <span class="indicator-label">Lưu</span>
                                        </button>
                                    </div>
                                    <div class="col">
                                        <a href="{{ route('admin.product') }}" class="btn btn-warning me-3 w-100">
                                            <span class="svg-icon svg-icon-primary svg-icon-2"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Design/Circle.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
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

                </div>
            </div>

            <!--end::Card-->
            <!--begin::Modals-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
