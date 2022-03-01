@section('title')
    Danh sách xe thuê
@endsection

<div id="page_caption" class="hasbg parallax  withtopbar  " style="background-image:url(upload/driver-2.jpg);">

    <div class="page_title_wrapper">
        <div class="page_title_inner">
            <div class="page_title_content">
                <h1 class="withtopbar">Car List Left Sidebar</h1>
                <div class="page_tagline">
                    This is sample of page tagline and you can set it up using page option </div>
            </div>
        </div>
    </div>

</div>

<!-- Begin content -->
<div id="page_content_wrapper" class="hasbg withtopbar ">
    <form id="car_search_form" name="car_search_form" method="get" action="#">
        <div class="car_search_wrapper">
            <div class="one_fourth themeborder">
                <select id="brand" name="brand">
                    <option value="">Any Brand</option>
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
                    <option value="">Any Type</option>
                    <option value="Coupe">Coupe</option>
                    <option value="Sedan">Sedan</option>
                    <option value="SUV">SUV</option>
                </select>
                <span class="ti-angle-down"></span>
            </div>
            <div class="one_fourth themeborder">
                <select id="sort_by" name="sort_by">
                    <option value="price_low">Price Low to High</option>
                    <option value="price_high">Price High to Low</option>
                    <option value="model">Sort By Model</option>
                    <option value="popular">Sort By Popularity</option>
                    <option value="review">Sort By Review Score</option>
                </select>
                <span class="ti-exchange-vertical"></span>
            </div>
            <div class="one_fourth last themeborder">
                <input id="car_search_btn" type="submit" class="button" value="Search" />
            </div>
        </div>
    </form>

    <!-- Begin content -->

    <div class="inner">

        <div class="inner_wrapper nopadding">
            <div id="page_main_content" class="sidebar_content fixed_column">

                <div class="standard_wrapper">

                    <div id="portfolio_filter_wrapper" class="gallery classic two_cols portfolio-content section content clearfix" data-columns="3">

                        <div class="element grid classic2_cols animated2">

                            <div class="one_half gallery2 classic static filterable portfolio_type themeborder" data-id="post-2">

                                <a class="car_image" href="#">
                                    <img src="upload/bmw-3-series-sedan-wallpaper-1920x1200-05-700x466.jpg" alt="BMW 3 Series" />
                                </a>

                                <div class="portfolio_info_wrapper">
                                    <div class="car_attribute_wrapper">
                                        <a class="car_link" href="#"><h4>BMW 3 Series</h4></a>
                                        <div class="car_attribute_rating">
                                            <div class="br-theme-fontawesome-stars-o">
                                                <div class="br-widget">
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;"></a>
                                                </div>
                                            </div>
                                            <div class="car_attribute_rating_count">
                                                4&nbsp; reviews </div>
                                        </div>

                                        <div class="car_attribute_wrapper_icon">
                                            <div class="one_fourth">
                                                <div class="car_attribute_icon ti-user"></div>
                                                <div class="car_attribute_content">
                                                    4 </div>
                                            </div>

                                            <div class="one_fourth">
                                                <div class="car_attribute_icon ti-briefcase"></div>
                                                <div class="car_attribute_content">
                                                    2 </div>
                                            </div>

                                            <div class="one_fourth">
                                                <div class="car_attribute_icon ti-panel"></div>
                                                <div class="car_attribute_content">
                                                    Auto </div>
                                            </div>

                                        </div>
                                        <br class="clear" />
                                    </div>
                                    <div class="car_attribute_price">
                                        <div class="car_attribute_price_day three_cols">
                                            <span class="single_car_currency">$</span><span class="single_car_price">64</span> <span class="car_unit_day">Per Day</span>
                                        </div>
                                    </div>
                                    <br class="clear" />
                                </div>
                            </div>
                        </div>
                        <div class="element grid classic2_cols animated3">

                            <div class="one_half gallery2 classic static filterable portfolio_type themeborder" data-id="post-3">

                                <a class="car_image" href="#">
                                    <img src="upload/2015-audi-a3_100460783_h-700x466.jpg" alt="Audi A3" />
                                </a>

                                <div class="portfolio_info_wrapper">
                                    <div class="car_attribute_wrapper">
                                        <a class="car_link" href="#"><h4>Audi A3</h4></a>
                                        <div class="car_attribute_rating">
                                            <div class="br-theme-fontawesome-stars-o">
                                                <div class="br-widget">
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;"></a>
                                                    <a href="javascript:;"></a>
                                                </div>
                                            </div>
                                            <div class="car_attribute_rating_count">
                                                4&nbsp; reviews </div>
                                        </div>

                                        <div class="car_attribute_wrapper_icon">
                                            <div class="one_fourth">
                                                <div class="car_attribute_icon ti-user"></div>
                                                <div class="car_attribute_content">
                                                    4 </div>
                                            </div>

                                            <div class="one_fourth">
                                                <div class="car_attribute_icon ti-briefcase"></div>
                                                <div class="car_attribute_content">
                                                    2 </div>
                                            </div>

                                            <div class="one_fourth">
                                                <div class="car_attribute_icon ti-panel"></div>
                                                <div class="car_attribute_content">
                                                    Auto </div>
                                            </div>

                                        </div>
                                        <br class="clear" />
                                    </div>
                                    <div class="car_attribute_price">
                                        <div class="car_attribute_price_day three_cols">
                                            <span class="single_car_currency">$</span><span class="single_car_price">78</span> <span class="car_unit_day">Per Day</span>
                                        </div>
                                    </div>
                                    <br class="clear" />
                                </div>
                            </div>
                        </div>
                        <div class="element grid classic2_cols animated4">

                            <div class="one_half gallery2 classic static filterable portfolio_type themeborder" data-id="post-4">

                                <a class="car_image" href="#">
                                    <img src="upload/Audi-A4-Avant-1-700x466.jpg" alt="Audi A4" />
                                </a>

                                <div class="portfolio_info_wrapper">
                                    <div class="car_attribute_wrapper">
                                        <a class="car_link" href="#"><h4>Audi A4</h4></a>
                                        <div class="car_attribute_rating">
                                            <div class="br-theme-fontawesome-stars-o">
                                                <div class="br-widget">
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;"></a>
                                                    <a href="javascript:;"></a>
                                                </div>
                                            </div>
                                            <div class="car_attribute_rating_count">
                                                4&nbsp; reviews </div>
                                        </div>

                                        <div class="car_attribute_wrapper_icon">
                                            <div class="one_fourth">
                                                <div class="car_attribute_icon ti-user"></div>
                                                <div class="car_attribute_content">
                                                    5 </div>
                                            </div>

                                            <div class="one_fourth">
                                                <div class="car_attribute_icon ti-briefcase"></div>
                                                <div class="car_attribute_content">
                                                    2 </div>
                                            </div>

                                            <div class="one_fourth">
                                                <div class="car_attribute_icon ti-panel"></div>
                                                <div class="car_attribute_content">
                                                    Auto </div>
                                            </div>

                                        </div>
                                        <br class="clear" />
                                    </div>
                                    <div class="car_attribute_price">
                                        <div class="car_attribute_price_day three_cols">
                                            <span class="single_car_currency">$</span><span class="single_car_price">84</span> <span class="car_unit_day">Per Day</span>
                                        </div>
                                    </div>
                                    <br class="clear" />
                                </div>
                            </div>
                        </div>
                        <div class="element grid classic2_cols animated5">

                            <div class="one_half gallery2 classic static filterable portfolio_type themeborder" data-id="post-5">

                                <a class="car_image" href="#">
                                    <img src="upload/2016-MINI-Cooper-S-Clubman-ALL4-700x466.jpg" alt="MINI Cooper S" />
                                </a>

                                <div class="portfolio_info_wrapper">
                                    <div class="car_attribute_wrapper">
                                        <a class="car_link" href="#"><h4>MINI Cooper S</h4></a>
                                        <div class="car_attribute_rating">
                                            <div class="br-theme-fontawesome-stars-o">
                                                <div class="br-widget">
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;"></a>
                                                    <a href="javascript:;"></a>
                                                </div>
                                            </div>
                                            <div class="car_attribute_rating_count">
                                                4&nbsp; reviews </div>
                                        </div>

                                        <div class="car_attribute_wrapper_icon">
                                            <div class="one_fourth">
                                                <div class="car_attribute_icon ti-user"></div>
                                                <div class="car_attribute_content">
                                                    4 </div>
                                            </div>

                                            <div class="one_fourth">
                                                <div class="car_attribute_icon ti-briefcase"></div>
                                                <div class="car_attribute_content">
                                                    2 </div>
                                            </div>

                                            <div class="one_fourth">
                                                <div class="car_attribute_icon ti-panel"></div>
                                                <div class="car_attribute_content">
                                                    Auto </div>
                                            </div>

                                        </div>
                                        <br class="clear" />
                                    </div>
                                    <div class="car_attribute_price">
                                        <div class="car_attribute_price_day three_cols">
                                            <span class="single_car_currency">$</span><span class="single_car_price">89</span> <span class="car_unit_day">Per Day</span>
                                        </div>
                                    </div>
                                    <br class="clear" />
                                </div>
                            </div>
                        </div>
                        <div class="element grid classic2_cols animated6">

                            <div class="one_half gallery2 classic static filterable portfolio_type themeborder" data-id="post-6">

                                <a class="car_image" href="#">
                                    <img src="upload/Mercedes-C-Class-Estate-1-700x466.jpg" alt="Mercedes Benz C-Class" />
                                </a>

                                <div class="portfolio_info_wrapper">
                                    <div class="car_attribute_wrapper">
                                        <a class="car_link" href="#"><h4>Mercedes Benz C-Class</h4></a>
                                        <div class="car_attribute_rating">
                                            <div class="br-theme-fontawesome-stars-o">
                                                <div class="br-widget">
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;"></a>
                                                </div>
                                            </div>
                                            <div class="car_attribute_rating_count">
                                                4&nbsp; reviews </div>
                                        </div>

                                        <div class="car_attribute_wrapper_icon">
                                            <div class="one_fourth">
                                                <div class="car_attribute_icon ti-user"></div>
                                                <div class="car_attribute_content">
                                                    5 </div>
                                            </div>

                                            <div class="one_fourth">
                                                <div class="car_attribute_icon ti-briefcase"></div>
                                                <div class="car_attribute_content">
                                                    2 </div>
                                            </div>

                                            <div class="one_fourth">
                                                <div class="car_attribute_icon ti-panel"></div>
                                                <div class="car_attribute_content">
                                                    Auto </div>
                                            </div>

                                        </div>
                                        <br class="clear" />
                                    </div>
                                    <div class="car_attribute_price">
                                        <div class="car_attribute_price_day three_cols">
                                            <span class="single_car_currency">$</span><span class="single_car_price">90</span> <span class="car_unit_day">Per Day</span>
                                        </div>
                                    </div>
                                    <br class="clear" />
                                </div>
                            </div>
                        </div>
                        <div class="element grid classic2_cols animated7">

                            <div class="one_half gallery2 classic static filterable portfolio_type themeborder" data-id="post-7">

                                <a class="car_image" href="#">
                                    <img src="upload/535a980f75319ea470a7306d90ae1524_XL-700x466.jpg" alt="MINI Countryman" />
                                </a>

                                <div class="portfolio_info_wrapper">
                                    <div class="car_attribute_wrapper">
                                        <a class="car_link" href="#"><h4>MINI Countryman</h4></a>
                                        <div class="car_attribute_rating">
                                            <div class="br-theme-fontawesome-stars-o">
                                                <div class="br-widget">
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;"></a>
                                                </div>
                                            </div>
                                            <div class="car_attribute_rating_count">
                                                4&nbsp; reviews </div>
                                        </div>

                                        <div class="car_attribute_wrapper_icon">
                                            <div class="one_fourth">
                                                <div class="car_attribute_icon ti-user"></div>
                                                <div class="car_attribute_content">
                                                    4 </div>
                                            </div>

                                            <div class="one_fourth">
                                                <div class="car_attribute_icon ti-briefcase"></div>
                                                <div class="car_attribute_content">
                                                    2 </div>
                                            </div>

                                            <div class="one_fourth">
                                                <div class="car_attribute_icon ti-panel"></div>
                                                <div class="car_attribute_content">
                                                    Auto </div>
                                            </div>

                                        </div>
                                        <br class="clear" />
                                    </div>
                                    <div class="car_attribute_price">
                                        <div class="car_attribute_price_day three_cols">
                                            <span class="single_car_currency">$</span><span class="single_car_price">95</span> <span class="car_unit_day">Per Day</span>
                                        </div>
                                    </div>
                                    <br class="clear" />
                                </div>
                            </div>
                        </div>
                        <div class="element grid classic2_cols animated8">

                            <div class="one_half gallery2 classic static filterable portfolio_type themeborder" data-id="post-8">

                                <a class="car_image" href="#">
                                    <img src="upload/2017-lexus-ls-460-2-700x466.jpg" alt="Lexus LS 460" />
                                </a>

                                <div class="portfolio_info_wrapper">
                                    <div class="car_attribute_wrapper">
                                        <a class="car_link" href="#"><h4>Lexus LS 460</h4></a>
                                        <div class="car_attribute_rating">
                                            <div class="br-theme-fontawesome-stars-o">
                                                <div class="br-widget">
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;"></a>
                                                    <a href="javascript:;"></a>
                                                </div>
                                            </div>
                                            <div class="car_attribute_rating_count">
                                                4&nbsp; reviews </div>
                                        </div>

                                        <div class="car_attribute_wrapper_icon">
                                            <div class="one_fourth">
                                                <div class="car_attribute_icon ti-user"></div>
                                                <div class="car_attribute_content">
                                                    5 </div>
                                            </div>

                                            <div class="one_fourth">
                                                <div class="car_attribute_icon ti-briefcase"></div>
                                                <div class="car_attribute_content">
                                                    4 </div>
                                            </div>

                                            <div class="one_fourth">
                                                <div class="car_attribute_icon ti-panel"></div>
                                                <div class="car_attribute_content">
                                                    Auto </div>
                                            </div>

                                        </div>
                                        <br class="clear" />
                                    </div>
                                    <div class="car_attribute_price">
                                        <div class="car_attribute_price_day three_cols">
                                            <span class="single_car_currency">$</span><span class="single_car_price">99</span> <span class="car_unit_day">Per Day</span>
                                        </div>
                                    </div>
                                    <br class="clear" />
                                </div>
                            </div>
                        </div>
                        <div class="element grid classic2_cols animated9">

                            <div class="one_half gallery2 classic static filterable portfolio_type themeborder" data-id="post-9">

                                <a class="car_image" href="#">
                                    <img src="upload/mercedes-benz-cls-class-shooting-brake-13824-1920x1200-700x466.jpg" alt="Mercedes Benz CLS-Class" />
                                </a>

                                <div class="portfolio_info_wrapper">
                                    <div class="car_attribute_wrapper">
                                        <a class="car_link" href="#"><h4>Mercedes Benz CLS-Class</h4></a>
                                        <div class="car_attribute_rating">
                                            <div class="br-theme-fontawesome-stars-o">
                                                <div class="br-widget">
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;"></a>
                                                </div>
                                            </div>
                                            <div class="car_attribute_rating_count">
                                                4&nbsp; reviews </div>
                                        </div>

                                        <div class="car_attribute_wrapper_icon">
                                            <div class="one_fourth">
                                                <div class="car_attribute_icon ti-user"></div>
                                                <div class="car_attribute_content">
                                                    4 </div>
                                            </div>

                                            <div class="one_fourth">
                                                <div class="car_attribute_icon ti-briefcase"></div>
                                                <div class="car_attribute_content">
                                                    2 </div>
                                            </div>

                                            <div class="one_fourth">
                                                <div class="car_attribute_icon ti-panel"></div>
                                                <div class="car_attribute_content">
                                                    Auto </div>
                                            </div>

                                        </div>
                                        <br class="clear" />
                                    </div>
                                    <div class="car_attribute_price">
                                        <div class="car_attribute_price_day three_cols">
                                            <span class="single_car_currency">$</span><span class="single_car_price">100</span> <span class="car_unit_day">Per Day</span>
                                        </div>
                                    </div>
                                    <br class="clear" />
                                </div>
                            </div>
                        </div>
                        <div class="element grid classic2_cols animated10">

                            <div class="one_half gallery2 classic static filterable portfolio_type themeborder" data-id="post-10">

                                <a class="car_image" href="#">
                                    <img src="upload/2016-Lexus-RX-350-BM-01-700x466.jpg" alt="Lexus RX 350" />
                                </a>

                                <div class="portfolio_info_wrapper">
                                    <div class="car_attribute_wrapper">
                                        <a class="car_link" href="#"><h4>Lexus RX 350</h4></a>
                                        <div class="car_attribute_rating">
                                            <div class="br-theme-fontawesome-stars-o">
                                                <div class="br-widget">
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;"></a>
                                                    <a href="javascript:;"></a>
                                                </div>
                                            </div>
                                            <div class="car_attribute_rating_count">
                                                4&nbsp; reviews </div>
                                        </div>

                                        <div class="car_attribute_wrapper_icon">
                                            <div class="one_fourth">
                                                <div class="car_attribute_icon ti-user"></div>
                                                <div class="car_attribute_content">
                                                    5 </div>
                                            </div>

                                            <div class="one_fourth">
                                                <div class="car_attribute_icon ti-briefcase"></div>
                                                <div class="car_attribute_content">
                                                    4 </div>
                                            </div>

                                            <div class="one_fourth">
                                                <div class="car_attribute_icon ti-panel"></div>
                                                <div class="car_attribute_content">
                                                    Auto </div>
                                            </div>

                                        </div>
                                        <br class="clear" />
                                    </div>
                                    <div class="car_attribute_price">
                                        <div class="car_attribute_price_day three_cols">
                                            <span class="single_car_currency">$</span><span class="single_car_price">110</span> <span class="car_unit_day">Per Day</span>
                                        </div>
                                    </div>
                                    <br class="clear" />
                                </div>
                            </div>
                        </div>
                        <div class="element grid classic2_cols animated11">

                            <div class="one_half gallery2 classic static filterable portfolio_type themeborder" data-id="post-11">

                                <a class="car_image" href="#">
                                    <img src="upload/2017-Audi-Q7-fornt-three-quarter-03-700x466.jpg" alt="Audi Q5" />
                                </a>

                                <div class="portfolio_info_wrapper">
                                    <div class="car_attribute_wrapper">
                                        <a class="car_link" href="#"><h4>Audi Q5</h4></a>
                                        <div class="car_attribute_rating">
                                            <div class="br-theme-fontawesome-stars-o">
                                                <div class="br-widget">
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;"></a>
                                                </div>
                                            </div>
                                            <div class="car_attribute_rating_count">
                                                4&nbsp; reviews </div>
                                        </div>

                                        <div class="car_attribute_wrapper_icon">
                                            <div class="one_fourth">
                                                <div class="car_attribute_icon ti-user"></div>
                                                <div class="car_attribute_content">
                                                    5 </div>
                                            </div>

                                            <div class="one_fourth">
                                                <div class="car_attribute_icon ti-briefcase"></div>
                                                <div class="car_attribute_content">
                                                    4 </div>
                                            </div>

                                            <div class="one_fourth">
                                                <div class="car_attribute_icon ti-panel"></div>
                                                <div class="car_attribute_content">
                                                    Auto </div>
                                            </div>

                                        </div>
                                        <br class="clear" />
                                    </div>
                                    <div class="car_attribute_price">
                                        <div class="car_attribute_price_day three_cols">
                                            <span class="single_car_currency">$</span><span class="single_car_price">126</span> <span class="car_unit_day">Per Day</span>
                                        </div>
                                    </div>
                                    <br class="clear" />
                                </div>
                            </div>
                        </div>
                        <div class="element grid classic2_cols animated12">

                            <div class="one_half gallery2 classic static filterable portfolio_type themeborder" data-id="post-12">

                                <a class="car_image" href="#">
                                    <img src="upload/2016-Mercedes-Benz-GLE-2-700x466.jpg" alt="Mercedes Benz GLE" />
                                </a>

                                <div class="portfolio_info_wrapper">
                                    <div class="car_attribute_wrapper">
                                        <a class="car_link" href="#"><h4>Mercedes Benz GLE</h4></a>
                                        <div class="car_attribute_rating">
                                            <div class="br-theme-fontawesome-stars-o">
                                                <div class="br-widget">
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;"></a>
                                                </div>
                                            </div>
                                            <div class="car_attribute_rating_count">
                                                4&nbsp; reviews </div>
                                        </div>

                                        <div class="car_attribute_wrapper_icon">
                                            <div class="one_fourth">
                                                <div class="car_attribute_icon ti-user"></div>
                                                <div class="car_attribute_content">
                                                    5 </div>
                                            </div>

                                            <div class="one_fourth">
                                                <div class="car_attribute_icon ti-briefcase"></div>
                                                <div class="car_attribute_content">
                                                    4 </div>
                                            </div>

                                            <div class="one_fourth">
                                                <div class="car_attribute_icon ti-panel"></div>
                                                <div class="car_attribute_content">
                                                    Auto </div>
                                            </div>

                                        </div>
                                        <br class="clear" />
                                    </div>
                                    <div class="car_attribute_price">
                                        <div class="car_attribute_price_day three_cols">
                                            <span class="single_car_currency">$</span><span class="single_car_price">127</span> <span class="car_unit_day">Per Day</span>
                                        </div>
                                    </div>
                                    <br class="clear" />
                                </div>
                            </div>
                        </div>
                        <div class="element grid classic2_cols animated13">

                            <div class="one_half gallery2 classic static filterable portfolio_type themeborder" data-id="post-13">

                                <a class="car_image" href="#">
                                    <img src="upload/P14_0596_a4_rgb-1-700x466.jpg" alt="Porsche Cayenne" />
                                </a>

                                <div class="portfolio_info_wrapper">
                                    <div class="car_attribute_wrapper">
                                        <a class="car_link" href="#"><h4>Porsche Cayenne</h4></a>
                                        <div class="car_attribute_rating">
                                            <div class="br-theme-fontawesome-stars-o">
                                                <div class="br-widget">
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;"></a>
                                                </div>
                                            </div>
                                            <div class="car_attribute_rating_count">
                                                4&nbsp; reviews </div>
                                        </div>

                                        <div class="car_attribute_wrapper_icon">
                                            <div class="one_fourth">
                                                <div class="car_attribute_icon ti-user"></div>
                                                <div class="car_attribute_content">
                                                    5 </div>
                                            </div>

                                            <div class="one_fourth">
                                                <div class="car_attribute_icon ti-briefcase"></div>
                                                <div class="car_attribute_content">
                                                    4 </div>
                                            </div>

                                            <div class="one_fourth">
                                                <div class="car_attribute_icon ti-panel"></div>
                                                <div class="car_attribute_content">
                                                    Auto </div>
                                            </div>

                                        </div>
                                        <br class="clear" />
                                    </div>
                                    <div class="car_attribute_price">
                                        <div class="car_attribute_price_day three_cols">
                                            <span class="single_car_currency">$</span><span class="single_car_price">127</span> <span class="car_unit_day">Per Day</span>
                                        </div>
                                    </div>
                                    <br class="clear" />
                                </div>
                            </div>
                        </div>

                    </div>
                    <br class="clear" />
                    <div class="pagination"><span class="current">1</span><a href='#' class="inactive">2</a></div>
                    <div class="pagination_detail">
                        Page 1 of 2 </div>

                </div>
            </div>

            <div class="sidebar_wrapper">
                <div class="sidebar">

                    <div class="content">

                        <ul class="sidebar_widget">
                            <li id="text-4" class="widget widget_text">
                                <h2 class="widgettitle">For More Informations</h2>
                                <div class="textwidget"><span class="ti-mobile" style="margin-right:10px;"></span>1-567-124-44227
                                    <br/>
                                    <span class="ti-alarm-clock" style="margin-right:10px;"></span>Mon - Sat 8.00 - 18.00</div>
                            </li>
                            <li id="grandcarrental_cat_posts-2" class="widget grandcarrental_Cat_Posts">
                                <h2 class="widgettitle"><span>Rental Tips</span></h2>
                                <ul class="posts blog withthumb ">
                                    <li>
                                        <div class="post_circle_thumb">
                                            <a href="#"><img class="alignleft frame post_thumb" src="upload/traffic-car-vehicle-black-150x150.jpg" alt="" /></a>
                                        </div><a href="#">America Car Rental Offers Lowest Car Rental Rates</a>
                                        <div class="post_attribute">January 5, 2017</div>
                                    </li>
                                    <li>
                                        <div class="post_circle_thumb">
                                            <a href="#"><img class="alignleft frame post_thumb" src="upload/pexels-photo-245374-150x150.jpeg" alt="" /></a>
                                        </div><a href="#">How to Enjoy Sightseeing Los Angeles With Car Rentals</a>
                                        <div class="post_attribute">January 4, 2017</div>
                                    </li>
                                    <li>
                                        <div class="post_circle_thumb">
                                            <a href="#"><img class="alignleft frame post_thumb" src="upload/road-people-street-smartphone-150x150.jpg" alt="" /></a>
                                        </div><a href="#">Ride Across the Blue Ridge Parkway</a>
                                        <div class="post_attribute">January 3, 2017</div>
                                    </li>
                                </ul>
                            </li>
                            <li id="grandcarrental_social_profiles_posts-3" class="widget grandcarrental_Social_Profiles_Posts">
                                <h2 class="widgettitle">Connect with Us</h2>
                                <div class="social_wrapper shortcode light small">
                                    <ul>
                                        <li class="facebook"><a target="_blank" title="Facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li class="twitter"><a target="_blank" title="Twitter" href="https://twitter.com/#"><i class="fa fa-twitter"></i></a></li>
                                        <li class="youtube"><a target="_blank" title="Youtube" href="#"><i class="fa fa-youtube"></i></a></li>
                                        <li class="pinterest"><a target="_blank" title="Pinterest" href="https://pinterest.com/#"><i class="fa fa-pinterest"></i></a></li>
                                        <li class="instagram"><a target="_blank" title="Instagram" href="https://instagram.com/theplanetd"><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
