@section('title')
    Thống kê loại xe
@endsection
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div class="d-flex align-items-center me-3">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Thống kê loại xe</h1>
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
                    <li class="breadcrumb-item text-muted">Thống kê loại</li>
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
                                    <span class="svg-icon svg-icon-3x svg-icon-primary">
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
                                    Tổng số xe
                                </span>
                            </h3>
                        </div>
                        <div class="card-body">
                            <h1>
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
                                    <span class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Shopping/Wallet3.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="24px" height="24px"
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
                                    Xe trong kho
                                </span>
                            </h3>
                        </div>
                        <div class="card-body">
                            <h1>
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
                                    <span class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Home/Weight2.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <rect fill="#000000" opacity="0.3"
                                                      transform="translate(12.023129, 11.752757) rotate(33.000000) translate(-12.023129, -11.752757) "
                                                      x="11.0231287" y="7.92751491" width="2" height="7.65048405"
                                                      rx="1"/>
                                                <path d="M7.5,3 L16.5,3 C18.9852814,3 21,5.01471863 21,7.5 L21,15.5 C21,17.9852814 18.9852814,20 16.5,20 L7.5,20 C5.01471863,20 3,17.9852814 3,15.5 L3,7.5 C3,5.01471863 5.01471863,3 7.5,3 Z M6,7.88235294 L8.57142857,12 L15.4285714,12 L18,7.88235294 C17,5.96078431 15,5 12,5 C9,5 7,5.96078431 6,7.88235294 Z"
                                                      fill="#000000"/>
                                            </g>
                                        </svg><!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span>
                                    Xe đang cho thuê
                                </span>
                            </h3>
                        </div>
                        <div class="card-body">
                            <h1>
                            </h1>
                        </div>
                    </div>
                    <!--end::Mixed Widget 2-->
                </div>
                <!--end::Col-->
            </div>
            <!--begin::Modal - Adjust Balance-->
            <div class="row gy-5 g-xl-8 mt-2">
                <div class="col-xxl-6">
                    <!--begin::Mixed Widget 2-->
                    <div class="card card-flush">
                        <div class="card-header">
                            <h3 class="card-title">
                                <span>
                                    Top xe đạt doanh thu cao nhất
                                </span>
                            </h3>
                        </div>
                        <div class="card-body">
                            <div id="chartRevenue"></div>
                        </div>
                    </div>
                    <!--end::Mixed Widget 2-->
                </div>
                <div class="col-xxl-6">
                    <!--begin::Mixed Widget 2-->
                    <div class="card card-flush">
                        <div class="card-header">
                            <h3 class="card-title">

                                <span>
                                    Top xe được thuê nhiều nhất
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
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
