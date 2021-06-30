@extends('main.home_master')

@section('main')

<section class="single-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i></a></li>
                    <li>
                        <a href="#">
                            @if( session('lang') == 'vietnamese'
                            )
                            {{ Str::upper($post->category_vn) }}
                            @else
                            {{ Str::upper($post->category_en) }}
                            @endif
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            @if( session('lang') == 'vietnamese'
                            )
                            {{ Str::upper($post->subcategory_vn) }}
                            @else
                            {{ Str::upper($post->subcategory_en) }}
                            @endif
                        </a>
                    </li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <header class="headline-header margin-bottom-10">
                    <h1 class="headline">
                        @if( session('lang') == 'vietnamese'
                        )
                        {{ $post->title_vn }}
                        @else
                        {{ $post->title_en }}
                        @endif
                    </h1>
                </header>


                <div class="article-info margin-bottom-20">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <ul class="list-inline">


                                <li>{{ $post->name }}</li>
                                <li><i class="fa fa-clock-o"></i> {{ $post->post_date }}</li>
                            </ul>

                        </div>
                        <div class="col-md-6 col-sm-6" style="display: flex; justify-content: flex-end;">
                            <div class="sharethis-inline-share-buttons"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ******** -->
        <div class="row">
            <div class="col-md-8 col-sm-8">
                <div class="single-news">
                    <img src="{{ asset($post->image) }}" alt="" />
                    <h4 class="caption">
                        @if( session('lang') == 'vietnamese'
                        )
                        {{ $post->title_vn }}
                        @else
                        {{ $post->title_en }}
                        @endif
                    </h4>

                    @if( session('lang') == 'vietnamese'
                    )
                    {!! $post->details_vn !!}
                    @else
                    {!! $post->details_en !!}
                    @endif

                </div>
                <!-- ********* -->
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="heading">
                            @if( session('lang') == 'vietnamese'
                            )
                            Tin tức liên quan
                            @else
                            Related News
                            @endif
                        </h2>
                    </div>

                    @php
                    $thirdOne = DB::table('posts')->where('category_id', $post->category_id)->limit(3)->orderBy('id',
                    'desc')->get();
                    $thirdTwo = DB::table('posts')->where('category_id',
                    $post->category_id)->skip(3)->limit(3)->orderBy('id', 'desc')->get();
                    @endphp

                    @foreach ($thirdOne as $row)

                    <div class="col-md-4 col-sm-4">
                        <div class="top-news sng-border-btm">
                            <a href="#"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
                            <h4 class="heading-02">
                                <a href="{{ URL::to('view/post/'.$row->id) }}">
                                    @if( session('lang') == 'vietnamese'
                                    )
                                    {{ $row->title_vn }}
                                    @else
                                    {{ $row->title_en }}
                                    @endif
                                </a>
                            </h4>
                        </div>
                    </div>

                    @endforeach
                </div>


                <div class="row">

                    @foreach ($thirdTwo as $row)

                    <div class="col-md-4 col-sm-4">
                        <div class="top-news sng-border-btm">
                            <a href="#"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
                            <h4 class="heading-02">
                                <a href="{{ URL::to('view/post/'.$row->id) }}">
                                    @if( session('lang') == 'vietnamese'
                                    )
                                    {{ $row->title_vn }}
                                    @else
                                    {{ $row->title_en }}
                                    @endif
                                </a>
                            </h4>
                        </div>
                    </div>

                    @endforeach

                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <!-- add-start -->
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="sidebar-add"><img src="{{ asset('frontend/assets/img/add_01.jpg') }}" alt="" />
                        </div>
                    </div>
                </div><!-- /.add-close -->
                @php
                $lastest = DB::table('posts')->orderBy('id', 'desc')->limit(8)->get();
                $earliest = DB::table('posts')->orderBy('id', 'asc')->limit(8)->get();
                @endphp

                <div class="tab-header">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-justified" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#tab21" aria-controls="tab21" role="tab" data-toggle="tab" aria-expanded="false">
                                @if (session('lang') == 'vietnamese')
                                Sớm nhất
                                @else
                                Earliest
                                @endif
                            </a></li>
                        <li role="presentation">
                            <a href="#tab22" aria-controls="tab22" role="tab" data-toggle="tab" aria-expanded="true">
                                @if(session('lang') == 'vietnamese')
                                Muộn nhất
                                @else
                                Lastest
                                @endif
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content ">
                        <div role="tabpanel" class="tab-pane in active" id="tab21">
                            <div class="news-titletab">

                                @foreach ($earliest as $row)
                                <div class="news-title-02">
                                    <h4 class="heading-03">
                                        <a href="{{ URL::to('view/post/'.$row->id) }}">
                                            @if (session('lang') == 'vietnamese')
                                            {{ $row->title_vn }}
                                            @else
                                            {{ $row->title_en }}
                                            @endif
                                        </a>
                                    </h4>
                                </div>
                                @endforeach


                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab22">
                            <div class="news-titletab">
                                @foreach ($lastest as $row)
                                <div class="news-title-02">
                                    <h4 class="heading-03">
                                        <a href="{{ URL::to('view/post/'.$row->id) }}">
                                            @if (session('lang') == 'vietnamese')
                                            {{ $row->title_vn }}
                                            @else
                                            {{ $row->title_en }}
                                            @endif
                                        </a>
                                    </h4>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- add-start -->
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="sidebar-add"><img src="{{ asset('frontend/assets/img/add_01.jpg') }}" alt="" />
                        </div>
                    </div>
                </div><!-- /.add-close -->
            </div>
        </div>
        <div class="row">
            <div id="fb-root"></div>
            <script async defer crossorigin="anonymous"
                src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0" nonce="zFmc6jLr"></script>
            <div class="fb-comments" data-href="{{ Request::url() }}" data-width="" data-numposts="5">
            </div>
        </div>
    </div>
</section>




@endsection
