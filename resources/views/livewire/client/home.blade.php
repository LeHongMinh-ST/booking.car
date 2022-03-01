@section('title')
    Trang chủ
@endsection
<div class="ppb_wrapper  ">
    <div class="one withsmallpadding ppb_car_search_background parallax withbg " style="padding-top: 150px !important;text-align:center;height:800px;background-image:url({{ asset('client/upload/BMW-Vision-Future-Luxury-Concept-rear-interior-seats.jpg') }});background-position: center center;color:#ffffff;">
        <div class="overlay_background" style="background:#000000;background:rgb(0,0,0,0.2);background:rgba(0,0,0,0.2);"></div>
        <div class="center_wrapper">
            <div class="inner_content">
                <div class="standard_wrapper">
                    <h2 class="ppb_title" style="color:#ffffff;">Tìm Xe Hơi &amp; Xe Limousine Tốt Nhất</h2>
                    <div class="page_tagline" style="color:#ffffff;">Chỉ từ 200.000 VNĐ mỗi ngày với chiết khấu ưu đãi trong thời gian giới hạn</div>
                    <form class="car_search_form" method="get" action="#">
                        <div class="car_search_wrapper">
                            <div class="one_fourth themeborder">
                                <select id="brand" name="brand">
                                    <option value="">Nhãn hiệu bất kỳ</option>
                                    <option value="Audi">Audi</option>
                                    <option value="BMW">BMW</option>
                                    <option value="Lexus">Lexus</option>
                                    <option value="Mercedes Benz">Mercedes Benz</option>
                                    <option value="MINI">MINI</option>
                                    <option value="Porsche">Porsche</option>
                                </select>
                                <span class="ti-angle-down"></span>
                            </div>
                            <div class="one_fourth themeborder">
                                <select id="type" name="type">
                                    <option value="">Nhãn hiệu bất kỳ</option>
                                    <option value="Coupe">Coupe</option>
                                    <option value="Sedan">Sedan</option>
                                    <option value="SUV">SUV</option>
                                </select>
                                <span class="ti-angle-down"></span>
                            </div>
                            <div class="one_fourth themeborder">
                                <select id="sort_by" name="sort_by">
                                    <option value="price_low">Giá thấp đến cao</option>
                                    <option value="price_high">Giá cao đến thấp</option>
                                    <option value="model">Sắp xếp theo các mẫu</option>
                                    <option value="popular">Sắp xếp theo số người thuê</option>
                                    <option value="review">Sắp xếp theo số điểm</option>
                                </select>
                                <span class="ti-exchange-vertical"></span>
                            </div>
                            <div class="one_fourth last themeborder">
                                <input id="car_search_btn" type="submit" class="button" value="Tìm kiếm" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="one withsmallpadding ppb_header " style="text-align:center;padding:60px 0 60px 0;">
        <div class="standard_wrapper">
            <div class="page_content_wrapper">
                <div class="inner">
                    <div style="margin:auto;width:100%">
                        <h2 class="ppb_title" style="">Dịch Vụ Thuê Xe Hơi &amp; Xe Limousine Tốt Nhất</h2>
                        <div class="page_tagline" style="">Chúng tôi cung cấp dịch vụ thuê xe &amp; xe limousine chuyên nghiệp và cao cấp</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ppb_car_brand_grid one nopadding ">
        <div class="page_content_wrapper page_main_content sidebar_content full_width fixed_column">
            <div class="standard_wrapper">
                <div id="15722572661666401717" class="portfolio_filter_wrapper gallery grid portrait three_cols" data-columns="3">
                    <div class="element grid classic3_cols animated1">
                        <div class="one_third gallery3 grid static filterable portfolio_type themeborder" style="background-image:url({{ asset('client/upload/Audi-A4-Avant-1.jpg') }});">
                            <a class="car_image" href="#"></a>
                            <div class="portfolio_info_wrapper">
                                <h3>Audi</h3></div>
                        </div>
                    </div>
                    <div class="element grid classic3_cols animated2">
                        <div class="one_third gallery3 grid static filterable portfolio_type themeborder" style="background-image:url({{ asset('client/upload/bmw-3-series-sedan-wallpaper-1920x1200-05.jpg') }});">
                            <a class="car_image" href="#"></a>
                            <div class="portfolio_info_wrapper">
                                <h3>BMW</h3></div>
                        </div>
                    </div>
                    <div class="element grid classic3_cols animated3">
                        <div class="one_third gallery3 grid static filterable portfolio_type themeborder" style="background-image:url({{ asset('client/upload/2016-Lexus-RX-350-BM-01.jpg') }});">
                            <a class="car_image" href="#"></a>
                            <div class="portfolio_info_wrapper">
                                <h3>Lexus</h3></div>
                        </div>
                    </div>
                    <div class="element grid classic3_cols animated4">
                        <div class="one_third gallery3 grid static filterable portfolio_type themeborder" style="background-image:url({{ asset('client/upload/Mercedes-C-Class-Estate-1.jpg') }});">
                            <a class="car_image" href="#"></a>
                            <div class="portfolio_info_wrapper">
                                <h3>Mercedes Benz</h3></div>
                        </div>
                    </div>
                    <div class="element grid classic3_cols animated5">
                        <div class="one_third gallery3 grid static filterable portfolio_type themeborder" style="background-image:url({{ asset('client/upload/2016-MINI-Cooper-S-Clubman-ALL4.jpg') }});">
                            <a class="car_image" href="#"></a>
                            <div class="portfolio_info_wrapper">
                                <h3>MINI</h3></div>
                        </div>
                    </div>
                    <div class="element grid classic3_cols animated6">
                        <div class="one_third gallery3 grid static filterable portfolio_type themeborder" style="background-image:url({{ asset('client/upload/P14_0596_a4_rgb-1.jpg') }});">
                            <a class="car_image" href="#"></a>
                            <div class="portfolio_info_wrapper">
                                <h3>Porsche</h3></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="one withsmallpadding ppb_header " style="padding-top: 40px !important;text-align:center;padding:60px 0 60px 0;">
        <div class="standard_wrapper">
            <div class="page_content_wrapper">
                <div class="inner">
                    <div style="margin:auto;width:100%">
                        <h2 class="ppb_title" style="">Tìm Xe theo Loại xe</h2>
                        <div class="page_tagline" style="">
                            Chúng tôi cung cấp dịch vụ cho thuê xe hơi & xe limousine chuyên nghiệp với nhiều loại xe cao cấp của chúng tôi</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ppb_car_type_grid one nopadding " style="margin-bottom:60px;">
        <div class="page_content_wrapper page_main_content sidebar_content full_width fixed_column">
            <div class="standard_wrapper">
                <div id="1572257266780950625" class="portfolio_filter_wrapper gallery grid portrait three_cols" data-columns="3">
                    <div class="element grid classic3_cols animated1">
                        <div class="one_third gallery3 grid static filterable portfolio_type themeborder" style="background-image:url({{ asset('client/upload/15C1119_043-1280x849.jpg') }});">
                            <a class="car_image" href="#"></a>
                            <div class="portfolio_info_wrapper">
                                <h3>Coupe</h3></div>
                        </div>
                    </div>
                    <div class="element grid classic3_cols animated2">
                        <div class="one_third gallery3 grid static filterable portfolio_type themeborder" style="background-image:url({{ asset('client/upload/2017-lexus-ls-460-2.jpg') }});">
                            <a class="car_image" href="#"></a>
                            <div class="portfolio_info_wrapper">
                                <h3>Sedan</h3></div>
                        </div>
                    </div>
                    <div class="element grid classic3_cols animated3">
                        <div class="one_third gallery3 grid static filterable portfolio_type themeborder" style="background-image:url({{ asset('client/upload/2015-BMW-X3-Facelift-5.jpg') }});">
                            <a class="car_image" href="#"></a>
                            <div class="portfolio_info_wrapper">
                                <h3>SUV</h3></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="one withsmallpadding ppb_header_youtube withbg parallax" style="text-align:center;padding:215px 0 215px 0;color:#ffffff;background-image:url({{ asset('client/upload/IMG_3496bfree.jpg') }});background-position: center center;">
        <div class="overlay_background" style="background:#000000;background:rgb(0,0,0,0.5);background:rgba(0,0,0,0.5);"></div>
        <div class="standard_wrapper">
            <div class="page_content_wrapper">
                <div class="inner">
                    <div style="margin:auto;width:100%">
                        <h2 class="ppb_title" style="color:#ffffff;">Đội ngũ của chúng tôi, Đội ngũ của bạn</h2>
                        <div class="page_tagline" style="color:#ffffff;">Chúng tôi biết sự khác biệt là ở các chi tiết và đó là lý do tại sao dịch vụ cho thuê xe hơi của chúng tôi, trong ngành du lịch
                            <br /> và ngành kinh doanh, nổi bật về chất lượng và hương vị tốt, để mang đến cho bạn trải nghiệm độc đáo</div>
                        <div class="ppb_header_content">
                            <p><span style="font-size: 32px;">Gọi Ngay (+84)35 599 9555</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="one withsmallpadding ppb_header " style="text-align:center;padding:60px 0 60px 0;background-color:#5856d6;color:#ffffff;">
        <div class="standard_wrapper">
            <div class="page_content_wrapper">
                <div class="inner">
                    <div style="margin:auto;width:100%">
                        <h2 class="ppb_title" style="color:#ffffff;">Tại sao chọn chúng tôi ?</h2>
                        <div class="page_tagline" style="color:#ffffff;">Khám phá dịch vụ thuê xe &amp; xe limousine hạng nhất của chúng tô</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="one withsmallpadding ppb_text" style="padding-top:0 !important;text-align:center;padding:10px 0 10px 0;background-color:#5856d6;color:#ffffff !important;">
        <div class="standard_wrapper">
            <div class="page_content_wrapper">
                <div class="inner">
                    <div style="margin:auto;width:100%">

                        <div class="one_third " style=""><span class="ti-car" style="display: block; font-size: 50px; margin-bottom: 20px;"> </span>
                            <h4 style="color: #fff;">Nhiều nhãn hiệu xe hơi</h4>
                            <p>Lorem ipsum dolor sit amet, consectadipiscing elit. Aenean commodo ligula eget dolor.</p>
                        </div>
                        <div class="one_third " style="">
                            <span class="ti-face-smile" style="display: block; font-size: 50px; margin-bottom: 20px;"> </span>
                            <h4 style="color: #fff;">Đảm bảo giá tốt nhất</h4>
                            <p>Lorem ipsum dolor sit amet, consectadipiscing elit. Aenean commodo ligula eget dolor.</p>
                        </div>
                        <div class="one_third last " style=""><span class="ti-heart" style="display: block; font-size: 50px; margin-bottom: 20px;"> </span>
                            <h4 style="color: #fff;">
                                Hỗ trợ khách hàng tuyệt vời</h4>
                            <p>Lorem ipsum dolor sit amet, consectadipiscing elit. Aenean commodo ligula eget dolor.</p>
                        </div>
                        <p>
                            <br class="clear" />
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="one withsmallpadding ppb_header " style="text-align:center;padding:60px 0 60px 0;">
        <div class="standard_wrapper">
            <div class="page_content_wrapper">
                <div class="inner">
                    <div style="margin:auto;width:100%">
                        <h2 class="ppb_title" style="">Bài viết &amp; Mẹo</h2>
                        <div class="page_tagline" style="">Khám phá một số mẹo hay nhất từ khắp nơi trên thế giới</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="standard_wrapper">
        <div class="ppb_blog_grid one nopadding" style="padding:0px 0 0px 0;margin-bottom:40px;">
            <div class="page_content_wrapper">
                <div class="inner">
                    <div class="inner_wrapper">
                        <div class="blog_grid_wrapper sidebar_content full_width ppb_blog_posts">
                            <div id="post-18" class="post type-post hentry status-publish ">
                                <div class="post_wrapper grid_layout">
                                    <div class="post_img small static">
                                        <a href="#">
                                            <img src="{{ asset('client/upload/nw6xremkxkg-nicolai-berntsen-960x636.jpg') }}" alt="What To Do if Your Rental Car Has Met With An Accident" class="" />
                                        </a>
                                    </div>
                                    <div class="post_header_wrapper">
                                        <div class="post_header grid">
                                            <div class="post_detail single_post">
                                                        <span class="post_info_date">
													    	<a href="#" title="What To Do if Your Rental Car Has Met With An Accident">January 12, 2017</a>
													    </span>
                                            </div>
                                            <h6><a href="#" title="What To Do if Your Rental Car Has Met With An Accident">What To Do if Your Rental Car Has Met With An Accident</a></h6>
                                        </div>
                                        <p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache...
                                        <div class="post_button_wrapper">
                                            <a class="readmore" href="#">Đọc thêm<span class="ti-angle-right"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="post-29" class="post type-post hentry status-publish ">
                                <div class="post_wrapper grid_layout">
                                    <div class="post_img small static">
                                        <a href="#">
                                            <img src="{{ asset('client/upload/IMG_3496bfree-960x636.jpg') }}" alt="On The Trail of 6 Best Foods in North America" class="" />
                                        </a>
                                    </div>
                                    <div class="post_header_wrapper">
                                        <div class="post_header grid">
                                            <div class="post_detail single_post">
                                                        <span class="post_info_date">
													    	<a href="#" title="On The Trail of 6 Best Foods in North America">January 10, 2017</a>
													    </span>
                                            </div>
                                            <h6><a href="#" title="On The Trail of 6 Best Foods in North America">On The Trail of 6 Best Foods in North America</a></h6>
                                        </div>
                                        <p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache...
                                        <div class="post_button_wrapper">
                                            <a class="readmore" href="#">Đọc thêm<span class="ti-angle-right"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="post-36" class="post type-post hentry status-publish last">
                                <div class="post_wrapper grid_layout">
                                    <div class="post_img small static">
                                        <a href="#">
                                            <img src="{{ asset('client/upload/pexels-photo-2-960x636.jpg') }}" alt="Car Rental Mistakes That Can Cost You Big" class="" />
                                        </a>
                                    </div>
                                    <div class="post_header_wrapper">
                                        <div class="post_header grid">
                                            <div class="post_detail single_post">
                                                        <span class="post_info_date">
													    	<a href="#" title="Car Rental Mistakes That Can Cost You Big">January 9, 2017</a>
													    </span>
                                            </div>
                                            <h6><a href="#" title="Car Rental Mistakes That Can Cost You Big">Car Rental Mistakes That Can Cost You Big</a></h6>
                                        </div>
                                        <p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache...
                                        <div class="post_button_wrapper">
                                            <a class="readmore" href="#">Đọc thêm<span class="ti-angle-right"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br class="clear" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
