@section('title')
    Yêu cầu thuê xe
@endsection

@section('script')
    <script>
        window.addEventListener('openDeleteModal', event => {
            $('#deleteModal').modal('show')
        })

        window.addEventListener('openDetailModal', event => {
            $('#detailModal').modal('show')
        })

        window.addEventListener('openCancelModal', event => {
            $('#cancelModal').modal('show')
        })

        window.addEventListener('closeModal', event => {
            $('#deleteModal').modal('hide')
            $('#detailModal').modal('hide')
            $('#cancelModal').modal('hide')
        })

        window.addEventListener('closeModalCancel', event => {
            $('#cancelModal').modal('hide')
        })

        $('#filterStatus').change(function () {
            Livewire.emit('changeFilterStatus', $(this).val())
        })

        window.addEventListener('clearFilter', () => {
            $('#filterStatus').val(null).trigger('change')
            $("#orderTime").data('daterangepicker').setStartDate(moment().toDate())
            $("#orderTime").data('daterangepicker').setEndDate(moment().toDate())
            $("#orderTime").val(null).trigger('change')
            Livewire.emit('changeOrderTime', {})
        })

        $('#noteCancel').keyup(function () {
            Livewire.emit('changeNoteCancel', $(this).val())
        })

        $("#orderTime").daterangepicker({
            timePicker: true,
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

        $("#orderTime").val(null).trigger('change')
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
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Danh sách yêu cầu</h1>
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
                    <li class="breadcrumb-item text-muted">Yêu cầu thuê xe</li>
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
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <!--begin::Svg Icon | path: icons/stockholm/General/Search.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                     height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none"
                                       fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path
                                                d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                        <path
                                                d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                                fill="#000000" fill-rule="nonzero"></path>
                                    </g>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <input type="text" data-kt-customer-table-filter="search" wire:model="search"
                                   class="form-control form-control-solid w-250px ps-15" placeholder="Tìm kiếm...">
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click"
                                data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                            <!--begin::Svg Icon | path: icons/stockholm/Text/Filter.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path d="M5,4 L19,4 C19.2761424,4 19.5,4.22385763 19.5,4.5 C19.5,4.60818511 19.4649111,4.71345191 19.4,4.8 L14,12 L14,20.190983 C14,20.4671254 13.7761424,20.690983 13.5,20.690983 C13.4223775,20.690983 13.3458209,20.6729105 13.2763932,20.6381966 L10,19 L10,12 L4.6,4.8 C4.43431458,4.5790861 4.4790861,4.26568542 4.7,4.1 C4.78654809,4.03508894 4.89181489,4 5,4 Z"
                                              fill="#000000"></path>
                                    </g>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->Lọc
                        </button>

                        <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true" wire:ignore>
                            <!--begin::Header-->
                            <div class="px-7 py-5">
                                <div class="fs-4 text-dark fw-bolder">Lọc</div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Separator-->
                            <div class="separator border-gray-200"></div>
                            <!--end::Separator-->
                            <!--begin::Content-->
                            <div class="px-7 py-5">
                                <!--begin::Input group-->
                                <div class="mb-10" wire:ignore>
                                    <!--begin::Label-->
                                    <label class="form-label fs-5 fw-bold mb-3">Trạng thái:</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select wire:model="status"
                                            class="form-select form-select-solid"
                                            data-allow-clear="true"
                                            id="filterStatus"
                                            data-control="select2"
                                            data-hide-search="true"
                                            data-placeholder="Chọn trạng thái"
                                    >
                                        <option value=""></option>
                                        <option value="{{ \App\Models\Order::STATUS['no_deposit_yet'] }}">Chưa đặt cọc
                                        </option>
                                        <option value="{{ \App\Models\Order::STATUS['deposited'] }}">Đã đặt cọc</option>
                                        <option value="{{ \App\Models\Order::STATUS['contract'] }}">Hợp đồng</option>
                                        <option value="{{ \App\Models\Order::STATUS['cancel'] }}">Hủy</option>
                                    </select>

                                    <!--end::Input-->
                                </div>

                                <div class="mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label fs-5 fw-bold mb-3">Ngày thuê xe:</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" wire:modal="orderTime"
                                           placeholder="Chọn thời gian thuê" id="orderTime"/>

                                    <!--end::Input-->
                                </div>
                                <div class="d-flex justify-content-end" wire:ignore>
                                    <button type="reset" wire:click="resetFilter"
                                            class="btn btn-white btn-active-light-primary me-2">Khôi phục
                                    </button>
                                </div>
                                <!--end::Actions-->
                            </div>
                            <!--end::Content-->
                        </div>


                        <!--end::Group actions-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <div id="kt_customers_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="table-responsive">
                            <table
                                    class="table align-middle table-rounded table-row-dashed fs-6 gy-5 dataTable no-footer"
                                    id="kt_customers_table" role="grid">
                                <!--begin::Table head-->
                                <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0" role="row">
                                    <th style="width: 50px;">
                                        STT
                                    </th>
                                    <th class="min-w-125px"
                                        style="width: 163.734px;">Yêu cầu
                                    </th>

                                    <th class="min-w-125px"
                                        style="width: 163.734px;">Mã yêu cầu
                                    </th>
                                    <th class="min-w-125px"
                                        style="width: 163.734px;">Tên khách hàng
                                    </th>

                                    <th class="min-w-125px"
                                        style="width: 163.734px;">Xe thuê
                                    </th>

                                    <th class="min-w-125px"
                                        style="width: 163.734px;">Thời gian bắt đầu
                                    </th>

                                    <th class="min-w-125px"
                                        style="width: 163.734px;">Thời gian trả xe
                                    </th>

                                    <th class="min-w-125px"
                                        style="width: 163.734px;">Trạng thái
                                    </th>

                                    <th class="text-center min-w-70px sorting_disabled" rowspan="1" colspan="1"
                                        aria-label="Actions" style="width: 200px;">Hành động
                                    </th>
                                </tr>
                                <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="fw-bold text-gray-600">
                                @forelse($orders as $order)
                                    <tr class="odd">
                                        <!--begin::Name=-->
                                        <td>
                                            {{ $loop->index + 1 + $orders->perPage() * ($orders->currentPage() - 1)   }}
                                        </td>
                                        <!--end::Name=-->
                                        <!--end::Payment method=-->
                                        <!--begin::Date=-->
                                        <td><a href="#"
                                               wire:click="openDetailModal({{ $order->id}})">{{ $order->name }}</a></td>
                                        <td>{{ $order->code }}</td>
                                        <td>{{ $order->customerOrder->name ?? '' }}</td>
                                        <td>{{ $order->productOrder->name ?? '' }}</td>
                                        <td>{{ $order->pickDateText ?? '' }}</td>
                                        <td>{{ $order->dropDateText ?? '' }}</td>
                                        <td>{!! $order->statusText !!}</td>

                                        <!--end::Date=-->
                                        <!--begin::Action=-->
                                        <td class="text-center btnAction">
                                            <span
                                                    wire:click="openDetailModal({{ $order->id }})"
                                                    class="btn btn-sm btn-clean btn-icon mr-2"
                                                    style="cursor: pointer" title="Chi tiết">
                                                  <span class="svg-icon svg-icon-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                         height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                           fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"/>
                                                            <path d="M3,12 C3,12 5.45454545,6 12,6 C16.9090909,6 21,12 21,12 C21,12 16.9090909,18 12,18 C5.45454545,18 3,12 3,12 Z"
                                                                  fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                            <path d="M12,15 C10.3431458,15 9,13.6568542 9,12 C9,10.3431458 10.3431458,9 12,9 C13.6568542,9 15,10.3431458 15,12 C15,13.6568542 13.6568542,15 12,15 Z"
                                                                  fill="#000000" opacity="0.3"/>
                                                        </g>
                                                    </svg>
                                                  </span>
                                            </span>

                                                <a href="{{ route('customer.order.update', $order->id) }}"
                                                   class="btn btn-sm btn-clean btn-icon mr-2"
                                                   title="Chỉnh sửa">
                                                <span class="svg-icon svg-icon-2"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Design/Edit.svg--><svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                           fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"/>
                                                            <path
                                                                    d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
                                                                    fill="#000000" fill-rule="nonzero"
                                                                    transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
                                                            <rect fill="#000000" opacity="0.3" x="5" y="20"
                                                                  width="15" height="2" rx="1"/>
                                                        </g>
                                                    </svg><!--end::Svg Icon-->
                                                </span>
                                                </a>

                                        <!--end::Menu-->
                                        </td>

                                        <!--end::Action=-->
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" style="text-align: center">
                                            Không có bản ghi nào phù hợp!
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                                <!--end::Table body-->
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                                <div class="dataTables_length">
                                    <label>
                                        <select wire:model="perPage"
                                                class="form-select form-select-sm form-select-solid">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <div
                                    class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                                <div class="dataTables_paginate paging_simple_numbers" id="kt_customers_table_paginate">
                                    {{ $orders->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
            <!--begin::Modals-->
            <!--begin::Modal - Customers - Add-->
            <div class="modal fade" id="detailModal"
                 wire:ignore.self
                 tabindex="-1"
                 aria-hidden="true">
                <!--begin::Modal dialog-->
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <!--begin::Modal content-->
                    <div class="modal-content">
                        <!--begin::Form-->
                        <div class="card card-flush pt-3 mb-5 mb-xl-10">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2 class="fw-bolder">{{ $name }}</h2>
                                </div>
                                <!--begin::Card title-->
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    @if($statusOrder == \App\Models\Order::STATUS['deposited'] || $statusOrder == \App\Models\Order::STATUS['no_deposit_yet'])
                                        <span class="btn btn-light-danger m-1"
                                              wire:click="openCancelModal({{ $selectId  }})">
                                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Code/Error-circle.svg--><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                                                    <path d="M12.0355339,10.6213203 L14.863961,7.79289322 C15.2544853,7.40236893 15.8876503,7.40236893 16.2781746,7.79289322 C16.6686989,8.18341751 16.6686989,8.81658249 16.2781746,9.20710678 L13.4497475,12.0355339 L16.2781746,14.863961 C16.6686989,15.2544853 16.6686989,15.8876503 16.2781746,16.2781746 C15.8876503,16.6686989 15.2544853,16.6686989 14.863961,16.2781746 L12.0355339,13.4497475 L9.20710678,16.2781746 C8.81658249,16.6686989 8.18341751,16.6686989 7.79289322,16.2781746 C7.40236893,15.8876503 7.40236893,15.2544853 7.79289322,14.863961 L10.6213203,12.0355339 L7.79289322,9.20710678 C7.40236893,8.81658249 7.40236893,8.18341751 7.79289322,7.79289322 C8.18341751,7.40236893 8.81658249,7.40236893 9.20710678,7.79289322 L12.0355339,10.6213203 Z"
                                                          fill="#000000"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span>
                                            Hủy yêu cầu
                                        </span>
                                    @endif

                                </div>
                                <!--end::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-3">
                                <!--begin::Section-->
                                <div class="mb-7">
                                    <!--begin::Title-->
                                    <h5 class="mb-4">Thông tin chung:</h5>
                                    <!--end::Title-->
                                    <!--begin::Row-->
                                    <div class="row">
                                        <!--begin::Row-->
                                        <div class="col-lg-6">
                                            <!--begin::Details-->
                                            <table class="table fs-6 fw-bold gs-0 gy-2 gx-2 m-0">
                                                <!--begin::Row-->

                                                <!--end::Row-->
                                                <!--begin::Row-->
                                                <tr class="">
                                                    <td class="text-gray-400">Tên khách hàng:</td>
                                                    <td class="text-gray-800">{{ $customerName ?? ''}}</td>
                                                </tr>

                                                <tr class="">
                                                    <td class="text-gray-400">CCCD/CMT:</td>
                                                    <td class="text-gray-800">{{ $personId  ?? ''}}</td>
                                                </tr>
                                                <!--end::Row-->
                                                <!--begin::Row-->

                                                <tr class="">
                                                    <td class="text-gray-400">Số điện thoại:</td>
                                                    <td class="text-gray-800">{{ $order->customerOrder->phone ?? '' }}</td>
                                                </tr>
                                                <tr class="">
                                                    <td class="text-gray-400">Địa chỉ:</td>
                                                    <td class="text-gray-800">{{ $order->customerOrder->address ?? ''}}</td>
                                                </tr>

                                                <tr class="">
                                                    <td class="text-gray-400">Hộ khẩu thường chú:</td>
                                                    <td class="text-gray-800">{{ $order->customerOrder->permanent_residence ?? '' }}</td>
                                                </tr>
                                                <!--end::Row-->
                                                <!--begin::Row-->

                                                <!--end::Row-->
                                            </table>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Row-->
                                        <!--begin::Row-->
                                        <div class="col-lg-6">
                                            <!--begin::Details-->
                                            <table class="table fs-6 fw-bold gs-0 gy-2 gx-2 m-0">
                                                <!--begin::Row-->
                                                <tr class="">
                                                    <td class="text-gray-400 w-50">Mã yêu cầu:</td>
                                                    <td class="text-gray-800">
                                                        <p class="text-gray-800 text-hover-primary">{{ $code ?? '' }}</p>
                                                    </td>
                                                </tr>
                                                <!--end::Row-->
                                                <!--begin::Row-->
                                                <tr class="">
                                                    <td class="text-gray-400">Trạng thái:</td>
                                                    <td class="text-gray-800">
                                                        {!! $statusText ?? '' !!}
                                                        @if($this->contract)
                                                            <span style="margin-left: 5px"><a href="{{ route('admin.contract.detail', $this->contract->id) }}">Xem hợp đồng</a></span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <!--end::Row-->
                                                <!--begin::Row-->
                                                <tr class="">
                                                    <td class="text-gray-400">Tiền đặ cọc:</td>
                                                    <td class="text-gray-800">
                                                        {{ number_format($priceDeposits ?? 0) }} VNĐ
                                                        @if($depositPrice > $priceDeposits)
                                                            <span style="color: #F1416C">(Còn thiếu: {{ number_format($depositPrice- $priceDeposits) }} VNĐ)</span>
                                                        @else
                                                            <span style="color:#258600;">(Đủ)</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <!--end::Row-->
                                                <!--begin::Row-->


                                                <tr class="">
                                                    <td class="text-gray-400">Thời gian thuê:</td>
                                                    <td class="text-gray-800">{{ $pickDateText ?? '' }}</td>
                                                </tr>

                                                <tr class="">
                                                    <td class="text-gray-400">Thời gian trả:</td>
                                                    <td class="text-gray-800">{{ $dropDateText ?? '' }}</td>
                                                </tr>

                                                <tr class="">
                                                    <td class="text-gray-400">Tổng thời gian thuê:</td>
                                                    <td class="text-gray-800">{{ number_format($totalHours ?? 0) }}Giờ
                                                    </td>
                                                </tr>

                                                <tr class="">
                                                    <td class="text-gray-400">Tổng tiền:</td>
                                                    <td class="text-gray-800">{{ number_format($totalPrice ?? 0) }}VNĐ
                                                    </td>
                                                </tr>

                                                <!--end::Row-->
                                            </table>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Section-->
                                <!--begin::Section-->
                                <div class="mb-0">
                                    <!--begin::Title-->
                                    <h5 class="mb-4">Chi tiết xe:</h5>
                                    <!--end::Title-->
                                    <!--begin::Product table-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-dashed fs-6 gy-4 mb-0">
                                            <!--begin::Table head-->
                                            <thead>
                                            <!--begin::Table row-->
                                            <tr class="border-bottom border-gray-200 text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                <th class="min-w-150px">Ảnh</th>
                                                <th class="min-w-150px">Tên xe</th>
                                                <th class="min-w-125px">Biển kiểm xoát</th>
                                                <th class="min-w-125px">Màu sắc</th>
                                                <th class="min-w-125px">Ngày đăng ký</th>
                                                <th class="min-w-125px">Km sử dụng</th>
                                                <th class="min-w-125px">Giá thuê</th>
                                                <th class="min-w-125px">Giá cọc</th>
                                            </tr>
                                            <!--end::Table row-->
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody class="fw-bold text-gray-800">
                                            <tr>
                                                <td>
                                                    <a href="{{ route('admin.product.detail', $productId ?? 0) }}"
                                                       title="xem chi tiết">
                                                        @if($thumbnail)
                                                            <img class="image-input-wrapper w-100px h-100px image-input-outline"
                                                                 src="{{ $thumbnail }}" alt="">
                                                        @else
                                                            <img class="image-input-wrapper w-100px h-100px image-input-outline"
                                                                 src="{{ asset('admin/assets/img/default-image.jpg') }}"
                                                                 alt="">
                                                        @endif
                                                    </a>

                                                </td>
                                                <td>
                                                    <label class="w-150px"><a
                                                                href="{{ route('admin.product.detail', $productId ?? 0) }}"
                                                                title="xem chi tiết">{{ $productName ?? '' }}</a></label>
                                                </td>
                                                <td>
                                                    <span class="badge badge-light-danger">{{ $licensePlates ?? '' }}</span>
                                                </td>
                                                <td>{{ $color ?? '' }}</td>
                                                <td>{{ $year ?? '' }}</td>
                                                <td>{{ number_format($km ?? 0) }} km</td>
                                                <td>{{ number_format($price ?? 0) }} VNĐ / Giờ</td>
                                                <td>{{ number_format($depositPrice ?? 0) }} VNĐ</td>
                                            </tr>
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Product table-->
                                </div>

                                <div class="mb-0">
                                    <!--begin::Title-->
                                    <h5 class="mb-4">Ghi chú:</h5>
                                    <!--end::Title-->
                                    <!--begin::Product table-->
                                    <div>
                                        {!! $note !!}
                                    </div>
                                    <!--end::Product table-->
                                </div>

                                @if($noteCanceled)
                                    <div class="mb-0">
                                        <!--begin::Title-->
                                        <h5 class="mb-4">Lý do huỷ:</h5>
                                        <!--end::Title-->
                                        <!--begin::Product table-->
                                        <div>
                                            {!! $noteCanceled !!}
                                        </div>
                                        <!--end::Product table-->
                                    </div>
                            @endif
                            <!--end::Section-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <div class="card-footer text-end">
                            <buttuon wire:click="closeModal" class="btn btn-primary m-1">Đóng</buttuon>
                        </div>
                        <!--end::Form-->
                    </div>
                </div>
            </div>
            <!--end::Modal - Customers - Add-->
            <!--begin::Modal - Adjust Balance-->
            <div class="modal fade" id="deleteModal"
                 tabindex="-1"
                 aria-hidden="true">
                <!--begin::Modal dialog-->
                <div class="modal-dialog modal-dialog-centered mw-450px">
                    <!--begin::Modal content-->
                    <div class="modal-content">
                        <!--begin::Form-->
                        <div class="modal-header" id="kt_modal_add_customer_header">
                            <!--begin::Modal title-->
                            <h2 class="fw-bolder">Xóa yêu cầu</h2>
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
                            <button wire:click="cancelOrder" class="btn btn-danger">
                                <span class="indicator-label">Hủy</span>
                            </button>

                            <button wire:click="closeModalCancel" type="reset"
                                    id="kt_modal_add_customer_cancel" class="btn btn-white me-3">Đóng
                            </button>
                            <!--end::Button-->
                        </div>
                        <!--end::Form-->
                    </div>
                </div>
            </div>
            <!--end::Modal - New Card-->
            <!--end::Modals-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>

