@extends('main.home_master')

@section('main')

@php
$firstSectionBig = DB::table('posts')->where('first_section_thumbnail', 1)->orderBy('id', 'desc')->first();
$firstSection = DB::table('posts')->where('first_section', 1)->orderBy('id', 'desc')->limit(8)->get();

$livetv = DB::table('livetv')->first();
$websites = DB::table('websites')->get();
@endphp

<!-- 1st-news-section-start -->
<section class="news-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 col-sm-8">
                <div class="row">
                    <div class="col-md-1 col-sm-1 col-lg-1"></div>
                    <div class="col-md-10 col-sm-10">
                        <div class="lead-news">
                            <div class="service-img"><a href="#"><img src="{{ asset($firstSectionBig->image) }}"
                                        width="800px" alt="Notebook"></a></div>
                            <div class="content">
                                <h4 class="lead-heading-01">
                                    <a href="{{ URL::to('view/post/'.$firstSectionBig->id) }}" target="_blank">
                                        @if( session('lang') == 'vietnamese'
                                        )
                                        {{ $firstSectionBig->title_vn }}
                                        @else
                                        {{ $firstSectionBig->title_en }}
                                        @endif

                                    </a>
                                </h4>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    @foreach ($firstSection as $row)

                    <div class="col-md-3 col-sm-3">
                        <div class="top-news">
                            <a href="#"><img src="{{ $row->image }}" alt="Notebook"></a>
                            <h4 class="heading-02"><a href="#">
                                    @if (session('lang') == 'vietnamese')
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

                <!-- add-start -->
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="add"><img src="assets/img/top-ad.jpg" alt="" /></div>
                    </div>
                </div><!-- /.add-close -->

                <!-- news-start -->



                <div class="row">

                    @php
                    $firstCategory = DB::table('categories')->first();
                    $bigThumbnail = DB::table('posts')->where('category_id', $firstCategory->id)->where('big_thumbnail',
                    1)->orderBy('id', 'desc')->first();
                    $smallThumbnail = DB::table('posts')->where('category_id',
                    $firstCategory->id)->where('big_thumbnail',
                    NULL)->orderBy('id', 'desc')->limit(2)->get();
                    @endphp

                    <div class="col-md-6 col-sm-6">
                        <div class="bg-one">
                            <div class="cetagory-title">
                                <a href="#">
                                    @if (session('lang') == 'vietnamese')
                                    {{ Str::upper($firstCategory->category_vn) }}
                                    @else
                                    {{ Str::upper($firstCategory->category_en) }}
                                    @endif
                                    <span>
                                        @if (session('lang') == 'vietnamese')
                                        Thêm
                                        @else
                                        More
                                        @endif
                                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                    </span>
                                </a>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="top-news">
                                        <a href="#"><img src="{{ asset($bigThumbnail->image) }}" alt="Notebook"></a>
                                        <h4 class="heading-02">
                                            <a href="#">
                                                @if (session('lang') == 'vietnamese')
                                                {{ $bigThumbnail->title_vn }}
                                                @else
                                                {{ $bigThumbnail->title_en }}
                                                @endif</a>
                                        </h4>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6">
                                    @foreach ($smallThumbnail as $row)

                                    <div class="image-title">
                                        <a href="#"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
                                        <h4 class="heading-03">
                                            <a href="#">
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

                    @php
                    $secondCategory = DB::table('categories')->skip(1)->first();

                    $secondBigThumbnail = DB::table('posts')->where('category_id',
                    $firstCategory->id)->where('big_thumbnail',
                    1)->orderBy('id', 'desc')->first();

                    $secondSmallThumbnail = DB::table('posts')->where('category_id',
                    $secondCategory->id)->where('big_thumbnail',
                    NULL)->orderBy('id', 'desc')->limit(3)->get();

                    @endphp

                    <div class="col-md-6 col-sm-6">
                        <div class="bg-one">
                            <div class="cetagory-title"><a href="#">
                                    @if (session('lang') == 'vietnamese')
                                    {{ Str::upper($secondCategory->category_vn) }}
                                    @else
                                    {{ Str::upper($secondCategory->category_en) }}
                                    @endif
                                    <span>
                                        @if (session('lang') == 'vietnamese')
                                        Thêm
                                        @else
                                        More
                                        @endif<i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="top-news">
                                        <a href="#"><img src="{{ asset($secondBigThumbnail->image) }}"
                                                alt="Notebook"></a>
                                        <h4 class="heading-02"><a href="#">
                                                @if (session('lang') == 'vietnamese')
                                                {{ $secondBigThumbnail->title_vn }}
                                                @else
                                                {{ $secondBigThumbnail->title_en }}
                                                @endif</a> </h4>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    @foreach ($secondSmallThumbnail as $row)

                                    <div class="image-title">
                                        <a href="#"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
                                        <h4 class="heading-03"><a href="#">
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
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
                <!-- add-start -->
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="sidebar-add"><img src="assets/img/add_01.jpg" alt="" /></div>
                    </div>
                </div><!-- /.add-close -->

                <!-- youtube-live-start -->
                @if ($livetv->status == 1)
                <div class="cetagory-title-03">Live TV</div>
                <div class="photo">
                    <div class="embed-responsive embed-responsive-16by9 embed-responsive-item"
                        style="margin-bottom:5px;">

                        {!! $livetv->embed_code !!}

                    </div>
                </div>
                @endif

                <!-- /.youtube-live-close -->

                <!-- facebook-page-start -->
                <div class="cetagory-title-03">Facebook </div>
                <div class="fb-root">
                    facebook page here
                </div><!-- /.facebook-page-close -->

                <!-- add-start -->
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="sidebar-add">
                            <img src="assets/img/add_01.jpg" alt="" />
                        </div>
                    </div>
                </div><!-- /.add-close -->
            </div>
        </div>
    </div>
