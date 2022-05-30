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
                                    <span class="svg-icon svg-icon-3x svg-icon-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3"
                                                  d="M4.05424 15.1982C8.34524 7.76818 13.5782 3.26318 20.9282 2.01418C21.0729 1.98837 21.2216 1.99789 21.3618 2.04193C21.502 2.08597 21.6294 2.16323 21.7333 2.26712C21.8372 2.37101 21.9144 2.49846 21.9585 2.63863C22.0025 2.7788 22.012 2.92754 21.9862 3.07218C20.7372 10.4222 16.2322 15.6552 8.80224 19.9462L4.05424 15.1982ZM3.81924 17.3372L2.63324 20.4482C2.58427 20.5765 2.5735 20.7163 2.6022 20.8507C2.63091 20.9851 2.69788 21.1082 2.79503 21.2054C2.89218 21.3025 3.01536 21.3695 3.14972 21.3982C3.28408 21.4269 3.42387 21.4161 3.55224 21.3672L6.66524 20.1802L3.81924 17.3372ZM16.5002 5.99818C16.2036 5.99818 15.9136 6.08615 15.6669 6.25097C15.4202 6.41579 15.228 6.65006 15.1144 6.92415C15.0009 7.19824 14.9712 7.49984 15.0291 7.79081C15.0869 8.08178 15.2298 8.34906 15.4396 8.55884C15.6494 8.76862 15.9166 8.91148 16.2076 8.96935C16.4986 9.02723 16.8002 8.99753 17.0743 8.884C17.3484 8.77046 17.5826 8.5782 17.7474 8.33153C17.9123 8.08486 18.0002 7.79485 18.0002 7.49818C18.0002 7.10035 17.8422 6.71882 17.5609 6.43752C17.2796 6.15621 16.8981 5.99818 16.5002 5.99818Z"
                                                  fill="black"></path>
                                            <path
                                                d="M4.05423 15.1982L2.24723 13.3912C2.15505 13.299 2.08547 13.1867 2.04395 13.0632C2.00243 12.9396 1.9901 12.8081 2.00793 12.679C2.02575 12.5498 2.07325 12.4266 2.14669 12.3189C2.22013 12.2112 2.31752 12.1219 2.43123 12.0582L9.15323 8.28918C7.17353 10.3717 5.4607 12.6926 4.05423 15.1982ZM8.80023 19.9442L10.6072 21.7512C10.6994 21.8434 10.8117 21.9129 10.9352 21.9545C11.0588 21.996 11.1903 22.0083 11.3195 21.9905C11.4486 21.9727 11.5718 21.9252 11.6795 21.8517C11.7872 21.7783 11.8765 21.6809 11.9402 21.5672L15.7092 14.8442C13.6269 16.8245 11.3061 18.5377 8.80023 19.9442ZM7.04023 18.1832L12.5832 12.6402C12.7381 12.4759 12.8228 12.2577 12.8195 12.032C12.8161 11.8063 12.725 11.5907 12.5653 11.4311C12.4057 11.2714 12.1901 11.1803 11.9644 11.1769C11.7387 11.1736 11.5205 11.2583 11.3562 11.4132L5.81323 16.9562L7.04023 18.1832Z"
                                                fill="black"></path>
                                        </svg>
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
                                    <span class="svg-icon svg-icon-3x svg-icon-danger">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path
                                                    d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z"
                                                    fill="#000000" opacity="0.3"/>
                                                <path
                                                    d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z"
                                                    fill="#000000"/>
                                                <rect fill="#000000" opacity="0.3" x="7" y="10" width="5" height="2"
                                                      rx="1"/>
                                                <rect fill="#000000" opacity="0.3" x="7" y="14" width="9" height="2"
                                                      rx="1"/>
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
                                    <span class="svg-icon svg-icon-3x svg-icon-primary">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <path
                                                d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                            <path
                                                d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                fill="#000000" fill-rule="nonzero"></path>
                                        </svg>
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
                                    <div class="label">Theo: </div>
                                    <select name="" class="form-select form-select-solid" id="selectByChart">
                                        <option value="year">Năm</option>
                                        <option value="quater">Quý</option>
                                        <option selected value="month">Tháng</option>
                                        <option value="day">Ngày</option>
                                    </select>
                                </div>
                                <div class="col-xxl-6">
                                    <div class="label">Thời gian: </div>
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
