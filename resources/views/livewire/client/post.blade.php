@section('title')
    {{ $post->title }}
@endsection

<div>

    <div id="page_caption" class="hasbg parallax  withtopbar  " style="background-image:url('{{ $post->thumbnail }}'); background-size: cover">

        <div class="page_title_wrapper">
            <div class="page_title_inner">
                <div class="page_title_content">
                    <h1 class="withtopbar">{{ $post->title }}</h1>
                    <div class="page_tagline"></div>
                </div>
            </div>
        </div>

    </div>

    <!-- Begin content -->
    <div id="page_content_wrapper" class="hasbg withtopbar ">
        <div class="inner">

            <!-- Begin main content -->
            <div class="inner_wrapper">

                <div class="sidebar_content">
                    <div><b>{{ $post->user->name }}</b></div>
                    <div>
                        {{ \Carbon\Carbon::make($post->created_at)->format('d/m/Y') }}
                    </div>
                    {!! $post->content !!}

                </div>


                @include('client.includes.sidebar')

            </div>
            <!-- End main content -->
        </div>
    </div>
</div>