</section><!-- /.1st-news-section-close -->

<!-- 2nd-news-section-start -->
<section class="news-section">
    <div class="container-fluid">
        <div class="row">

            @php
            $thirdCategory = DB::table('categories')->skip(2)->first();

            $thirdBigThumbnail = DB::table('posts')->where('category_id',
            $firstCategory->id)->where('big_thumbnail',
            1)->orderBy('id', 'desc')->first();

            $thirdSmallThumbnail = DB::table('posts')->where('category_id',
            $thirdCategory->id)->where('big_thumbnail',
            NULL)->orderBy('id', 'desc')->limit(3)->get();

            @endphp

            <div class="col-md-6 col-sm-6">
                <div class="bg-one">
                    <div class="cetagory-title-02"><a href="#">
                            @if (session('lang') == 'vietnamese')
                            {{ Str::upper($thirdCategory->category_vn) }}
                            @else
                            {{ Str::upper($thirdCategory->category_en) }}
                            @endif
                            <span>
                                <span><i class="fa fa-plus" aria-hidden="true"></i>
                                    @if (session('lang') == 'vietnamese')
                                    Xem tất cả
                                    @else
                                    All news
                                    @endif
                                </span></a></div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="top-news">
                                <a href="#"><img src="{{ asset($thirdBigThumbnail->image) }}" alt="Notebook"></a>
                                <h4 class="heading-02"><a href="#">
                                        @if (session('lang') == 'vietnamese')
                                        {{ Str::upper($thirdBigThumbnail->title_vn) }}
                                        @else
                                        {{ Str::upper($thirdBigThumbnail->title_en) }}
                                        @endif
                                    </a>
                                </h4>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            @foreach ($thirdSmallThumbnail as $row)
                            <div class="image-title">
                                <a href="#"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">
                                        @if (session('lang') == 'vietnamese')
                                        {{ Str::upper($row->title_vn) }}
                                        @else
                                        {{ Str::upper($row->title_en) }}
                                        @endif
                                    </a>
                                </h4>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="bg-one">
                    <div class="cetagory-title-02"><a href="#">Politics <i class="fa fa-angle-right"
                                aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i>All News
                            </span></a></div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="top-news">
                                <a href="#"><img src="assets/img/news.jpg" alt="Notebook"></a>
                                <h4 class="heading-02"><a href="#">BNP introduced culture of impunity: Quader</a>
                                </h4>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="image-title">
                                <a href="#"><img src="assets/img/news.jpg" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">BNP introduced culture of impunity: Quader</a>
                                </h4>
                            </div>
                            <div class="image-title">
                                <a href="#"><img src="assets/img/news.jpg" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">BNP introduced culture of impunity: Quader</a>
                                </h4>
                            </div>
                            <div class="image-title">
                                <a href="#"><img src="assets/img/news.jpg" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">BNP introduced culture of impunity: Quader</a>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ******* -->
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="bg-one">
                    <div class="cetagory-title-02"><a href="#">Biz-Econ<i class="fa fa-angle-right"
                                aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> All News
                            </span></a></div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="top-news">
                                <a href="#"><img src="assets/img/news.jpg" alt="Notebook"></a>
                                <h4 class="heading-02"><a href="#">Israel sends treaty delegation to Bahrain with
                                        Trump aides</a> </h4>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="image-title">
                                <a href="#"><img src="assets/img/news.jpg" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">Israel sends treaty delegation to Bahrain with
                                        Trump aides</a> </h4>
                            </div>
                            <div class="image-title">
                                <a href="#"><img src="assets/img/news.jpg" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">Israel sends treaty delegation to Bahrain with
                                        Trump aides</a> </h4>
                            </div>
                            <div class="image-title">
                                <a href="#"><img src="assets/img/news.jpg" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">Israel sends treaty delegation to Bahrain with
                                        Trump aides</a> </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="bg-one">
                    <div class="cetagory-title-02"><a href="#">Education <i class="fa fa-angle-right"
                                aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> All News
                            </span></a></div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="top-news">
                                <a href="#"><img src="assets/img/news.jpg" alt="Notebook"></a>
                                <h4 class="heading-02"><a href="#">Students won't get form fill-up fee back</a>
                                </h4>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="image-title">
                                <a href="#"><img src="assets/img/news.jpg" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">Students won't get form fill-up fee back</a>
                                </h4>
                            </div>
                            <div class="image-title">
                                <a href="#"><img src="assets/img/news.jpg" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">Students won't get form fill-up fee back</a>
                                </h4>
                            </div>
                            <div class="image-title">
                                <a href="#"><img src="assets/img/news.jpg" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">Students won't get form fill-up fee back</a>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- add-start -->
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="add"><img src="assets/img/top-ad.jpg" alt="" /></div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="add"><img src="assets/img/top-ad.jpg" alt="" /></div>
            </div>
        </div><!-- /.add-close -->

    </div>
