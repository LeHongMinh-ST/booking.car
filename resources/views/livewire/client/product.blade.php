@section('title')
    {{ $product->name }}
@endsection
<div>
    <div id="page_caption" class="hasbg parallax   withtopbar "
         @if($product->thumbnail)
         style="background-image:url({{ $product->thumbnail }});"
         @else
         style="background-image:url({{ asset('client/upload/Audi-A4-Avant-1.jpg') }});"
        @endif
    >

        <div class="single_car_header_button">
            <div class="standard_wrapper">
                <a href="{{ $product->thumbnail }}" id="single_car_gallery_open" class="button fancy-gallery"><span
                        class="ti-camera"></span>Xem ảnh</a>
                <div style="display:none;">
                    @foreach($product->images as $image)
                        <a id="single_car_gallery_image1" href="{{ $image->image_url }}" title=""
                           class="fancy-gallery"></a>
                    @endforeach
                </div>

                <a href="#video_review112" id="single_car_video_review_open" class="button" data-type="inline"><span
                        class="ti-control-play"></span>Video Review</a>

                <div id="video_review112" class="car_video_review_wrapper" style="display:none;">
                    <iframe width="1280" height="720" src="{{ $product->link_video }}" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscree></iframe>
                </div>
            </div>
        </div>

        <div class="single_car_header_content">
            <div class="standard_wrapper">
                <div class="single_car_header_price">
                <span id="single_car_price">
                    <span class="single_car_price" style="font-size: 40px">{{ number_format($product->price) }}</span>
                    <span class="single_car_currency">VNĐ</span>
                </span>
                    <span id="single_car_price_per_unit_change" class="single_car_price_per_unit">
                    <span id="single_car_unit">Theo giờ</span>
                </span>
                </div>
            </div>
        </div>
    </div>

    <div id="page_content_wrapper" class="hasbg withtopbar ">
        <div class="inner">

            <!-- Begin main content -->
            <div class="inner_wrapper">

                <div class="sidebar_content">

                    <h1>{{ $product->name }}</h1>
                    <div class="car_attribute_wrapper">
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
                                4&nbsp; đánh giá
                            </div>
                        </div>
                    </div>
                    <div class="single_car_attribute_wrapper themeborder">
                        <div class="one_fourth" style="width: 20%">
                            <div>Biển kiểm soát</div>
                            <div class="car_attribute_content" style="font-size: 20px; font-weight: bold">
                                {{ $product->license_plates  }}
                            </div>
                        </div>

                        <div class="one_fourth" style="width: 20%">
                            <div>Màu sắc</div>
                            <div class="car_attribute_content" style="font-size: 20px; font-weight: bold">
                                {{ $product->color  }}
                            </div>
                        </div>
                        <div class="one_fourth" style="width: 20%">
                            <div>Năm sản xuất</div>
                            <div class="car_attribute_content" style="font-size: 20px; font-weight: bold">
                                {{ $product->year  }}
                            </div>
                        </div>
                        <div class="one_fourth" style="width: 20%">
                            <div>Đã chạy</div>
                            <div class="car_attribute_content" style="font-size: 20px; font-weight: bold">
                                {{ number_format($product->km)  }} km
                            </div>
                        </div>

                    </div>
                    <br class="clear">
                    <div class="single_car_content">
                        {!! $product->description !!}
                    </div>

                    <ul class="single_car_departure_wrapper">
                        <li>
                            <h3 class="comment_title">Thông số kỹ thuật</h3>
                            <div class="avg_comment_rating_wrapper themeborder">
                                @foreach($product->other_parameters as $param)
                                    <div class="comment_rating_wrapper">
                                        <div class="comment_rating_label">{{ $param['key'] }}:</div>
                                        <div class="br-theme-fontawesome-stars-o">
                                            <div class="br-widget">
                                                {{ $param['value'] }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </li>
                    </ul>

                    <div class="fullwidth_comment_wrapper sidebar">

                        <h3 class="comment_title">4 Đánh giá</h3>
                        <div class="avg_comment_rating_wrapper themeborder">
                            <div class="comment_rating_wrapper">
                                <div class="comment_rating_label">Driving</div>
                                <div class="br-theme-fontawesome-stars-o">
                                    <div class="br-widget">
                                        <a href="javascript:;" class="br-selected"></a>
                                        <a href="javascript:;" class="br-selected"></a>
                                        <a href="javascript:;" class="br-selected"></a>
                                        <a href="javascript:;" class="br-selected"></a>
                                        <a href="javascript:;"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="comment_rating_wrapper">
                                <div class="comment_rating_label">Interior Layout</div>
                                <div class="br-theme-fontawesome-stars-o">
                                    <div class="br-widget">
                                        <a href="javascript:;" class="br-selected"></a>
                                        <a href="javascript:;" class="br-selected"></a>
                                        <a href="javascript:;" class="br-selected"></a>
                                        <a href="javascript:;" class="br-selected"></a>
                                        <a href="javascript:;"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="comment_rating_wrapper">
                                <div class="comment_rating_label">Space &amp; Practicality</div>
                                <div class="br-theme-fontawesome-stars-o">
                                    <div class="br-widget">
                                        <a href="javascript:;" class="br-selected"></a>
                                        <a href="javascript:;" class="br-selected"></a>
                                        <a href="javascript:;" class="br-selected"></a>
                                        <a href="javascript:;" class="br-selected"></a>
                                        <a href="javascript:;"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="comment_rating_wrapper">
                                <div class="comment_rating_label">Overall</div>
                                <div class="br-theme-fontawesome-stars-o">
                                    <div class="br-widget">
                                        <a href="javascript:;" class="br-selected"></a>
                                        <a href="javascript:;" class="br-selected"></a>
                                        <a href="javascript:;" class="br-selected"></a>
                                        <a href="javascript:;" class="br-selected"></a>
                                        <a href="javascript:;"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <a name="comments"></a>

                            <div class="comment" id="comment-48">
                                <div class="gravatar">
                                    <img src="upload/author1-100x100.jpg" width="60" height="60" alt="Jack Dawson"
                                         class="avatar avatar-60 wp-user-avatar wp-user-avatar-60 alignnone photo">
                                </div>

                                <div class="right ">

                                    <h7>Jack Dawson</h7>

                                    <div class="comment_date">January 18, 2017 at 8:08 am</div>
                                    <a rel="nofollow" class="comment-reply-link" href="#"
                                       aria-label="Reply to Jack Dawson">Reply</a>
                                    <div class="comment_text">
                                        <p>Et leggings fanny pack, elit bespoke vinyl art party Pitchfork selfies master
                                            cleanse Kickstarter seitan retro. Drinking vinegar stumptown yr pop-up
                                            artisan
                                            sunt. Deep v cliche lomo biodiesel Neutra selfies. Shorts fixie consequat
                                            flexitarian four loko tempor duis single-origin coffee. Banksy, elit small
                                            batch
                                            freegan sed.</p>
                                        <div class="comment_rating_wrapper">
                                            <div class="comment_rating_label">Driving</div>
                                            <div class="br-theme-fontawesome-stars-o">
                                                <div class="br-widget">
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="comment_rating_wrapper">
                                            <div class="comment_rating_label">Interior Layout</div>
                                            <div class="br-theme-fontawesome-stars-o">
                                                <div class="br-widget">
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="comment_rating_wrapper">
                                            <div class="comment_rating_label">Space &amp; Practicality</div>
                                            <div class="br-theme-fontawesome-stars-o">
                                                <div class="br-widget">
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="comment_rating_wrapper">
                                            <div class="comment_rating_label">Overall</div>
                                            <div class="br-theme-fontawesome-stars-o">
                                                <div class="br-widget">
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br class="clear">

                            <!-- #comment-## -->

                            <div class="comment" id="comment-49">
                                <div class="gravatar">
                                    <img src="upload/me-100x100.jpg" width="60" height="60" alt="Anna Kornikova"
                                         class="avatar avatar-60 wp-user-avatar wp-user-avatar-60 alignnone photo">
                                </div>

                                <div class="right ">

                                    <h7>Anna Kornikova</h7>

                                    <div class="comment_date">January 18, 2017 at 8:08 am</div>
                                    <a rel="nofollow" class="comment-reply-link" href="#"
                                       aria-label="Reply to Anna Kornikova">Reply</a>
                                    <div class="comment_text">
                                        <p>Exercitation photo booth stumptown tote bag Banksy, elit small batch freegan
                                            sed.
                                            Craft beer elit seitan exercitation, photo booth et 8-bit kale chips
                                            proident
                                            chillwave deep v laborum. Aliquip veniam delectus, Marfa eiusmod Pinterest
                                            in do
                                            umami readymade swag. Selfies iPhone Kickstarter, drinking vinegar jean
                                            vinegar
                                            stumptown yr pop-up artisan sunt. Craft beer elit seitan exercitation, photo
                                            booth,</p>
                                        <div class="comment_rating_wrapper">
                                            <div class="comment_rating_label">Driving</div>
                                            <div class="br-theme-fontawesome-stars-o">
                                                <div class="br-widget">
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="comment_rating_wrapper">
                                            <div class="comment_rating_label">Interior Layout</div>
                                            <div class="br-theme-fontawesome-stars-o">
                                                <div class="br-widget">
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="comment_rating_wrapper">
                                            <div class="comment_rating_label">Space &amp; Practicality</div>
                                            <div class="br-theme-fontawesome-stars-o">
                                                <div class="br-widget">
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="comment_rating_wrapper">
                                            <div class="comment_rating_label">Overall</div>
                                            <div class="br-theme-fontawesome-stars-o">
                                                <div class="br-widget">
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br class="clear">

                            <!-- #comment-## -->

                            <div class="comment" id="comment-50">
                                <div class="gravatar">
                                    <img src="upload/avatar-100x100.png" width="60" height="60" alt="Marie Argeris"
                                         class="avatar avatar-60 wp-user-avatar wp-user-avatar-60 alignnone photo">
                                </div>

                                <div class="right ">

                                    <h7>Marie Argeris</h7>

                                    <div class="comment_date">January 18, 2017 at 8:08 am</div>
                                    <a rel="nofollow" class="comment-reply-link" href="#"
                                       aria-label="Reply to Marie Argeris">Reply</a>
                                    <div class="comment_text">
                                        <p>Statement buttons cover-up tweaks patch pockets perennial lapel collar flap
                                            chest
                                            pockets topline stitching cropped jacket. Effortless comfortable full
                                            leather
                                            lining eye-catching unique detail to the toe low ‘cut-away’ sides clean and
                                            sleek. Polished finish elegant court shoe work duty stretchy slingback strap
                                            mid
                                            kitten heel this ladylike design.</p>
                                        <div class="comment_rating_wrapper">
                                            <div class="comment_rating_label">Driving</div>
                                            <div class="br-theme-fontawesome-stars-o">
                                                <div class="br-widget">
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="comment_rating_wrapper">
                                            <div class="comment_rating_label">Interior Layout</div>
                                            <div class="br-theme-fontawesome-stars-o">
                                                <div class="br-widget">
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="comment_rating_wrapper">
                                            <div class="comment_rating_label">Space &amp; Practicality</div>
                                            <div class="br-theme-fontawesome-stars-o">
                                                <div class="br-widget">
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="comment_rating_wrapper">
                                            <div class="comment_rating_label">Overall</div>
                                            <div class="br-theme-fontawesome-stars-o">
                                                <div class="br-widget">
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br class="clear">

                            <!-- #comment-## -->

                            <div class="comment" id="comment-51">
                                <div class="gravatar">
                                    <img src="upload/author2-100x100.jpg" width="60" height="60" alt="Jessica Medina"
                                         class="avatar avatar-60 wp-user-avatar wp-user-avatar-60 alignnone photo">
                                </div>

                                <div class="right ">

                                    <h7>Jessica Medina</h7>

                                    <div class="comment_date">January 18, 2017 at 8:08 am</div>
                                    <a rel="nofollow" class="comment-reply-link" href="#"
                                       aria-label="Reply to Jessica Medina">Reply</a>
                                    <div class="comment_text">
                                        <p>Foam padding in the insoles leather finest quality staple flat slip-on design
                                            pointed toe off-duty shoe. Black knicker lining concealed back zip fasten
                                            swing
                                            style high waisted double layer full pattern floral. Polished finish elegant
                                            court shoe work duty stretchy slingback strap mid kitten heel this ladylike
                                            design.</p>
                                        <div class="comment_rating_wrapper">
                                            <div class="comment_rating_label">Driving</div>
                                            <div class="br-theme-fontawesome-stars-o">
                                                <div class="br-widget">
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="comment_rating_wrapper">
                                            <div class="comment_rating_label">Interior Layout</div>
                                            <div class="br-theme-fontawesome-stars-o">
                                                <div class="br-widget">
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="comment_rating_wrapper">
                                            <div class="comment_rating_label">Space &amp; Practicality</div>
                                            <div class="br-theme-fontawesome-stars-o">
                                                <div class="br-widget">
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="comment_rating_wrapper">
                                            <div class="comment_rating_label">Overall</div>
                                            <div class="br-theme-fontawesome-stars-o">
                                                <div class="br-widget">
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                    <a href="javascript:;" class="br-selected"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br class="clear">

                            <!-- #comment-## -->
                        </div>

                        <!-- End of thread -->
                        <div style="height:10px"></div>

                        <div id="respond" class="comment-respond">
                            <h3 id="reply-title" class="comment-reply-title">Write A Review <small><a rel="nofollow"
                                                                                                      id="cancel-comment-reply-link"
                                                                                                      href="#"
                                                                                                      style="display:none;">Cancel
                                        reply</a></small></h3>
                            <form action="#" method="post" id="commentform" class="comment-form">
                                <p class="comment-notes"><span
                                        id="email-notes">Your email address will not be published.</span> Required
                                    fields
                                    are marked <span class="required">*</span></p>
                                <p class="comment-form-comment">
                                    <label for="comment">Comment</label>
                                    <textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525"
                                              required="required"></textarea>
                                </p>
                                <p class="comment-form-author">
                                    <label for="author">Name <span class="required">*</span></label>
                                    <input id="author" name="author" type="text" value="" size="30" maxlength="245"
                                           required="required">
                                </p>
                                <p class="comment-form-email">
                                    <label for="email">Email <span class="required">*</span></label>
                                    <input id="email" name="email" type="text" value="" size="30" maxlength="100"
                                           aria-describedby="email-notes" required="required">
                                </p>
                                <p class="comment-form-url">
                                    <label for="url">Website</label>
                                    <input id="url" name="url" type="text" value="" size="30" maxlength="200">
                                </p>
                                <p class="comment-form-rating">
                                    <label for="driving_rating">Driving</label>
                                    <span class="commentratingbox">
                            <select id="driving_rating" name="driving_rating"><option value="1">1</option><option
                                    value="2">2</option><option value="3">3</option><option value="4">4</option><option
                                    value="5">5</option></select></span></p>
                                <p class="comment-form-rating"><label for="interior_rating">Interior Layout</label>
                                    <span class="commentratingbox">
                            <select id="interior_rating" name="interior_rating"><option value="1">1</option><option
                                    value="2">2</option><option value="3">3</option><option value="4">4</option><option
                                    value="5">5</option></select></span></p>
                                <p class="comment-form-rating"><label for="space_rating">Space &amp;
                                        Practicality</label>
                                    <span class="commentratingbox">
                            <select id="space_rating" name="space_rating"><option value="1">1</option><option value="2">2</option><option
                                    value="3">3</option><option value="4">4</option><option
                                    value="5">5</option></select></span></p>
                                <p class="comment-form-rating"><label for="overall_rating">Overall</label>
                                    <span class="commentratingbox">
                            <select id="overall_rating" name="overall_rating"><option value="1">1</option><option
                                    value="2">2</option><option value="3">3</option><option value="4">4</option><option
                                    value="5">5</option></select></span></p>
                                <p class="form-submit"><input name="submit" type="submit" id="submit" class="submit"
                                                              value="Post Review"> <input type="hidden"
                                                                                          name="comment_post_ID"
                                                                                          value="153"
                                                                                          id="comment_post_ID">
                                    <input type="hidden" name="comment_parent" id="comment_parent" value="0">
                                </p> \
                            </form>
                        </div><!-- #respond -->

                    </div>

                </div>

                <div class="sidebar_wrapper">

                    <div class="sidebar_top"></div>

                    <div class="sidebar">

                        <div class="content">

                            <div class="single_car_header_price">
                <span id="single_car_price">
                    <span class="single_car_price" style="font-size: 40px">{{ number_format($product->price) }}</span>
                    <span class="single_car_currency">VNĐ</span>
                </span>
                                <span id="single_car_price_per_unit_change" class="single_car_price_per_unit">
                    <span id="single_car_unit">Theo giờ</span>
                </span>
                            </div>

                            <div class="single_car_booking_wrapper themeborder book_instantly">
                                <div role="form" class="wpcf7" id="wpcf7-f5-o1" lang="en-US" dir="ltr">
                                    <div class="screen-reader-response"></div>
                                    <form action="##wpcf7-f5-o1" method="post" class="wpcf7-form"
                                          novalidate="novalidate">

                                        <p>
                                            <label> Họ và tên
                                                <br>
                                                <span class="wpcf7-form-control-wrap your-name">
                                                <input type="text" wire:model="name"
                                                       placeholder="vd: Nguyễn Thị A"
                                                       class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required">
                                        @error('name')
                                        <div style="color: #f54444">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        </span>
                                        </label>
                                        </p>
                                        <p>
                                            <label> CCCD/CMT
                                                <br>
                                                <span class="wpcf7-form-control-wrap your-tel">
                                                <input type="text" wire:model="personId"
                                                       class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel"
                                                       placeholder="vd: 001500003321"></span>
                                        @error('personId')
                                        <div style="color: #f54444">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        </label>

                                        </p>

                                        <p>
                                            <label> Địa chỉ Email
                                                <br>
                                                <span class="wpcf7-form-control-wrap your-email">
                                                <input type="email" wire:model="email"
                                                       class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email"
                                                       placeholder="vd: sample@yourcompany.com"></span>
                                        @error('email')
                                        <div style="color: #f54444">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        </label>
                                        </p>
                                        <p>
                                            <label> Số điện thoại
                                                <br>
                                                <span class="wpcf7-form-control-wrap your-tel">
                                                <input type="tel" wire:model="phone"
                                                       class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel"
                                                       placeholder="vd: +84 95553311"></span>
                                        @error('phone')
                                        <div style="color: #f54444">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        </label>
                                        </p>
                                        <p>
                                            <label> Hộ khẩu thường chú
                                                <br>
                                                <span class="wpcf7-form-control-wrap pickup-address">
                                                <input type="text"
                                                       wire:model="permanentResidence"
                                                       class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"

                                                       placeholder="vd: 34 Trần Nhân Tông, Hà Nội"></span>
                                        @error('permanentResidence')
                                        <div style="color: #f54444">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        </label>
                                        </p>

                                        <p>
                                            <label> Địa chỉ
                                                <br>
                                                <span class="wpcf7-form-control-wrap pickup-address">
                                                <input type="text"
                                                       wire:model="address"
                                                       class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"

                                                       placeholder="vd: 34 Trần Nhân Tông, Hà Nội"></span>
                                        @error('address')
                                        <div style="color: #f54444">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        </label>
                                        </p>
                                        <p>
                                            <label> Ngày nhận xe
                                                <br>
                                                <span class="wpcf7-form-control-wrap pickup-date">
                                                    <input type="date"
                                                           wire:model="startDay"
                                                           class="wpcf7-form-control wpcf7-date wpcf7-validates-as-required wpcf7-validates-as-date">
                                        @error('startDay')
                                        <div style="color: #f54444">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        </span>
                                            </label>
                                        </p>
                                        <p>
                                            <label> Giờ nhận xe
                                                <br>
                                                <span class="wpcf7-form-control-wrap pickup-time">
                                                <select
                                                    wire:model="startHour"
                                                    class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required">
                                                <option
                                                    value="">---</option>
                                                <option value="01:00">01:00</option><option
                                                        value="01:30">01:30</option><option value="02:00">02:00</option><option
                                                        value="02:30">02:30</option><option value="03:00">03:00</option><option
                                                        value="03:30">03:30</option><option value="04:00">04:00</option><option
                                                        value="04:30">04:30</option><option value="05:00">05:00</option><option
                                                        value="05:30">05:30</option><option value="06:00">06:00</option><option
                                                        value="06:30">06:30</option><option value="07:00">07:00</option><option
                                                        value="07:30">7:30</option><option value="08:00">08:00</option><option
                                                        value="08:30">8:30</option><option value="09:00">09:00</option><option
                                                        value="09:30">9:30</option><option value="10:00">10:00</option><option
                                                        value="10:30">10:30</option><option value="11:00">11:00</option><option
                                                        value="11:30">11:30</option><option value="12:00">12:00</option><option
                                                        value="12:30">12:30</option><option value="13:00">13:00</option><option
                                                        value="13:30">13:30</option><option value="14:00">14:00</option><option
                                                        value="14:30">14:30</option><option value="15:00">15:00</option><option
                                                        value="15:30">15:30</option><option value="16:00">16:00</option><option
                                                        value="16:30">16:30</option><option value="17:00">17:00</option><option
                                                        value="17:30">17:30</option><option value="18:00">18:00</option><option
                                                        value="18:30">18:30</option><option value="19:00">19:00</option><option
                                                        value="19:30">19:30</option><option value="20:00">20:00</option><option
                                                        value="20:30">20:30</option><option value="21:00">21:00</option><option
                                                        value="21:30">21:30</option><option value="22:00">22:00</option><option
                                                        value="22:30">22:30</option><option value="23:00">23:00</option><option
                                                        value="23:30">23:30</option><option value="24:00">24:00</option><option
                                                        value="24:30">24:30</option>
                                                </select>
                                        @error('startHour')
                                        <div style="color: #f54444">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                                </span> </label>
                                        </p>

                                        <p>
                                            <label> Ngày trả xe
                                                <br>
                                                <span class="wpcf7-form-control-wrap dropoff-date">
                                                    <input type="date"
                                                           wire:model="endDay"
                                                           class="wpcf7-form-control wpcf7-date wpcf7-validates-as-required wpcf7-validates-as-date"
                                                    >

                                        @error('endDay')
                                        <div style="color: #f54444">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                                </span>
                                            </label>
                                        </p>
                                        <p>
                                            <label> Thời gian trả xe
                                                <br>
                                                <select
                                                    wire:model="endHour"
                                                    class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required">
                                                    <option
                                                        value="">---
                                                    </option>
                                                    <option value="01:00">01:00</option>
                                                    <option
                                                        value="01:30">01:30
                                                    </option>
                                                    <option value="02:00">02:00</option>
                                                    <option
                                                        value="02:30">02:30
                                                    </option>
                                                    <option value="03:00">03:00</option>
                                                    <option
                                                        value="03:30">03:30
                                                    </option>
                                                    <option value="04:00">04:00</option>
                                                    <option
                                                        value="04:30">04:30
                                                    </option>
                                                    <option value="05:00">05:00</option>
                                                    <option
                                                        value="05:30">05:30
                                                    </option>
                                                    <option value="06:00">06:00</option>
                                                    <option
                                                        value="06:30">06:30
                                                    </option>
                                                    <option value="07:00">07:00</option>
                                                    <option
                                                        value="07:30">7:30
                                                    </option>
                                                    <option value="08:00">08:00</option>
                                                    <option
                                                        value="08:30">8:30
                                                    </option>
                                                    <option value="09:00">09:00</option>
                                                    <option
                                                        value="09:30">9:30
                                                    </option>
                                                    <option value="10:00">10:00</option>
                                                    <option
                                                        value="10:30">10:30
                                                    </option>
                                                    <option value="11:00">11:00</option>
                                                    <option
                                                        value="11:30">11:30
                                                    </option>
                                                    <option value="12:00">12:00</option>
                                                    <option
                                                        value="12:30">12:30
                                                    </option>
                                                    <option value="13:00">13:00</option>
                                                    <option
                                                        value="13:30">13:30
                                                    </option>
                                                    <option value="14:00">14:00</option>
                                                    <option
                                                        value="14:30">14:30
                                                    </option>
                                                    <option value="15:00">15:00</option>
                                                    <option
                                                        value="15:30">15:30
                                                    </option>
                                                    <option value="16:00">16:00</option>
                                                    <option
                                                        value="16:30">16:30
                                                    </option>
                                                    <option value="17:00">17:00</option>
                                                    <option
                                                        value="17:30">17:30
                                                    </option>
                                                    <option value="18:00">18:00</option>
                                                    <option
                                                        value="18:30">18:30
                                                    </option>
                                                    <option value="19:00">19:00</option>
                                                    <option
                                                        value="19:30">19:30
                                                    </option>
                                                    <option value="20:00">20:00</option>
                                                    <option
                                                        value="20:30">20:30
                                                    </option>
                                                    <option value="21:00">21:00</option>
                                                    <option
                                                        value="21:30">21:30
                                                    </option>
                                                    <option value="22:00">22:00</option>
                                                    <option
                                                        value="22:30">22:30
                                                    </option>
                                                    <option value="23:00">23:00</option>
                                                    <option
                                                        value="23:30">23:30
                                                    </option>
                                                    <option value="24:00">24:00</option>
                                                    <option
                                                        value="24:30">24:30
                                                    </option>
                                                </select>
                                        @error('endHour')
                                        <div style="color: #f54444">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                                </span> </label><span
                                                class="wpcf7-form-control-wrap dynamictitle"><input type="hidden"
                                                                                                    name="dynamictitle"
                                                                                                    value="Audi A4"
                                                                                                    size="40"
                                                                                                    class="wpcf7-form-control wpcf7dtx-dynamictext wpcf7-dynamichidden"
                                                                                                    aria-invalid="false"></span><span
                                                class="wpcf7-form-control-wrap dynamicurl"><input type="hidden"
                                                                                                  name="dynamicurl"
                                                                                                  value="#" size="40"
                                                                                                  class="wpcf7-form-control wpcf7dtx-dynamictext wpcf7-dynamichidden"
                                                                                                  aria-invalid="false"></span>
                                        </p>
                                    </form>
                                </div>

                                <div class="single_car_booking_woocommerce_wrapper">
                                    <button wire:click="store"
                                            class="single_car_add_to_cart button">Đặt xe
                                    </button>
                                </div>
                                <br class="clear">
                            </div>


                        </div>

                    </div>
                    <br class="clear">

                    <div class="sidebar_bottom"></div>
                </div>

            </div>
            <!-- End main content -->

            <br class="clear">
            <div class="car_related">
                <h3 class="sub_title">Similar cars</h3>
                <div id="portfolio_filter_wrapper"
                     class="gallery classic three_cols portfolio-content section content clearfix" data-columns="3">
                    <div class="element grid classic3_cols">
                        <div class="one_third gallery3 classic static filterable portfolio_type themeborder"
                             data-id="post-240">

                            <a class="car_image" href="#">
                                <img
                                    src={{ asset('client/upload/2017-Audi-Q7-fornt-three-quarter-03-700x466.jpg') }} alt="Audi
                                    Q5">
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
                                            4&nbsp; reviews
                                        </div>
                                    </div>

                                    <div class="car_attribute_wrapper_icon">
                                        <div class="one_fourth">
                                            <div class="car_attribute_icon ti-user"></div>
                                            <div class="car_attribute_content">
                                                5
                                            </div>
                                        </div>

                                        <div class="one_fourth">
                                            <div class="car_attribute_icon ti-briefcase"></div>
                                            <div class="car_attribute_content">
                                                4
                                            </div>
                                        </div>

                                        <div class="one_fourth">
                                            <div class="car_attribute_icon ti-panel"></div>
                                            <div class="car_attribute_content">
                                                Auto
                                            </div>
                                        </div>

                                    </div>
                                    <br class="clear">
                                </div>
                                <div class="car_attribute_price">
                                    <div class="car_attribute_price_day three_cols">
                                        <span class="single_car_currency">$</span><span
                                            class="single_car_price">126</span>
                                        <span class="car_unit_day">Per Day</span>
                                    </div>
                                </div>
                                <br class="clear">
                            </div>
                        </div>
                    </div>
                    <div class="element grid classic3_cols">
                        <div class="one_third gallery3 classic static filterable portfolio_type themeborder"
                             data-id="post-240">

                            <a class="car_image" href="#">
                                <img
                                    src={{ asset('client/upload/2017-Audi-Q7-fornt-three-quarter-03-700x466.jpg') }} alt="Audi
                                    Q5">
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
                                            4&nbsp; reviews
                                        </div>
                                    </div>

                                    <div class="car_attribute_wrapper_icon">
                                        <div class="one_fourth">
                                            <div class="car_attribute_icon ti-user"></div>
                                            <div class="car_attribute_content">
                                                5
                                            </div>
                                        </div>

                                        <div class="one_fourth">
                                            <div class="car_attribute_icon ti-briefcase"></div>
                                            <div class="car_attribute_content">
                                                4
                                            </div>
                                        </div>

                                        <div class="one_fourth">
                                            <div class="car_attribute_icon ti-panel"></div>
                                            <div class="car_attribute_content">
                                                Auto
                                            </div>
                                        </div>

                                    </div>
                                    <br class="clear">
                                </div>
                                <div class="car_attribute_price">
                                    <div class="car_attribute_price_day three_cols">
                                        <span class="single_car_currency">$</span><span
                                            class="single_car_price">126</span>
                                        <span class="car_unit_day">Per Day</span>
                                    </div>
                                </div>
                                <br class="clear">
                            </div>
                        </div>
                    </div>
                    <div class="element grid classic3_cols">
                        <div class="one_third gallery3 classic static filterable portfolio_type themeborder"
                             data-id="post-240">

                            <a class="car_image" href="#">
                                <img
                                    src={{ asset('client/upload/2017-Audi-Q7-fornt-three-quarter-03-700x466.jpg') }} alt="Audi">
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
                                            4&nbsp; reviews
                                        </div>
                                    </div>

                                    <div class="car_attribute_wrapper_icon">
                                        <div class="one_fourth">
                                            <div class="car_attribute_icon ti-user"></div>
                                            <div class="car_attribute_content">
                                                5
                                            </div>
                                        </div>

                                        <div class="one_fourth">
                                            <div class="car_attribute_icon ti-briefcase"></div>
                                            <div class="car_attribute_content">
                                                4
                                            </div>
                                        </div>

                                        <div class="one_fourth">
                                            <div class="car_attribute_icon ti-panel"></div>
                                            <div class="car_attribute_content">
                                                Auto
                                            </div>
                                        </div>

                                    </div>
                                    <br class="clear">
                                </div>
                                <div class="car_attribute_price">
                                    <div class="car_attribute_price_day three_cols">
                                        <span class="single_car_currency">$</span><span
                                            class="single_car_price">126</span>
                                        <span class="car_unit_day">Per Day</span>
                                    </div>
                                </div>
                                <br class="clear">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>
