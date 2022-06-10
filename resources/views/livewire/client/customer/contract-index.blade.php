@section('title')
    Hợp đồng
@endsection
@section('script')
    <script>
        window.addEventListener('openDeleteModal', event => {
            $('#deleteModal').modal('show')
        })

        window.addEventListener('closeModal', event => {
            $('#deleteModal').modal('hide')
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
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Danh sách hợp đồng</h1>
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
                    <li class="breadcrumb-item text-muted">Hợp đồng</li>
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
                            <input type="text" data-kt-contract-table-filter="search" wire:model="search"
                                   class="form-control form-control-solid w-250px ps-15" placeholder="Tìm kiếm...">
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                            <!--begin::Svg Icon | path: icons/stockholm/Text/Filter.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path d="M5,4 L19,4 C19.2761424,4 19.5,4.22385763 19.5,4.5 C19.5,4.60818511 19.4649111,4.71345191 19.4,4.8 L14,12 L14,20.190983 C14,20.4671254 13.7761424,20.690983 13.5,20.690983 C13.4223775,20.690983 13.3458209,20.6729105 13.2763932,20.6381966 L10,19 L10,12 L4.6,4.8 C4.43431458,4.5790861 4.4790861,4.26568542 4.7,4.1 C4.78654809,4.03508894 4.89181489,4 5,4 Z" fill="#000000"></path>
                                    </g>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->Lọc
                        </button>

                        <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
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


                                <div class="mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label fs-5 fw-bold mb-3">Trạng thái tài khoản:</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select wire:model="status" class="form-select form-select-solid fw-bolder">
                                        <option value="">Tất cả</option>
                                        <option value="{{ \App\Models\Contract::STATUS['deposited'] }}">Đã đặt cọc</option>
                                        <option value="{{ \App\Models\Contract::STATUS['processing'] }}">Đang thực hiện</option>
                                        <option value="{{ \App\Models\Contract::STATUS['complete'] }}">Hoàn thành</option>
                                        <option value="{{ \App\Models\Contract::STATUS['cancel'] }}">Đã huỷ</option>
                                    </select>
                                    <!--end::Input-->
                                </div>
                                @if($status)
                                    <div class="d-flex justify-content-end">
                                        <button type="reset" wire:click="resetFilter" class="btn btn-white btn-active-light-primary me-2" data-kt-menu-dismiss="true" data-kt-contract-table-filter="reset">Khôi phục</button>
                                    </div>
                            @endif
                            <!--end::Actions-->
                            </div>
                            <!--end::Content-->
                        </div>

                        <!--begin::Group actions-->
                        <!--end::Group actions-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <div id="kt_contracts_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                   id="kt_contracts_table" role="grid">
                                <!--begin::Table head-->
                                <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0" role="row">
                                    <th style="width: 50px;" >
                                        STT
                                    </th>

                                    <th class="min-w-125px"
                                        style="width: 163.734px;">Tên Hợp đồng
                                    </th>
                                    <th class="min-w-125px" tabindex="0"
                                        style="width: 100px;">Mã Hợp đồng
                                    </th>
                                    <th class="min-w-125px" tabindex="0"
                                        style="width: 163.734px;">Tên Khách Hàng
                                    </th>
                                    <th class="min-w-125px" tabindex="0"
                                        style="width: 163.734px;">Số điện thoại
                                    </th>

                                    <th class="min-w-125px" tabindex="0"
                                        style="width: 163.734px;">Giá trị hợp đồng
                                    </th>

                                    <th class="min-w-125px" tabindex="0"
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
                                @forelse($contracts as $contract)
                                    <tr class="odd">
                                        <!--begin::Name=-->
                                        <td>
                                            {{ $loop->index + 1 + $contracts->perPage() * ($contracts->currentPage() - 1)   }}
                                        </td>

                                        <!--end::Name=-->
                                        <!--end::Payment method=-->
                                        <!--begin::Date=-->
                                        <td><a href="{{ route('customer.contract.detail', $contract->id) }}">{{ $contract->name }}</a></td>
                                        <td>{{ $contract->code }}</td>
                                        <td>{{ $contract->customerOrder->name }}</td>
                                        <td>{{ $contract->customerOrder->phone }}</td>
                                        <td>{{ $contract->totalPriceText }}</td>
                                        <td>
                                            {!! $contract->statusText !!}
                                        </td>
                                        <!--end::Date=-->
                                        <!--begin::Action=-->
                                        <td class="text-center btnAction">

                                         <a href="href="{{ route('customer.contract.detail', $contract->id) }}"
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
                                            </a>
                                        <!--end::Menu-->
                                        </td>
                                        <!--end::Action=-->
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" style="text-align: center">
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
                                        <select wire:model="perPage" class="form-select form-select-sm form-select-solid">
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
                                <div class="dataTables_paginate paging_simple_numbers" id="kt_contracts_table_paginate">
                                    {{ $contracts->links() }}
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

            <!--begin::Modal - Adjust Balance-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>