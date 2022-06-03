@section('title')
    Liên Hệ
@endsection

<div>
    <div id="page_caption" class="hasbg parallax  withtopbar  "
         style="background-image:url({{ asset('client/upload/driver-2.jpg') }});">

        <div class="page_title_wrapper">
            <div class="page_title_inner">
                <div class="page_title_content">
                    <h1 class="withtopbar">Liên hệ</h1>
                    <div class="page_tagline">
                        This is sample of page tagline and you can set it up using page option
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="ppb_wrapper hasbg withtopbar">
        <div class="one withsmallpadding ppb_text" style="text-align:center;padding:0px 0 0px 0;margin-top:20px;">
            <div class="standard_wrapper">
                <div class="page_content_wrapper">
                    <div class="inner">
                        <div style="margin:auto;width:80%">
                            <h4 class="p1"><span class="s1"><b>
Chỉ hơn một tháng sau chuyến đi của tôi và tôi tự hỏi mình đã thay đổi như thế nào, nếu có. Chắc chắn rằng những trải nghiệm tôi đã có và những điều tôi thấy đã định hình tôi theo một cách nào đó.</b></span>
                            </h4>
                            <div style="margin-top: 30px;">
                                <div class="social_wrapper shortcode dark ">
                                    <ul>
                                        <li class="facebook"><a target="_blank" title="Facebook" href="#"><i
                                                        class="fa fa-facebook"></i></a></li>
                                        <li class="twitter"><a target="_blank" title="Twitter" href="https://twitter.com/#"><i
                                                        class="fa fa-twitter"></i></a></li>
                                        <li class="youtube"><a target="_blank" title="Youtube" href="#"><i
                                                        class="fa fa-youtube"></i></a></li>
                                        <li class="pinterest"><a target="_blank" title="Pinterest"
                                                                 href="https://pinterest.com/#"><i
                                                        class="fa fa-pinterest"></i></a></li>
                                        <li class="instagram"><a target="_blank" title="Instagram"
                                                                 href="https://instagram.com/theplanetd"><i
                                                        class="fa fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="one withsmallpadding ppb_text" style="text-align:left;padding:0px 0 0px 0;margin-bottom:60px;">
            <div class="standard_wrapper">
                <div class="page_content_wrapper">
                    <div class="inner">
                        <div style="margin:auto;width:60%">
                            <div role="form" class="wpcf7" id="wpcf7-f2465-o1" lang="en-US" dir="ltr">
                                <div class="screen-reader-response"></div>
                                <form class="quform" action="js/plugins/quform/process.php" method="post"
                                      enctype="multipart/form-data" onclick="">

                                    <div class="quform-elements">
                                        <div class="quform-element">

                                            <br>
                                            <span class="wpcf7-form-control-wrap your-name">
                                                        <input id="name" type="text" wire:model="name" name="name" size="40"
                                                               class="input1" aria-required="true" aria-invalid="false"
                                                               placeholder="Họ và tên*">
                                                    </span>
                                            @error('name')
                                            <p style="color: #ff7e7e">{{ $message }}</p>
                                            @enderror

                                        </div>
                                        <div class="quform-element">

                                            <br>
                                            <span class="wpcf7-form-control-wrap your-email">
                                                        <input id="email" type="text" wire:model="email" name="email" size="40"
                                                               class="input1" aria-required="true" aria-invalid="false"
                                                               placeholder="Email*">
                                                    </span>
                                            @error('email')
                                            <p style="color: #ff7e7e">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="quform-element">

                                            <br>
                                            <span class="wpcf7-form-control-wrap ">
                                                        <input id="email" type="text" wire:model="phone" name="phone" size="40"
                                                               class="input1" aria-required="true" aria-invalid="false"
                                                               placeholder="Số điện thoại*">
                                                    </span>
                                            @error('phone')
                                            <p style="color: #ff7e7e">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="quform-element">

                                            <br>
                                            <span class="wpcf7-form-control-wrap your-email">
                                                        <input id="email" type="text" wire:model="subject" name="subject" size="40"
                                                               class="input1" aria-required="true" aria-invalid="false"
                                                               placeholder="Chủ đề*">
                                                    </span>
                                            @error('subject')
                                            <p style="color: #ff7e7e">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="quform-element">

                                            <br>
                                            <span class="wpcf7-form-control-wrap your-message">
                                                        <textarea id="message" name="message" wire:model="content" cols="40" rows="10"
                                                                  class="input1" aria-invalid="false"
                                                                  placeholder="Nội dung*"></textarea>
                                                    </span>

                                        </div>
                                        @error('content')
                                        <p style="color: #ff7e7e">{{ $message }}</p>
                                    @enderror
                                    <!-- Begin Submit button -->
                                        <div class="quform-submit">
                                            <div class="quform-submit-inner">
                                                <button type="button" class="submit-button" wire:click="sendContact"><span>Gửi</span>
                                                </button>
                                            </div>
                                            <div class="quform-loading-wrap"><span class="quform-loading"></span></div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
