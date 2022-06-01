@section('title')
    Khách hàng
@endsection
@section('script')
    <script>
        window.addEventListener('openDeleteModal', event => {
            $('#deleteModal').modal('show')
        })

        window.addEventListener('openResetModal', event => {
            $('#resetPasswordModal').modal('show')
        })

        window.addEventListener('closeModal', event => {
            $('#deleteModal').modal('hide')
            $('#resetPasswordModal').modal('hide')
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
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Danh sách khách hàng</h1>
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
                    <li class="breadcrumb-item text-muted">Khách hàng</li>
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
                                    <label class="form-label fs-5 fw-bold mb-3">Phân loại tài khoản:</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select wire:model="checkUserId" class="form-select form-select-solid fw-bolder">
                                        <option value="">Tất cả</option>
                                        <option value="1">Đã có tài khoản</option>
                                        <option value="2">Vãng lai</option>
                                    </select>
                                    <!--end::Input-->
                                </div>

                                <div class="mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label fs-5 fw-bold mb-3">Trạng thái tài khoản:</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select wire:model="status" class="form-select form-select-solid fw-bolder">
                                        <option value="">Tất cả</option>
                                        <option value="1">Kích hoạt</option>
                                        <option value="0">Khóa</option>
                                    </select>
                                    <!--end::Input-->
                                </div>
                                @if($status || $checkUserId)
                                    <div class="d-flex justify-content-end">
                                        <button type="reset" wire:click="resetFilter" class="btn btn-white btn-active-light-primary me-2" data-kt-menu-dismiss="true" data-kt-customer-table-filter="reset">Khôi phục</button>
                                    </div>
                            @endif
                            <!--end::Actions-->
                            </div>
                            <!--end::Content-->
                        </div>

                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                            <!--begin::Add customer-->
                            <a href="{{ route('admin.customer.create') }}" type="button" class="btn btn-primary">
                                <!--begin::Svg Icon | path: icons/stockholm/Navigation/Plus.svg-->
                                <span class="svg-icon svg-icon-2">
													<svg xmlns="http://www.w3.org/2000/svg"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                         height="24px" viewBox="0 0 24 24" version="1.1">
														<rect fill="#000000" x="4" y="11" width="16" height="2"
                                                              rx="1"></rect>
														<rect fill="#000000" opacity="0.5"
                                                              transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000)"
                                                              x="4" y="11" width="16" height="2" rx="1"></rect>
													</svg>
												</span>
                                <!--end::Svg Icon-->Tạo mới
                            </a>
                            <!--end::Add customer-->
                        </div>
                        <!--end::Toolbar-->
                        <!--begin::Group actions-->
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
                            <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                   id="kt_customers_table" role="grid">
                                <!--begin::Table head-->
                                <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0" role="row">
                                    <th style="width: 50px;" >
                                        STT
                                    </th>

                                    <th class="min-w-125px"
                                        style="width: 163.734px;">Họ và tên
                                    </th>
                                    <th class="min-w-125px" tabindex="0"
                                        style="width: 100px;">CCCD/CMT
                                    </th>
                                    <th class="min-w-125px" tabindex="0"
                                        style="width: 163.734px;">Email
                                    </th>
                                    <th class="min-w-125px" tabindex="0"
                                        style="width: 163.734px;">Số điện thoại
                                    </th>

                                    <th class="min-w-125px" tabindex="0"
                                        style="width: 163.734px;">Phân loại
                                    </th>
                                    <th class="min-w-125px" tabindex="0"
                                        style="width: 163.734px;">Trạng thái tài khoản
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
                                @forelse($customers as $customer)
                                    <tr class="odd">
                                        <!--begin::Name=-->
                                        <td>
                                            {{ $loop->index + 1 + $customers->perPage() * ($customers->currentPage() - 1)   }}
                                        </td>

                                        <!--end::Name=-->
                                        <!--end::Payment method=-->
                                        <!--begin::Date=-->
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->person_id }}</td>
                                        <td>@if($customer->user){{ $customer->user->email }}@endif</td>
                                        <td>{{ $customer->phone }}</td>
                                        <td>@if($customer->user_id) Đã có tài khoản @else Chưa có tài khoản @endif</td>
                                        <td>
                                            @if($customer->user_id)
                                                @switch($customer->user->is_active)
                                                    @case(\App\Models\User::IS_ACTIVE['active'])
                                                    <span class="badge badge-success">Hoạt động</span>
                                                    @break
                                                    @case(\App\Models\User::IS_ACTIVE['deactive'])
                                                    <span class="badge badge-danger">Khóa</span>
                                                    @break
                                                @endswitch
                                            @else
                                                <span class="badge badge-warning">Chưa có</span>
                                            @endif
                                        </td>
                                        <!--end::Date=-->
                                        <!--begin::Action=-->
                                        <td class="text-center btnAction">
                                            @if(checkPermission('customer-update') && !empty($customer->user))
                                                <span
                                                wire:click="openResetModal({{$customer->id}})"
                                                class="btn btn-sm btn-clean btn-icon mr-2"
                                                style="cursor: pointer" title="Đặt lại mật khẩu">
                                                  <span class="svg-icon svg-icon-2"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Home/Key.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <polygon fill="#000000" opacity="0.3" transform="translate(8.885842, 16.114158) rotate(-315.000000) translate(-8.885842, -16.114158) " points="6.89784488 10.6187476 6.76452164 19.4882481 8.88584198 21.6095684 11.0071623 19.4882481 9.59294876 18.0740345 10.9659914 16.7009919 9.55177787 15.2867783 11.0071623 13.8313939 10.8837471 10.6187476"/>
                                                        <path d="M15.9852814,14.9852814 C12.6715729,14.9852814 9.98528137,12.2989899 9.98528137,8.98528137 C9.98528137,5.67157288 12.6715729,2.98528137 15.9852814,2.98528137 C19.2989899,2.98528137 21.9852814,5.67157288 21.9852814,8.98528137 C21.9852814,12.2989899 19.2989899,14.9852814 15.9852814,14.9852814 Z M16.1776695,9.07106781 C17.0060967,9.07106781 17.6776695,8.39949494 17.6776695,7.57106781 C17.6776695,6.74264069 17.0060967,6.07106781 16.1776695,6.07106781 C15.3492424,6.07106781 14.6776695,6.74264069 14.6776695,7.57106781 C14.6776695,8.39949494 15.3492424,9.07106781 16.1776695,9.07106781 Z" fill="#000000" transform="translate(15.985281, 8.985281) rotate(-315.000000) translate(-15.985281, -8.985281) "/>
                                                    </g>
                                                </svg><!--end::Svg Icon--></span>
                                            </span>
                                            @endif
                                            @if(checkPermission('customer-update'))
                                                <a href="{{ route('admin.customer.edit', $customer->id) }}" class="btn btn-sm btn-clean btn-icon mr-2"
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
                                            @endif

                                            @if(checkPermission('customer-delete'))
                                                <span
                                                    class="btn btn-sm btn-clean btn-icon mr-2"
                                                    style="cursor: pointer" title="Xóa"
                                                    wire:click="openDeleteModal({{ $customer->id }})" >
                                                  <span class="svg-icon svg-icon-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                         height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g
                                                        stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <rect
                                                            x="0" y="0" width="24" height="24"></rect>
                                                        <path
                                                            d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                            fill="#000000" fill-rule="nonzero"></path>
                                                        <path
                                                            d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                            fill="#000000" opacity="0.3"></path>
                                                    </g>	                                </svg>
                                                  </span>
                                            </span>
                                            @endif
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
                                <div class="dataTables_paginate paging_simple_numbers" id="kt_customers_table_paginate">
                                    {{ $customers->links() }}
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
                            <h2 class="fw-bolder">Xóa khách hàng!</h2>
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
            <div class="modal fade" id="resetPasswordModal" tabindex="-1"
                 aria-hidden="true">
                <!--begin::Modal dialog-->
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <!--begin::Modal content-->
                    <div class="modal-content">
                        <!--begin::Form-->
                        <form class="form fv-plugins-bootstrap5 fv-plugins-framework" wire:submit.prevent="resetPassword">
                            <!--begin::Modal header-->
                            <div class="modal-header" id="kt_modal_add_customer_header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bolder">Đặt lại mật khẩu</h2>
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
                                        <label class="required fs-6 fw-bold mb-2">Mật khẩu mới</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="password" wire:model="password" class="form-control form-control-solid">
                                        @error('password')
                                        <div class="fv-plugins-message-container">
                                            <div data-field="name" data-validator="notEmpty" class="fv-help-block">{{ $message }}</div>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-bold mb-2">Nhập lại mật khẩu</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="password" wire:model="password_confirmation" class="form-control form-control-solid">
                                        @error('password_confirmation')
                                        <div class="fv-plugins-message-container">
                                            <div data-field="name" data-validator="notEmpty" class="fv-help-block">{{ $message }}</div>
                                        </div>
                                        @enderror
                                    </div>
                                    <!--end::Modal body-->
                                    <!--begin::Modal footer-->
                                    <div class="modal-footer flex-center">
                                        <!--begin::Button-->
                                        <button type="submit" id="kt_modal_add_customer_submit" class="btn btn-primary">
                                            <span class="indicator-label">Đặt lại</span>
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
        <!--end::Modal - Customers - Add-->
            <!--begin::Modal - Adjust Balance-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>

