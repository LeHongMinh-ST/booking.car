@section('title')
    Bài viết
@endsection

<div>

    <div id="page_caption" class="hasbg parallax  withtopbar  blog_wrapper"
         style="background-image:url({{ asset('client/upload/IMG_3496bfree.jpg') }});">

        <div class="page_title_wrapper">
            <div class="page_title_inner">
                <div class="page_title_content">
                    <h1 class="withtopbar">Bài viết và Mẹo</h1>
                    <div class="page_tagline">
                        This is sample of page tagline and you can set it up using page option
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Begin content -->
    <div id="page_content_wrapper" class="hasbg withtopbar blog_wrapper">
        <div class="inner">

            <!-- Begin main content -->
            <div class="inner_wrapper">

                <div class="page_content_wrapper"></div>


                <div id="blog_grid_wrapper" class="sidebar_content">

                @foreach($posts as $post)
                    <!-- Begin each blog post -->
                        <div id="post-18"
                             class="post-18 post type-post status-publish format-standard has-post-thumbnail hentry category-uncategorized tag-accident tag-car-rental tag-tips">

                            <div class="post_wrapper grid_layout">

                                <div class="post_img small static">
                                    <a href="{{ route('post', $post->slug ?? "") }}">
                                        <img src="{{ $post->thumbnail }}"
                                             alt="{{ $post->title }}" class=""
                                             style="width:960px!important; height:250px!important; object-fit: cover"/>
                                    </a>
                                </div>

                                <div class="post_header_wrapper">
                                    <div class="post_header grid">
                                        <div class="post_detail single_post">
                                            <span class="post_info_date">
                                                <a href="{{ route('post', $post->slug ?? "") }}"
                                                   title="{{ $post->title }}">{{ \Carbon\Carbon::make($post->created_at)->format('d/m/Y') }}</a>
                                            </span>
                                        </div>
                                        <h6><a href="{{ route('post', $post->slug ?? "") }}" title="{{ $post->title }}">{{ $post->title }}</a></h6>
                                    </div>
                                    <p style="width: 100%; overflow: hidden; text-overflow: ellipsis;    line-height: 25px;    -webkit-line-clamp: 3;    height: 75px;    display: -webkit-box;    -webkit-box-orient: vertical;">
                                        {{ $post->description }}
                                    </p>

                                    <div class="post_button_wrapper">
                                        <a class="readmore" href="{{ route('post', $post->slug ?? "") }}">Đọc thêm<span class="ti-angle-right"></span></a>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- End each blog post -->
                        @if($loop->index % 2 != 0)
                            <br class="clear"/>

                        @endif
                    @endforeach


                    <div class="pagination">  {!! $posts->links('vendor.pagination.theme') !!}</div>


                </div>

                @include('client.includes.sidebar')

            </div>
            <!-- End main content -->

        </div>
    </div>
</div>
