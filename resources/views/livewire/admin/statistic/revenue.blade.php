@section('title')
    Thống kê doanh thu
@endsection
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div class="d-flex align-items-center me-3">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Thống kê doanh thu</h1>
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
                    <li class="breadcrumb-item text-muted">Thống kê doanh thu</li>
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
            <div class="row gy-5 g-xl-8">
                <!--begin::Col-->
                <div class="col-xxl-4">
                    <!--begin::Mixed Widget 2-->
                    <div class="card card-flush">
                        <div class="card-header">
                            <h3 class="card-title">
                                <span class="menu-icon" style="margin-right: 10px">
                                <!--begin::Svg Icon | path: icons/stockholm/General/User.svg-->
                                    <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Shopping/Money.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z"
                                                      fill="#000000" opacity="0.3"
                                                      transform="translate(11.500000, 12.000000) rotate(-345.000000) translate(-11.500000, -12.000000) "/>
                                                <path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z M11.5,14 C12.6045695,14 13.5,13.1045695 13.5,12 C13.5,10.8954305 12.6045695,10 11.5,10 C10.3954305,10 9.5,10.8954305 9.5,12 C9.5,13.1045695 10.3954305,14 11.5,14 Z"
                                                      fill="#000000"/>
                                            </g>
                                        </svg><!--end::Svg Icon-->
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span>
                                    Tổng doanh thu
                                </span>
                            </h3>
                        </div>
                        <div class="card-body">
                            <h1>
                                {{ number_format($revenue['total']) }} VNĐ
                            </h1>
                        </div>
                    </div>
                    <!--end::Mixed Widget 2-->
                </div>

                <div class="col-xxl-4">
                    <!--begin::Mixed Widget 2-->
                    <div class="card card-flush">
                        <div class="card-header">
                            <h3 class="card-title">
                                <span class="menu-icon" style="margin-right: 10px">
                                <!--begin::Svg Icon | path: icons/stockholm/General/User.svg-->
                                    <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Shopping/Wallet2.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <rect fill="#000000" opacity="0.3" x="2" y="2" width="10"
                                                          height="12" rx="2"/>
                                                    <path d="M4,6 L20,6 C21.1045695,6 22,6.8954305 22,8 L22,20 C22,21.1045695 21.1045695,22 20,22 L4,22 C2.8954305,22 2,21.1045695 2,20 L2,8 C2,6.8954305 2.8954305,6 4,6 Z M18,16 C19.1045695,16 20,15.1045695 20,14 C20,12.8954305 19.1045695,12 18,12 C16.8954305,12 16,12.8954305 16,14 C16,15.1045695 16.8954305,16 18,16 Z"
                                                          fill="#000000"/>
                                                </g>
                                            </svg><!--end::Svg Icon-->
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span>
                                    Doanh thu hợp đồng
                                </span>
                            </h3>
                        </div>
                        <div class="card-body">
                            <h1>
                                {{ number_format($revenue['contract']) }} VNĐ
                            </h1>
                        </div>
                    </div>
                    <!--end::Mixed Widget 2-->
                </div>

                <div class="col-xxl-4">
                    <!--begin::Mixed Widget 2-->
                    <div class="card card-flush">
                        <div class="card-header">
                            <h3 class="card-title">
                                <span class="menu-icon" style="margin-right: 10px">
                                <!--begin::Svg Icon | path: icons/stockholm/General/User.svg-->
                                    <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Shopping/Wallet3.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M4,4 L20,4 C21.1045695,4 22,4.8954305 22,6 L22,18 C22,19.1045695 21.1045695,20 20,20 L4,20 C2.8954305,20 2,19.1045695 2,18 L2,6 C2,4.8954305 2.8954305,4 4,4 Z"
                                                      fill="#000000" opacity="0.3"/>
                                                <path d="M18.5,11 L5.5,11 C4.67157288,11 4,11.6715729 4,12.5 L4,13 L8.58578644,13 C8.85100293,13 9.10535684,13.1053568 9.29289322,13.2928932 L10.2928932,14.2928932 C10.7456461,14.7456461 11.3597108,15 12,15 C12.6402892,15 13.2543539,14.7456461 13.7071068,14.2928932 L14.7071068,13.2928932 C14.8946432,13.1053568 15.1489971,13 15.4142136,13 L20,13 L20,12.5 C20,11.6715729 19.3284271,11 18.5,11 Z"
                                                      fill="#000000"/>
                                                <path d="M5.5,6 C4.67157288,6 4,6.67157288 4,7.5 L4,8 L20,8 L20,7.5 C20,6.67157288 19.3284271,6 18.5,6 L5.5,6 Z"
                                                      fill="#000000"/>
                                            </g>
                                        </svg><!--end::Svg Icon-->
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span>
                                    Doanh thu phụ trội
                                </span>
                            </h3>
                        </div>
                        <div class="card-body">
                            <h1>
                                {{ number_format($revenue['over']) }} VNĐ
                            </h1>
                        </div>
                    </div>
                    <!--end::Mixed Widget 2-->
                </div>
                <!--end::Col-->
            </div>
            <!--begin::Modal - Adjust Balance-->
            <div class="row gy-5 g-xl-8 mt-2">
                <div class="col-xxl-8">
                    <!--begin::Mixed Widget 2-->
                    <div class="card card-flush">
                        <div class="card-header">
                            <h3 class="card-title">
                                <span>
                                    Doanh thu 14 ngày gần nhất
                                </span>
                            </h3>
                        </div>
                        <div class="card-body">
                            <div id="chartRevenue"></div>
                        </div>
                    </div>
                    <!--end::Mixed Widget 2-->
                </div>
                <div class="col-xxl-4">
                    <!--begin::Mixed Widget 2-->
                    <div class="card card-flush">
                        <div class="card-header">
                            <h3 class="card-title">

                                <span>
                                    Tỉ lệ doanh thu hợp đồng và phụ trội
                                </span>
                            </h3>
                        </div>
                        <div class="card-body">
                            <div id="chartPie"></div>
                        </div>
                    </div>
                    <!--end::Mixed Widget 2-->
                </div>
            </div>
            <div class="row gy-5 g-xl-8 mt-2">
                <div class="col-xxl-12">
                    <!--begin::Mixed Widget 2-->
                    <div class="card card-flush">
                        <div class="card-header">
                            <h3 class="card-title">
                                <span>
                                    Doanh thu
                                </span>
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xxl-3" wire:ignore.self>
                                    <div class="label">Theo:</div>
                                    <select name="" class="form-select form-select-solid" id="selectByChart">
                                        <option value="year">Năm</option>
                                        <option value="quater">Quý</option>
                                        <option selected value="month">Tháng</option>
                                        <option value="day">Ngày</option>
                                    </select>
                                </div>
                                <div class="col-xxl-6">
                                    <div class="label">Thời gian:</div>
                                    <input class="form-control form-control-solid"
                                           placeholder="Chọn thời gian" id="orderTime"/>
                                </div>
                                <div class="col-xxl-3">
                                    <button class="btn btn-light-primary mt-6" id="filterRevenue"> Lọc</button>
                                </div>
                            </div>
                            <div id="chartTotalRevenue"></div>
                        </div>
                    </div>
                    <!--end::Mixed Widget 2-->
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
@section('script')
    <script>
        const getDataTotalRevenue = (data) => {
            return $.ajax({
                url: "{{ route('admin.chart.get-data-chart-total-revenue') }}",
                data: data
            })
        }

        const getDataRevenue = () => {
            return $.ajax({
                url: "{{ route('admin.chart.get-data-chart-revenue-two-week') }}",
            })
        }


        const getDataPieRevenue = () => {
            return $.ajax({
                url: "{{ route('admin.chart.get-data-chart-pie-revenue') }}",
            })
        }


        const renderChart = async () => {
            let revenue = await getDataRevenue()
            let options = {
                series: [{
                    name: 'Doanh thu',
                    data: revenue.data.revenue.data
                }],
                chart: {
                    type: 'area',
                    stacked: false,
                    height: 450,
                    zoom: {
                        type: 'x',
                        enabled: true,
                        autoScaleYaxis: true
                    },
                    toolbar: {
                        autoSelected: 'zoom'
                    }
                },
                dataLabels: {
                    enabled: false
                },
                markers: {
                    size: 0,
                },

                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 1,
                        inverseColors: false,
                        opacityFrom: 0.5,
                        opacityTo: 0,
                        stops: [0, 90, 100]
                    },
                },
                yaxis: {
                    labels: {
                        formatter: function (val) {
                            let num = new Intl.NumberFormat('en-US').format(parseInt(val));
                            return num + ' VNĐ';
                        },
                    },
                    title: {
                        text: 'Doanh thu'
                    },
                },
                xaxis: {
                    categories: revenue.data.revenue.label,
                },
                tooltip: {
                    shared: false,
                    y: {
                        formatter: function (val) {
                            let num = new Intl.NumberFormat('en-US').format(parseInt(val));
                            return num + ' VNĐ';
                        },
                    }
                }
            };

            let chart = new ApexCharts(document.querySelector("#chartRevenue"), options);
            chart.render();
        }

        const renderChartPie = async () => {
            let data = await getDataPieRevenue()
            const options = {
                series: data.data.revenue,
                chart: {
                    width: 350,
                    height: 350,
                    type: 'pie',
                },
                labels: ['Hợp đồng chính', 'Phụ trội'],
                legend: {
                    position: 'bottom'
                },
                responsive: [{
                    breakpoint: 350,
                    options: {
                        chart: {
                            width: 500
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }],
                tooltip: {
                    shared: false,
                    y: {
                        formatter: function (val) {
                            let num = new Intl.NumberFormat('en-US').format(parseInt(val));
                            return num + ' VNĐ';
                        },
                    }
                }
            };

            const chart = new ApexCharts(document.querySelector("#chartPie"), options);
            chart.render();
        }

        const renderChartTotal = async (data = null) => {
            let revenue = await getDataTotalRevenue(data)
            $("#chartTotalRevenue").empty()
            $("#orderTime").data('daterangepicker').setStartDate(revenue.data.revenue.label[0])
            $("#orderTime").data('daterangepicker').setEndDate(revenue.data.revenue.label[revenue.data.revenue.label.length - 1])
            let options = {
                series: [{
                    name: 'Doanh thu',
                    data: revenue.data.revenue.data
                }],
                chart: {
                    type: 'area',
                    stacked: false,
                    height: 450,
                    zoom: {
                        type: 'x',
                        enabled: true,
                        autoScaleYaxis: true
                    },
                    toolbar: {
                        autoSelected: 'zoom'
                    }
                },
                dataLabels: {
                    enabled: false
                },
                markers: {
                    size: 0,
                },

                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 1,
                        inverseColors: false,
                        opacityFrom: 0.5,
                        opacityTo: 0,
                        stops: [0, 90, 100]
                    },
                },
                yaxis: {
                    labels: {
                        formatter: function (val) {
                            let num = new Intl.NumberFormat('en-US').format(parseInt(val));
                            return num + ' VNĐ';
                        },
                    },
                    title: {
                        text: 'Doanh thu'
                    },
                },
                xaxis: {
                    categories: revenue.data.revenue.label,
                },
                tooltip: {
                    shared: false,
                    y: {
                        formatter: function (val) {
                            let num = new Intl.NumberFormat('en-US').format(parseInt(val));
                            return num + ' VNĐ';
                        },
                    }
                }
            };

            let chart = new ApexCharts(document.querySelector("#chartTotalRevenue"), options)
            chart.render();
        }

        renderChart()
        renderChartPie()
        renderChartTotal()

        $('#filterRevenue').click(function () {
            let data = {
                byChart: $('#selectByChart').val(),
                start: $('#orderTime').data('daterangepicker').startDate.format('DD-M-YYYY'),
                end: $('#orderTime').data('daterangepicker').endDate.format('DD-M-YYYY'),
            }
            renderChartTotal(data)
        })


        $("#orderTime").daterangepicker({
            timePicker: true,
            locale: {
                format: "DD/M/YYYY",
                cancelLabel: 'Thoát',
                applyLabel: 'Đồng ý',
                separator: " - ",
                fromLabel: "Từ",
                toLabel: "Đến",
                customRangeLabel: "Custom",
                daysOfWeek: [
                    "CN",
                    "T2",
                    "T3",
                    "T4",
                    "T5",
                    "T6",
                    "T7"
                ],
                monthNames: [
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
        })

    </script>
@endsection
