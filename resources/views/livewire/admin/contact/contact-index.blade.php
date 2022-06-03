@section('title')
    Liên hệ
@endsection
@section('script')
    <script>
        window.addEventListener('openDeleteModal', () => {
            $('#deleteModal').modal('show')
        })

        window.addEventListener('closeModal', () => {
            $('#deleteModal').modal('hide')
            $('#handleModal').modal('hide')
            $('#detailModal').modal('hide')
        })

        window.addEventListener('openDetailModal', () => {
            $('#detailModal').modal('show')
        })

        window.addEventListener('openHandleSendContactModal', () => {
            $('#handleModal').modal('show')
        })

        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
            language: 'vi'
        };

        CKEDITOR.replace('editorFeedback', options).on('change', (e) => {
            Livewire.emit('updateFeedback', e.editor.getData())
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
                    <li class="breadcrumb-item text-muted">Liên hệ</li>
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
                                    <label class="form-label fs-5 fw-bold mb-3">Trạng:</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select wire:model="status" class="form-select form-select-solid fw-bolder">
                                        <option value="">Tất cả</option>
                                        <option value="1">Xử lý</option>
                                        <option value="2">Chưa xử lý</option>
                                    </select>
                                    <!--end::Input-->
                                </div>
                                @if($status)
                                    <div class="d-flex justify-content-end">
                                        <button type="reset" wire:click="resetFilter"
                                                class="btn btn-white btn-active-light-primary me-2"
                                                data-kt-menu-dismiss="true" data-kt-contract-table-filter="reset">Khôi
                                            phục
                                        </button>
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
                                    <th style="width: 50px;">
                                        STT
                                    </th>

                                    <th class="min-w-125px"
                                        style="width: 163.734px;">Họ và tên
                                    </th>
                                    <th class="min-w-125px" tabindex="0"
                                        style="width: 100px;">Email
                                    </th>

                                    <th class="min-w-125px" tabindex="0"
                                        style="width: 163.734px;">Số điện thoại
                                    </th>
                                    <th class="min-w-125px" tabindex="0"
                                        style="width: 163.734px;">Chủ đề
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
                                @forelse($contacts as $contact)
                                    <tr class="odd">
                                        <!--begin::Name=-->
                                        <td>
                                            {{ $loop->index + 1 + $contacts->perPage() * ($contacts->currentPage() - 1)   }}
                                        </td>

                                        <!--end::Name=-->
                                        <!--end::Payment method=-->
                                        <!--begin::Date=-->
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->phone }}</td>
                                        <td>{{ $contact->subject }}</td>
                                        <td>
                                            {!! $contact->statusText !!}
                                        </td>
                                        <!--end::Date=-->
                                        <!--begin::Action=-->
                                        <td class="text-center btnAction">

                                            @if(checkPermission('contract-handle'))
                                                <a href="#" wire:click="openDetail({{ $contact->id }})"
                                                   class="btn btn-sm btn-clean btn-icon mr-2"
                                                   title="Xem chi tiết">
                                               <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Communication/Mail-opened.svg--><svg
                                                           xmlns="http://www.w3.org/2000/svg"
                                                           xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                           height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                           fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"/>
                                                            <path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z"
                                                                  fill="#000000" opacity="0.3"/>
                                                            <path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z"
                                                                  fill="#000000"/>
                                                        </g>
                                                    </svg><!--end::Svg Icon--></span>
                                                </a>
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
                                <div class="dataTables_paginate paging_simple_numbers" id="kt_contracts_table_paginate">
                                    {{ $contacts->links() }}
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
            <div class="modal fade" id="detailModal"
                 wire:ignore.self
                 tabindex="-1"
                 aria-hidden="true">
                <!--begin::Modal dialog-->
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <!--begin::Modal content-->
                    <div class="modal-content">
                        <!--begin::Form-->
                        <div class="card card-flush pt-3 mb-5 mb-xl-10">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2 class="fw-bolder">{{ $name }} {!! $statusContactText !!}</h2>
                                </div>
                                <!--begin::Card title-->
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    @if($statusContact == \App\Models\Contact::STATUS['no_process'])

                                        <span class="btn btn-light-primary m-1"
                                              wire:click="openHandleSendContact({{ $selectId  }})">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z"
                                                          fill="#000000" opacity="0.3"></path>
                                                    <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z"
                                                          fill="#000000"></path>
                                                    <rect fill="#000000" opacity="0.3" x="7" y="10" width="5" height="2"
                                                          rx="1"></rect>
                                                    <rect fill="#000000" opacity="0.3" x="7" y="14" width="9" height="2"
                                                          rx="1"></rect>
                                                </g>
                                            </svg>
                                            Phản hồi</span>
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
                                                    <td class="text-gray-400">Họ và tên:</td>
                                                    <td class="text-gray-800">{{ $name ?? ''}}</td>
                                                </tr>

                                                <tr class="">
                                                    <td class="text-gray-400">Email:</td>
                                                    <td class="text-gray-800">{{ $email  ?? ''}}</td>
                                                </tr>
                                                <!--end::Row-->
                                                <!--begin::Row-->

                                                <tr class="">
                                                    <td class="text-gray-400">Số điện thoại:</td>
                                                    <td class="text-gray-800">{{ $phone ?? '' }}</td>
                                                </tr>
                                                <tr class="">
                                                    <td class="text-gray-400">Chủ đề:</td>
                                                    <td class="text-gray-800">{{ $subject ?? ''}}</td>
                                                </tr>

                                                <tr class="">
                                                    <td class="text-gray-400">Nội dung:</td>
                                                    <td class="text-gray-800">{{ $content ?? '' }}</td>
                                                </tr>
                                                @if($statusContact == \App\Models\Contact::STATUS['handle'])
                                                    <tr class="">
                                                        <td class="text-gray-400">Phản hồi:</td>
                                                        <td class="text-gray-800">
                                                            <div>{!! $feedback !!}</div>
                                                        </td>
                                                    </tr>

                                                    <tr class="">
                                                        <td class="text-gray-400">Người phản hồi:</td>
                                                        <td class="text-gray-800">{{ $user ?? '' }}</td>
                                                    </tr>
                                            @endif
                                            <!--end::Row-->
                                                <!--begin::Row-->

                                                <!--end::Row-->
                                            </table>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Row-->
                                        <!--begin::Row-->
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Section-->

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
            <!--begin::Modal - contracts - Add-->
            <div class="modal fade" wire:ignore.self id="handleModal"
                 tabindex="-1"
                 aria-hidden="true">
                <!--begin::Modal dialog-->
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <!--begin::Modal content-->
                    <div class="modal-content">
                        <!--begin::Form-->
                        @livewire('admin.contact.contact-handle')
                        <!--end::Form-->
                    </div>
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>

