<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booking Car</title>
</head>
<body>
<div class="container">
    <div class="card card-flush pt-3 mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header">
            <!--begin::Card title-->
            <div class="card-title">
                <h2 class="fw-bolder">{{ $name }}</h2>
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
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
                                @if($thumbnail)
                                    <img class="image-input-wrapper w-100px h-100px image-input-outline"
                                         src="{{ $thumbnail }}" alt="">
                                @else
                                    <img class="image-input-wrapper w-100px h-100px image-input-outline"
                                         src="{{ asset('admin/assets/img/default-image.jpg') }}"
                                         alt="">
                                @endif

                            </td>
                            <td>
                                <label class="w-150px">{{ $productName ?? '' }}</label>
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

        <div>
            Vui lòng thanh toán tiền đặt cọc theo thông tin sau:
            <div>
                Phạm Kim Cúc
            </div>
            <div>
                STK: 105868963707
            </div>
            <div>
                Ngân hàng: Viettinbank
            </div>
        </div>
    </div>
</div>
</body>
</html>