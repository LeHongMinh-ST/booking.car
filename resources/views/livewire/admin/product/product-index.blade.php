@section('title')
    Xe Thuê
@endsection

@section('header')
    <h3>Danh sách xe</h3>
    <nav aria-label="breadcrumb" style="margin-left: 10px; margin-top: 10px"
         class="breadcrumb-header float-start float-lg-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Bảng điều khiển</a></li>
            <li class="breadcrumb-item active" aria-current="page">Danh sách xe</li>
        </ol>
    </nav>
@endsection


<div>
    <div class="page-content">
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                           <div class="card-body">
                               <div class="row justify-content-between">
                                   <div class="col-6">
                                       <div class="row">
                                           <div class="col-8">
                                               <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="bi bi-search"></i></span>
                                                   <input type="text" class="form-control" wire:model="search"
                                                          placeholder="Nhập từ khóa tìm kiếm...">
                                               </div>
                                           </div>
                                           <div class="col-4">
                                               <button
                                                   class="btn  @if($filter) btn-outline-dark @else btn-outline-primary @endif"
                                                   wire:click="toggleFilter">

                                                   @if($filter)
                                                       <svg
                                                           class="svg-inline--fa fa-long-arrow-alt-up fa-w-8 fa-fw select-all"
                                                           aria-hidden="true" focusable="false" data-prefix="fas"
                                                           data-icon="long-arrow-alt-up" role="img"
                                                           xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"
                                                           data-fa-i2svg="">
                                                           <path fill="currentColor"
                                                                 d="M88 166.059V468c0 6.627 5.373 12 12 12h56c6.627 0 12-5.373 12-12V166.059h46.059c21.382 0 32.09-25.851 16.971-40.971l-86.059-86.059c-9.373-9.373-24.569-9.373-33.941 0l-86.059 86.059c-15.119 15.119-4.411 40.971 16.971 40.971H88z"></path>
                                                       </svg>
                                                       Đóng bộ lọc
                                                   @else
                                                       <svg class="svg-inline--fa fa-filter fa-w-16 fa-fw select-all"
                                                            aria-hidden="true" focusable="false" data-prefix="fas"
                                                            data-icon="filter" role="img"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 512 512" data-fa-i2svg="">
                                                           <path fill="currentColor"
                                                                 d="M487.976 0H24.028C2.71 0-8.047 25.866 7.058 40.971L192 225.941V432c0 7.831 3.821 15.17 10.237 19.662l80 55.98C298.02 518.69 320 507.493 320 487.98V225.941l184.947-184.97C520.021 25.896 509.338 0 487.976 0z"></path>
                                                       </svg>
                                                       Bộ lọc
                                                   @endif
                                               </button>
                                           </div>
                                       </div>
                                   </div>

                                   <div class="col-3 text-end">
                                       <a href="{{ route('admin.product.create') }}" class="btn btn-outline-primary"
                                          title="Tạo mới">
                                           <svg class="svg-inline--fa fa-plus fa-w-14 fa-fw select-all" aria-hidden="true"
                                                focusable="false" data-prefix="fas" data-icon="plus" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                               <path fill="currentColor"
                                                     d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
                                           </svg>
                                           Tạo mới
                                       </a>
                                   </div>
                               </div>
                               @if($filter)
                                   <hr>
                                   <h5 class="card-title">Bộ lọc:</h5>
                                   <div class="row">
                                       <div class="col-3">
                                           <fieldset class="form-group">
                                               <lable>Loại xe:</lable>
                                               <select class="form-select" wire:model="categoryId"  id="basicSelect">
                                                   <option value="">Tất cả</option>
                                                   @foreach($categories as $category)
                                                       <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                   @endforeach
                                               </select>
                                           </fieldset>
                                       </div>
                                       <div class="col-3">
                                           <fieldset class="form-group">
                                               <lable>Nhãn hiệu:</lable>
                                               <select class="form-select" wire:model="brandId" id="basicSelect">
                                                   <option value="">Tất cả</option>
                                                   @foreach($brands as $brand)
                                                       <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                   @endforeach
                                               </select>
                                           </fieldset>
                                       </div>
                                       <div class="col-3">
                                           <fieldset class="form-group">
                                               <lable>Trạng thái:</lable>
                                               <select class="form-select" wire:model="status"  id="basicSelect">
                                                   <option value="">Tất cả</option>
                                                   <option value="{{ \App\Models\Product::STATUS['normal'] }}">Còn hàng</option>
                                                   <option value="{{ \App\Models\Product::STATUS['hired'] }}">Đang cho thuê</option>
                                                   <option value="{{ \App\Models\Product::STATUS['hide'] }}">Ẩn</option>
                                               </select>
                                           </fieldset>
                                       </div>
                                       <div class="col-3">
                                           <a href="#" wire:click="resetFilter" class="btn btn-outline-dark" style="margin-top: 23px"
                                              title="Đặt lại">
                                               <svg class="svg-inline--fa fa-undo fa-w-16 fa-fw select-all"
                                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="undo"
                                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                    data-fa-i2svg="">
                                                   <path fill="currentColor"
                                                         d="M212.333 224.333H12c-6.627 0-12-5.373-12-12V12C0 5.373 5.373 0 12 0h48c6.627 0 12 5.373 12 12v78.112C117.773 39.279 184.26 7.47 258.175 8.007c136.906.994 246.448 111.623 246.157 248.532C504.041 393.258 393.12 504 256.333 504c-64.089 0-122.496-24.313-166.51-64.215-5.099-4.622-5.334-12.554-.467-17.42l33.967-33.967c4.474-4.474 11.662-4.717 16.401-.525C170.76 415.336 211.58 432 256.333 432c97.268 0 176-78.716 176-176 0-97.267-78.716-176-176-176-58.496 0-110.28 28.476-142.274 72.333h98.274c6.627 0 12 5.373 12 12v48c0 6.627-5.373 12-12 12z"></path>
                                               </svg>
                                               Đặt lại
                                           </a>

                                       </div>
                                   </div>
                               @endif
                           </div>
                        </div>

                    </div>
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-lg ">
                                        <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Ảnh</th>
                                            <th>Tên xe</th>
                                            <th>Biển kiểm soát</th>
                                            <th>Nhãn hiệu</th>
                                            <th>Màu sắc</th>
                                            <th>Loại xe</th>
                                            <th>Trạng thái</th>
                                            <th>Hành động</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($products as $product)
                                            <tr>
                                                <td class="text-bold-500">{{ $loop->index + 1 + $products->perPage() * ($products->currentPage() - 1) }}</td>
                                                <td><a href="#">
                                                        @if($product->thumbnail)
                                                            <img class="image-table" src="{{ $product->thumbnail }}"
                                                                 alt="">
                                                        @else
                                                            <img class="image-table"
                                                                 src="{{ asset('assets/images/default-image.jpg') }}"
                                                                 alt="">
                                                        @endif
                                                    </a>
                                                </td>
                                                <td><a href="#"><span class="font-bold">{{ $product->name }}</span></a>
                                                </td>
                                                <td>
                                                    {{ $product->license_plates }}
                                                </td>
                                                <td>
                                                    {{ $product->brand->name }}
                                                </td>
                                                <td>
                                                    {{ $product->color }}
                                                </td>
                                                <td>
                                                    @foreach($product->categories as $category)
                                                        {{ $category->name }} @if($loop->index + 1 < count($product->categories))
                                                            , @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @if($product->status == \App\Models\Product::STATUS['hide'])
                                                        <span class="badge bg-danger">Ẩn</span>
                                                    @endif
                                                    @if($product->status == \App\Models\Product::STATUS['hired'])
                                                        <span class="badge bg-warning">Đang cho thuê</span>
                                                    @endif
                                                    @if($product->status == \App\Models\Product::STATUS['normal'])
                                                        <span class="badge bg-success">Còn hàng</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.product.detail', $product->id) }}"
                                                       class="btn btn-sm btn-outline-primary"
                                                       title="Xem chi tết">
                                                        <svg class="svg-inline--fa fa-eye fa-w-18 fa-fw select-all"
                                                             aria-hidden="true" focusable="false" data-prefix="fas"
                                                             data-icon="eye" role="img"
                                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                                             data-fa-i2svg="">
                                                            <path fill="currentColor"
                                                                  d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z"></path>
                                                        </svg>
                                                        Chi tiết
                                                    </a>
                                                    <a href="{{ route('admin.product.edit', $product->id) }}"
                                                       class="btn btn-sm btn-outline-primary"
                                                       title="Chỉnh sửa">
                                                        <svg class="svg-inline--fa fa-edit fa-w-18 fa-fw select-all"
                                                             aria-hidden="true" focusable="false" data-prefix="fas"
                                                             data-icon="edit" role="img"
                                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                                             data-fa-i2svg="">
                                                            <path fill="currentColor"
                                                                  d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"></path>
                                                        </svg>
                                                        Chỉnh sửa
                                                    </a>
                                                    <a href="#" wire:click="openDeleteModal({{ $product->id }})" class="btn btn-sm btn-outline-primary"
                                                       title="Xóa">
                                                        <svg
                                                            class="svg-inline--fa fa-trash-alt fa-w-14 fa-fw select-all"
                                                            aria-hidden="true" focusable="false" data-prefix="fas"
                                                            data-icon="trash-alt" role="img"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                            data-fa-i2svg="">
                                                            <path fill="currentColor"
                                                                  d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path>
                                                        </svg>
                                                        Xóa
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="9" style="text-align: center">
                                                    Không có bản ghi nào phù hợp!
                                                </td>
                                            </tr>
                                        @endforelse

                                        </tbody>
                                    </table>
                                </div>
                                <div class="row" style="align-items: center">
                                    <div class="col-1">
                                        <div class="dataTable-dropdown" style="width: 70px">
                                            <select class="dataTable-selector  form-select" wire:model="perPage">
                                                <option value="5">5</option>
                                                <option value="10" selected="">10</option>
                                                <option value="15">15</option>
                                                <option value="20">20</option>
                                                <option value="25">25</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <span class="datatable-pager-detail">Hiển thị {{ count($products) > 0 ? $products->perPage() * ($products->currentPage() - 1) + 1 : 0}} - {{ $products->perPage() * ($products->currentPage() - 1) + count($products) }} của {{ $products->total() }}</span>
                                    </div>

                                    <div class="col-8 d-flex justify-content-end">
                                        {!! $products->links()  !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section">

        </section>
    </div>
</div>

