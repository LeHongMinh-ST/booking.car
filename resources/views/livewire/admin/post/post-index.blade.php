@section('title')
    bài viết
@endsection

@section('script')
    <script>
        $('#filterCategories').change(function () {
            Livewire.emit('changeFilterCategories', $(this).val())
        })

        $('#filterStatus').change(function () {
            Livewire.emit('changeFilterStatus', $(this).val())
        })

        window.addEventListener('clearFilter', () =>{
            $('#filterCategories').val(null).trigger('change');
            $('#filterStatus').val(null).trigger('change');
        })

        window.addEventListener('openDeleteModal', () => {
            $('#deleteModal').modal('show')
        })

        window.addEventListener('closeModal', () => {
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
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Danh sách bài viết</h1>
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
                    <li class="breadcrumb-item text-muted">Bài viết</li>
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
                                <div class="mb-10"  wire:ignore>
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
                                        <option value="{{ \App\Models\Post::STATUS['publish'] }}">Sẵn sàng</option>
                                        <option value="{{ \App\Models\Post::STATUS['hide'] }}">Ẩn</option>
                                    </select>

                                    <!--end::Input-->
                                </div>

                                <div class="mb-10" wire:ignore>
                                    <!--begin::Label-->
                                    <label class="form-label fs-5 fw-bold mb-3">Danh mục:</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select wire:model="categoryIds" class="form-select form-select-solid"
                                            id="filterCategories"
                                            data-placeholder="Chọn Danh mục"
                                            data-control="select2"
                                            data-allow-clear="true"
                                            multiple="multiple">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>

                                    <!--end::Input-->
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="reset" wire:click="resetFilter" class="btn btn-white btn-active-light-primary me-2" data-kt-menu-dismiss="true" data-kt-customer-table-filter="reset">Khôi phục</button>
                                </div>
                                <!--end::Actions-->
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                            <!--begin::Add customer-->
                            <a href="{{ route('admin.post.create') }}" type="button" class="btn btn-primary">
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
                                    <th class="min-w-125px" tabindex="0"
                                        style="width: 100px;">Ảnh
                                    </th>
                                    <th class="min-w-125px" t
                                        style="width: 163.734px;">Tiêu đề
                                    </th>
                                    <th class="min-w-125px" tabindex="0"
                                        style="width: 200px;">Slug
                                    </th>
                                    <th class="min-w-100px" tabindex="0"
                                        style="width: 200px;">Tác giả
                                    </th>
                                    <th class="min-w-125px" tabindex="0"
                                        style="width: 200px;">Danh mục
                                    </th>
                                    <th class="min-w-90px" tabindex="0"
                                        style="width: 200px;">Trạng thái
                                    </th>
                                    <th class="text-center min-w-70px sorting_disabled" rowspan="1" colspan="1"
                                        aria-label="Actions" style="width: 250px;">Hành động
                                    </th>
                                </tr>
                                <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="fw-bold text-gray-600">
                                @forelse($posts as $post)
                                    <tr class="odd">
                                        <!--begin::Name=-->
                                        <td>
                                            {{ $loop->index + 1 + $posts->perPage() * ($posts->currentPage() - 1)   }}
                                        </td>
                                        <!--end::Name=-->
                                        <!--end::Payment method=-->
                                        <!--begin::Date=-->
                                        <td>
                                            @if($post->thumbnail)
                                                <img class="image-input-wrapper w-100px h-100px image-input-outline" src="{{ $post->thumbnail }}" alt="">
                                            @else
                                                <img class="image-input-wrapper w-100px h-100px image-input-outline" src="{{ asset('admin/assets/img/default-image.jpg') }}" alt="">
                                            @endif
                                        </td>
                                        <td><a href="{{ route('admin.post.edit', $post->id) }}" class="menu-link px-3">{{ $post->title }}</a></td>
                                        <td>{{ $post->slug }}</td>

                                        <td>{{ $post->user->name ?? 'Không có' }}</td>
                                        <td>
                                            @forelse($post->categories as $category)
                                                <span>{{ $category->name }} @if(count($post->categories) > 0 && ($loop->index < count($post->categories)-1)) , @endif</span>
                                            @empty
                                                Chưa có
                                            @endforelse
                                        </td>
                                        <td>
                                           {!! $post->statusText !!}
                                        </td>
                                        <!--end::Date=-->
                                        <!--begin::Action=-->

                                        <td class="text-center btnAction">
                                            @if(checkPermission('post-update') &&  $post->user_id == auth('admin')->user()->id)
                                                <a href="{{ route('admin.post.edit', $post->id) }}" class="btn btn-sm btn-clean btn-icon mr-2"
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

                                            @if(checkPermission('post-delete') && $post->user_id == auth('admin')->user()->id)
                                                <span
                                                    class="btn btn-sm btn-clean btn-icon mr-2"
                                                    style="cursor: pointer" title="Xóa"
                                                    wire:click="openDeleteModal({{ $post->id }})" >
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
                                    {{ $posts->links() }}
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
            <div class="modal fade" id="deleteModal" tabindex="-1"
                 aria-hidden="true">
                <!--begin::Modal dialog-->
                <div class="modal-dialog modal-dialog-centered mw-450px">
                    <!--begin::Modal content-->
                    <div class="modal-content">
                        <!--begin::Form-->
                        <div class="modal-header" id="kt_modal_add_customer_header">
                            <!--begin::Modal title-->
                            <h2 class="fw-bolder">Xóa bài viết!</h2>
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
            <!--end::Modal - Customers - Add-->
            <!--begin::Modal - Adjust Balance-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>

