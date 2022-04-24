<div class="sidebar_wrapper">
    <div class="sidebar">

        <div class="content">

            <ul class="sidebar_widget">
                <li id="text-4" class="widget widget_text">
                    <h2 class="widgettitle">Liên hệ</h2>
                    <div class="textwidget"><span class="ti-mobile" style="margin-right:10px;"></span>1-567-124-44227
                        <br/>
                        <span class="ti-alarm-clock" style="margin-right:10px;"></span>Thứ hai - Thứ sáu 8:00 -
                        18:00
                    </div>
                </li>
                <li id="grandcarrental_cat_posts-2" class="widget grandcarrental_Cat_Posts">
                    <h2 class="widgettitle"><span>Bài viết mới</span></h2>
                    <ul class="posts blog withthumb ">
                        @foreach($posts as $post)
                        <li>
                            <div class="post_circle_thumb">
                                <a href="{{ route('post', $post->slug ?? "") }}">
                                    <img class="alignleft frame post_thumb"
                                         style="width: 70px; height: 70px; object-fit: cover"
                                                 src="{{ $post->thumbnail }}"
                                                 alt="{{ $post->title }}"/></a>
                            </div>
                            <a href="{{ route('post', $post->slug) }}">{{ $post->title }}</a>
                            <div class="post_attribute">{{ \Carbon\Carbon::make($post->created_at)->format('d/m/Y') }}</div>
                        </li>
                        @endforeach
                    </ul>
                </li>
                <li id="grandcarrental_social_profiles_posts-3"
                    class="widget grandcarrental_Social_Profiles_Posts">
                    <h2 class="widgettitle">Kết nối với chúng tôi</h2>
                    <div class="social_wrapper shortcode light small">
                        <ul>
                            <li class="facebook"><a target="_blank" title="Facebook" href="#"><i
                                            class="fa fa-facebook"></i></a></li>
                            <li class="twitter"><a target="_blank" title="Twitter"
                                                   href="https://twitter.com/#"><i
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
                </li>
            </ul>

        </div>

    </div>
</div>