</section><!-- /.2nd-news-section-close -->

<!-- 3rd-news-section-start -->
<section class="news-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 col-sm-9">
                <div class="cetagory-title-02"><a href="#">Feature <i class="fa fa-angle-right" aria-hidden="true"></i>
                        all district news tab here <span><i class="fa fa-plus" aria-hidden="true"></i> All News
                        </span></a></div>

                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="top-news">
                            <a href="#"><img src="assets/img/news.jpg" alt="Notebook"></a>
                            <h4 class="heading-02"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="image-title">
                            <a href="#"><img src="assets/img/news.jpg" alt="Notebook"></a>
                            <h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
                        </div>
                        <div class="image-title">
                            <a href="#"><img src="assets/img/news.jpg" alt="Notebook"></a>
                            <h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
                        </div>
                        <div class="image-title">
                            <a href="#"><img src="assets/img/news.jpg" alt="Notebook"></a>
                            <h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="image-title">
                            <a href="#"><img src="assets/img/news.jpg" alt="Notebook"></a>
                            <h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
                        </div>
                        <div class="image-title">
                            <a href="#"><img src="assets/img/news.jpg" alt="Notebook"></a>
                            <h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
                        </div>
                        <div class="image-title">
                            <a href="#"><img src="assets/img/news.jpg" alt="Notebook"></a>
                            <h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
                        </div>
                    </div>
                </div>
                <!-- ******* -->
                <br />
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="cetagory-title-02"><a href="#">Sci-Tech<i class="fa fa-angle-right"
                                    aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> সব
                                    খবর </span></a></div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="bg-gray">
                            <div class="top-news">
                                <a href="#"><img src="assets/img/news.jpg" alt="Notebook"></a>
                                <h4 class="heading-02"><a href="#">Facebook Messenger gets shiny new logo </a> </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="news-title">
                            <a href="#">Facebook Messenger gets shiny new logo </a>
                        </div>
                        <div class="news-title">
                            <a href="#">Facebook Messenger gets shiny new logo </a>
                        </div>
                        <div class="news-title">
                            <a href="#">Facebook Messenger gets shiny new logo</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="news-title">
                            <a href="#">Facebook Messenger gets shiny new logo </a>
                        </div>
                        <div class="news-title">
                            <a href="#">Facebook Messenger gets shiny new logo </a>
                        </div>
                        <div class="news-title">
                            <a href="#">Facebook Messenger gets shiny new logo </a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="sidebar-add">
                            <img src="assets/img/top-ad.jpg" alt="" />
                        </div>
                    </div>
                </div><!-- /.add-close -->


            </div>
            <div class="col-md-3 col-sm-3">

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
                                        <a href="#">
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
                                        <a href="#">
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
                        {{-- <div role="tabpanel" class="tab-pane fade" id="tab23">
                            <div class="news-titletab">
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Both education and life must be saved</a>
                                    </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Both education and life must be saved</a>
                                    </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Both education and life must be saved</a>
                                    </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Both education and life must be saved</a>
                                    </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Both education and life must be saved</a>
                                    </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Both education and life must be saved</a>
                                    </h4>
                                </div>
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#">Both education and life must be saved</a>
                                    </h4>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <!-- Namaj Times -->
                <div class="cetagory-title-03">Old News </div>
                <form action="" method="post">
                    <div class="old-news-date">
                        <input type="text" name="from" placeholder="From Date" required="">
                        <input type="text" name="" placeholder="To Date">
                    </div>
                    <div class="old-date-button">
                        <input type="submit" value="search ">
                    </div>
                </form>
                <!-- news -->
                <br><br><br><br><br>
                <div class="cetagory-title-04"> Important Website</div>
                <div class="">
                    <div class="news-title-02">

                        @foreach ($websites as $row)

                        <h4 class="heading-03"><a href="{{ $row->link }}" target="_blank"><i class="fa fa-check"
                                    aria-hidden="true"></i>{{ $row->name }}</a> </h4>

                        @endforeach

                    </div>
                </div>

            </div>
        </div>
    </div>
</section><!-- /.3rd-news-section-close -->


<!-- gallery-section-start -->
<section class="news-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-sm-7">
                <div class="gallery_cetagory-title"> Photo Gallery </div>

                @php
                $bigPhoto = DB::table('photos')->where('type', 1)->first();
                $smallPhoto =DB::table('photos')->where('type', 0)->orderBy('id', 'desc')->get();
                @endphp

                <div class="row">
                    <div class="col-md-8 col-sm-8">
                        <div class="photo_screen">
                            <div class="myPhotos" style="width:100%">
                                <img src="{{ asset($bigPhoto->photo) }}" alt="Avatar">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="photo_list_bg">

                            @foreach ($smallPhoto as $row)

                            <div class="photo_img photo_border active">
                                <img src="{{ asset($row->photo) }}" alt="photo" onclick="currentDiv(1)">
                                <div class="heading-03">
                                    {{ $row->title }}
                                </div>
                            </div>

                            @endforeach

                        </div>
                    </div>
                </div>

                <!--=======================================
                    Video Gallery clickable jquary  start
                ========================================-->

                <script>
                    var slideIndex = 1;
                                    showDivs(slideIndex);

                                    function plusDivs(n) {
                                      showDivs(slideIndex += n);
                                    }

                                    function currentDiv(n) {
                                      showDivs(slideIndex = n);
                                    }

                                    function showDivs(n) {
                                      var i;
                                      var x = document.getElementsByClassName("myPhotos");
                                      var dots = document.getElementsByClassName("demo");
                                      if (n > x.length) {slideIndex = 1}
                                      if (n < 1) {slideIndex = x.length}
                                      for (i = 0; i < x.length; i++) {
                                         x[i].style.display = "none";
                                      }
                                      for (i = 0; i < dots.length; i++) {
                                         dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                                      }
                                      x[slideIndex-1].style.display = "block";
                                      dots[slideIndex-1].className += " w3-opacity-off";
                                    }
                </script>

                <!--=======================================
                    Video Gallery clickable  jquary  close
                =========================================-->

            </div>
            <div class="col-md-4 col-sm-5">
                <div class="gallery_cetagory-title"> Video Gallery </div>

                @php
                $bigVideo = DB::table('videos')->where('type', 1)->first();
                $smallVideo = DB::table('videos')->where('type', 0)->orderBy('id', 'desc')->limit(4)->get();
                @endphp

                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="video_screen">
                            <div class="myVideos" style="width:100%">
                                <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
                                    <iframe width="853" height="480"
                                        src="https://www.youtube.com/embed/{{ $bigVideo->embed_code }}" frameborder="0"
                                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">



                        <div class="gallery_sec owl-carousel">

                            @foreach ($smallVideo as $row)


                            <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
                                <iframe width="853" height="480"
                                    src="https://www.youtube.com/embed/{{ $row->embed_code }}" frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </div>

                            @endforeach



                        </div>
                    </div>
                </div>


                <script>
                    var slideIndex = 1;
                        showDivss(slideIndex);

                        function plusDivs(n) {
                          showDivss(slideIndex += n);
                        }

                        function currentDivs(n) {
                          showDivss(slideIndex = n);
                        }

                        function showDivss(n) {
                          var i;
                          var x = document.getElementsByClassName("myVideos");
                          var dots = document.getElementsByClassName("demo");
                          if (n > x.length) {slideIndex = 1}
                          if (n < 1) {slideIndex = x.length}
                          for (i = 0; i < x.length; i++) {
                             x[i].style.display = "none";
                          }
                          for (i = 0; i < dots.length; i++) {
                             dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                          }
                          x[slideIndex-1].style.display = "block";
                          dots[slideIndex-1].className += " w3-opacity-off";
                        }
                </script>

            </div>
        </div>
    </div>
</section><!-- /.gallery-section-close -->

@endsection
