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
                        <div class="one_fourth" style="width: 15%">
                            <div>Biển kiểm soát</div>
                            <div class="car_attribute_content" style="font-size: 20px; font-weight: bold">
                                {{ $product->license_plates  }}
                            </div>
                        </div>

                        <div class="one_fourth" style="width: 15%">
                            <div>Màu sắc</div>
                            <div class="car_attribute_content" style="font-size: 20px; font-weight: bold">
                                {{ $product->color  }}
                            </div>
                        </div>
                        <div class="one_fourth" style="width: 15%">
                            <div>Năm sản xuất</div>
                            <div class="car_attribute_content" style="font-size: 20px; font-weight: bold">
                                {{ $product->year  }}
                            </div>
                        </div>
                        <div class="one_fourth" style="width: 15%">
                            <div>Đã chạy</div>
                            <div class="car_attribute_content" style="font-size: 20px; font-weight: bold">
                                {{ number_format($product->km)  }} km
                            </div>
                        </div>

                        <div class="one_fourth" style="width: 15%">
                            <div>Số chỗ</div>
                            <div class="car_attribute_content" style="font-size: 20px; font-weight: bold">
                                {{ number_format($product->number_of_seats ?? 0)  }} chỗ
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
                                <div class="comment_rating_label">Điều khiển</div>
                                <div class="br-theme-fontawesome-stars-o">
                                    <div class="br-widget">
                                        @for($i = 0; $i<$drivingTotal; $i++)
                                            <a href="javascript:;" class="br-selected"></a>
                                        @endfor
                                        @for($i = 0; $i<5 - $drivingTotal; $i++)
                                            <a href="javascript:;"></a>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <div class="comment_rating_wrapper">
                                <div class="comment_rating_label">Nội thất</div>
                                <div class="br-theme-fontawesome-stars-o">
                                    <div class="br-widget">
                                        @for($i = 0; $i<$layoutTotal; $i++)
                                            <a href="javascript:;" class="br-selected"></a>
                                        @endfor
                                        @for($i = 0; $i<5 - $layoutTotal; $i++)
                                            <a href="javascript:;"></a>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <div class="comment_rating_wrapper">
                                <div class="comment_rating_label">Không gian và trải nghiệm lái</div>
                                <div class="br-theme-fontawesome-stars-o">
                                    <div class="br-widget">
                                        @for($i = 0; $i<$spaceTotal; $i++)
                                            <a href="javascript:;" class="br-selected"></a>
                                        @endfor
                                        @for($i = 0; $i<5 - $spaceTotal; $i++)
                                            <a href="javascript:;"></a>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <div class="comment_rating_wrapper">
                                <div class="comment_rating_label">Tổng thể</div>
                                <div class="br-theme-fontawesome-stars-o">
                                    <div class="br-widget">
                                        @for($i = 0; $i<$overAllTotal; $i++)
                                            <a href="javascript:;" class="br-selected"></a>
                                        @endfor
                                        @for($i = 0; $i<5 - $overAllTotal; $i++)
                                            <a href="javascript:;"></a>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <a name="comments"></a>

                            @forelse($rates as $rate)
                                <div class="comment" id="comment-48">
                                    <div class="gravatar">
                                        @if($rate->user->thumbnail)
                                            <img src="{{ $rate->user->thumbnail }}"
                                                 width="60" height="60" alt="{{ $rate->user->name }}"
                                                 class="avatar avatar-60 wp-user-avatar wp-user-avatar-60 alignnone photo">
                                        @else
                                            <img src="{{ asset('client/images/user.png') }}"
                                                 width="60" height="60" alt="{{ $rate->user->name }}"
                                                 class="avatar avatar-60 wp-user-avatar wp-user-avatar-60 alignnone photo">
                                            @endif

                                    </div>

                                    <div class="right ">

                                        <h7>{{ $rate->user->name }}</h7>

                                        <div class="comment_date">{{ \Carbon\Carbon::make($rate->created_at)->format('d/m/Y H:m') }}</div>

                                        <div class="comment_text">
                                            <p>{{ $rate->comment }}</p>
                                            <div class="comment_rating_wrapper">
                                                <div class="comment_rating_label">Điều khiển</div>
                                                <div class="br-theme-fontawesome-stars-o">
                                                    <div class="br-widget">
                                                        @for($i = 0; $i<$rate->driving; $i++)
                                                        <a href="javascript:;" class="br-selected"></a>
                                                        @endfor
                                                        @for($i = 0; $i<5 - $rate->driving; $i++)
                                                            <a href="javascript:;"></a>
                                                        @endfor
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="comment_rating_wrapper">
                                                <div class="comment_rating_label">Nội thất</div>
                                                <div class="br-theme-fontawesome-stars-o">
                                                    <div class="br-widget">
                                                        @for($i = 0; $i<$rate->layout; $i++)
                                                            <a href="javascript:;" class="br-selected"></a>
                                                        @endfor
                                                        @for($i = 0; $i<5 - $rate->layout; $i++)
                                                            <a href="javascript:;"></a>
                                                        @endfor
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="comment_rating_wrapper">
                                                <div class="comment_rating_label">Không gian và trải nghiệm lái</div>
                                                <div class="br-theme-fontawesome-stars-o">
                                                    <div class="br-widget">
                                                        @for($i = 0; $i<$rate->space; $i++)
                                                            <a href="javascript:;" class="br-selected"></a>
                                                        @endfor
                                                        @for($i = 0; $i<5 - $rate->space; $i++)
                                                            <a href="javascript:;"></a>
                                                        @endfor
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="comment_rating_wrapper">
                                                <div class="comment_rating_label">Tổng thể</div>
                                                <div class="br-theme-fontawesome-stars-o">
                                                    <div class="br-widget">
                                                        @for($i = 0; $i<$rate->over_all; $i++)
                                                            <a href="javascript:;" class="br-selected"></a>
                                                        @endfor
                                                        @for($i = 0; $i<5 - $rate->over_all; $i++)
                                                            <a href="javascript:;"></a>

                                                        @endfor
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br class="clear">
                            @empty
                                Chưa có đánh giá !
                        @endforelse

                        <!-- #comment-## -->
                        </div>

                        <!-- End of thread -->
                        <div style="height:10px"></div>

                        <div id="respond" class="comment-respond">
                            <h3 id="reply-title" class="comment-reply-title">Viết đánh giá </h3>
                            <small> @if(!auth('web')->check()) (Đăng nhập để viết đánh giá! )@endif</small>
                            @if(auth('web')->check())
                                @if($isComment)
                                    <form action="#" id="commentform" class="comment-form">

                                        <p class="comment-form-comment">
                                            <label for="comment">Đánh giá</label>
                                            <textarea id="comment" name="comment" wire:model="comment" cols="45"
                                                      rows="8" maxlength="65525"
                                                      required="required"></textarea>
                                        </p>

                                        <p class="comment-form-rating">
                                            <label for="driving_rating">Điều khiển</label>
                                            <span class="commentratingbox">
                            <select id="driving_rating" wire:model="driving" name="driving_rating"><option
                                        value="1">1</option><option
                                        value="2">2</option><option value="3">3</option><option value="4">4</option><option
                                        value="5">5</option></select></span></p>
                                        <p class="comment-form-rating"><label for="interior_rating">Nội thất</label>
                                            <span class="commentratingbox">
                            <select id="interior_rating" wire:model="layout" name="interior_rating"><option
                                        value="1">1</option><option
                                        value="2">2</option><option value="3">3</option><option value="4">4</option><option
                                        value="5">5</option></select></span></p>
                                        <p class="comment-form-rating"><label for="space_rating">Không gian và trải
                                                nghiệm</label>
                                            <span class="commentratingbox">
                            <select id="space_rating" wire:model="space" name="space_rating"><option
                                        value="1">1</option><option value="2">2</option><option
                                        value="3">3</option><option value="4">4</option><option
                                        value="5">5</option></select></span></p>
                                        <p class="comment-form-rating"><label for="overall_rating">Tổng thể</label>
                                            <span class="commentratingbox">
                            <select id="overall_rating" wire:model="overAll" name="overall_rating"><option
                                        value="1">1</option><option
                                        value="2">2</option><option value="3">3</option><option value="4">4</option><option
                                        value="5">5</option></select></span></p>
                                        <p class="form-submit">
                                            <input name="button" wire:click="rating" type="button" id="submit"
                                                   class="submit"
                                                   value="Gửi đánh giá">

                                        </p>
                                    </form>
                                @else
                                    Hãy đặt xe, trải nghiệm dịch vụ để đánh giá sản phẩm!
                                @endif
                            @endif
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
                                @if(auth('web')->check())
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
                                                            value="01:30">01:30</option><option
                                                            value="02:00">02:00</option><option
                                                            value="02:30">02:30</option><option
                                                            value="03:00">03:00</option><option
                                                            value="03:30">03:30</option><option
                                                            value="04:00">04:00</option><option
                                                            value="04:30">04:30</option><option
                                                            value="05:00">05:00</option><option
                                                            value="05:30">05:30</option><option
                                                            value="06:00">06:00</option><option
                                                            value="06:30">06:30</option><option
                                                            value="07:00">07:00</option><option
                                                            value="07:30">7:30</option><option
                                                            value="08:00">08:00</option><option
                                                            value="08:30">8:30</option><option
                                                            value="09:00">09:00</option><option
                                                            value="09:30">9:30</option><option
                                                            value="10:00">10:00</option><option
                                                            value="10:30">10:30</option><option
                                                            value="11:00">11:00</option><option
                                                            value="11:30">11:30</option><option
                                                            value="12:00">12:00</option><option
                                                            value="12:30">12:30</option><option
                                                            value="13:00">13:00</option><option
                                                            value="13:30">13:30</option><option
                                                            value="14:00">14:00</option><option
                                                            value="14:30">14:30</option><option
                                                            value="15:00">15:00</option><option
                                                            value="15:30">15:30</option><option
                                                            value="16:00">16:00</option><option
                                                            value="16:30">16:30</option><option
                                                            value="17:00">17:00</option><option
                                                            value="17:30">17:30</option><option
                                                            value="18:00">18:00</option><option
                                                            value="18:30">18:30</option><option
                                                            value="19:00">19:00</option><option
                                                            value="19:30">19:30</option><option
                                                            value="20:00">20:00</option><option
                                                            value="20:30">20:30</option><option
                                                            value="21:00">21:00</option><option
                                                            value="21:30">21:30</option><option
                                                            value="22:00">22:00</option><option
                                                            value="22:30">22:30</option><option
                                                            value="23:00">23:00</option><option
                                                            value="23:30">23:30</option><option
                                                            value="24:00">24:00</option><option
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
                                                                                                      value="#"
                                                                                                      size="40"
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
                                @else
                                    <div class="single_car_booking_woocommerce_wrapper">
                                        <a href="{{ route('login.form') }}"
                                           class="single_car_add_to_cart button">Đăng nhập để đặt xe
                                        </a>
                                    </div>
                                @endif
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

        </div>
    </div>

</div>
