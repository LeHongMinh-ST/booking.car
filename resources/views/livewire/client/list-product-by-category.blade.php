@section('title')
    Danh sách xe thuê
@endsection

<div>
    <div id="page_caption" class="hasbg parallax  withtopbar  " style="background-image:url({{ asset('client/upload/driver-2.jpg') }});">

        <div class="page_title_wrapper">
            <div class="page_title_inner">
                <div class="page_title_content">
                    <h1 class="withtopbar">Cho thuê xe và xe Limousine cao cấp</h1>
                    <div class="page_tagline">
                        This is sample of page tagline and you can set it up using page option </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Begin content -->
    <div id="page_content_wrapper" class="hasbg withtopbar ">
        <form id="car_search_form" name="car_search_form" method="get" action="{{ route('products') }}">
            <div class="car_search_wrapper">
                <div class="one_fourth themeborder">
                    <select id="brand" name="color">
                        <option value="">Màu sắc bất kỳ</option>
                        <option value="Xanh" @if(request()->query('color') == 'Xanh') selected @endif>Xanh</option>
                        <option value="Đỏ" @if(request()->query('color') == 'Đỏ') selected @endif>Đỏ</option>
                        <option value="Vàng" @if(request()->query('color') == 'Vàng') selected @endif>Vàng</option>
                        <option value="Nâu" @if(request()->query('color') == 'Nâu') selected @endif>Nâu</option>
                        <option value="Xanh đen" @if(request()->query('color') == 'Xanh đen') selected @endif>Xanh đen</option>
                        <option value="Trắng" @if(request()->query('color') == 'Trắng') selected @endif>Trắng</option>
                    </select>
                    <span class="ti-angle-down"></span>
                </div>
                <div class="one_fourth themeborder">
                    <select id="type" name="category_id">
                        <option value="">Loại xe bất kỳ</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" @if(request()->query('category_id') == $category->id) selected @endif>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <span class="ti-angle-down"></span>
                </div>
                <div class="one_fourth themeborder">
                    <select id="sort_by" name="sort_by">
                        <option value="">Giá bất kỳ</option>
                        <option value="priceAsc" @if(request()->query('sort_by') =='priceAsc') selected @endif>Giá thấp đến cao</option>
                        <option value="priceDesc" @if(request()->query('sort_by') == 'priceDesc') selected @endif>Giá cao đến thấp</option>
                        {{--                        <option value="model">Sắp xếp theo các mẫu</option>--}}
                        {{--                        <option value="popular">Sắp xếp theo số người thuê</option>--}}
                        {{--                        <option value="review">Sắp xếp theo số điểm</option>--}}
                    </select>
                    <span class="ti-exchange-vertical"></span>
                </div>
                <div class="one_fourth last themeborder">
                    <button id="car_search_btn" type="submit" class="button" value="Tìm kiếm">
                        Tìm kiếm
                    </button>
                </div>
            </div>
        </form>

        <!-- Begin content -->

        <div class="inner">

            <div class="inner_wrapper nopadding">
                <div id="page_main_content" class="sidebar_content fixed_column">

                    <div class="standard_wrapper">

                        <div id="portfolio_filter_wrapper"
                             class="gallery classic two_cols portfolio-content section content clearfix" data-columns="3">
                            @foreach($products as $product)
                                <div class="element grid classic2_cols animated2">

                                    <div class="one_half gallery2 classic static filterable portfolio_type themeborder"
                                         data-id="post-2">

                                        <a class="car_image" href="{{ route('product', $product->slug) }}" style="cursor: pointer">
                                            @if($product->thumbnail)
                                                <img src="{{ $product->thumbnail }}"
                                                     style="object-fit: cover; width: 310px; height: 210px" alt="{{ $product->name }}"/>
                                            @else
                                                <img src="{{ asset('client/upload/2016-Lexus-RX-350-BM-01.jpg') }}" width="310px" height="300px"
                                                     style="object-fit: cover; width: 310px; height: 210px" alt="{{ $product->name }}"/>
                                            @endif
                                        </a>

                                        <div class="portfolio_info_wrapper">
                                            <div class="car_attribute_wrapper" style="width: 100%">
                                                <a class="car_link" href="#"><h4>{{ $product->name }}</h4></a>
                                                <div class="car_attribute_rating">
                                                    {{ $product->license_plates }} {{ $product->color }}
                                                </div>
                                                <br class="clear"/>
                                            </div>
                                            <div class="car_attribute_price" style="width: 100%">
                                                <div class="car_attribute_price_day three_cols">
                                                    <span class="single_car_price" style="font-size: 18px">{{ number_format($product->price) }} VNĐ</span><span
                                                            class="car_unit_day" style="margin-top: 0px">Theo giờ</span>
                                                </div>
                                            </div>
                                            <br class="clear"/>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <br class="clear"/>
                        <div class="pagination">
                            {!! $products->links('vendor.pagination.theme') !!}

                            {{--                        <span class="current">1</span><a href='#' class="inactive">2</a>--}}
                        </div>


                    </div>
                </div>

                @include('client.includes.sidebar')

            </div>
        </div>
    </div>
</div>
