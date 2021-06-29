@php
$category = DB::table('categories')->orderBy('id', 'asc')->get();
$social = DB::table('socials')->first();
$posts = DB::table('posts')->where('headline', 1)->limit(3)->get();
$notice = DB::table('notices')->first();



@endphp


<!-- header-start -->
<section class="hdr_section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-6 col-md-2 col-sm-4">
                <div class="header_logo">
                    <a href=""><img src="{{ asset('frontend/assets/img/demo_logo.png') }}"></a>
                </div>
            </div>
            <div class="col-xs-6 col-md-8 col-sm-8">
                <div id="menu-area" class="menu_area">
                    <div class="menu_bottom">
                        <nav role="navigation" class="navbar navbar-default mainmenu">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" data-target="#navbarCollapse" data-toggle="collapse"
                                    class="navbar-toggle">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <!-- Collection of nav links and other content for toggling -->
                            <div id="navbarCollapse" class="collapse navbar-collapse">
                                <ul class="nav navbar-nav">
                                    <li><a href="#">HOME</a></li>


                                    @foreach ($category as $row)

                                    <li class="dropdown uc">
                                        <a href="#" class="dropdown-toggle uc" data-toggle="dropdown">
                                            @if (session('lang') == 'vietnamese')
                                            {{ $row->category_vn }}
                                            @else
                                            {{ $row->category_en }}
                                            @endif
                                            <b class="caret"></b>
                                        </a>
                                        <ul class="dropdown-menu">

                                            @php
                                            $subcategory = DB::table('subcategories')->where('category_id',
                                            $row->id)->get()
                                            @endphp

                                            @foreach ($subcategory as $row)

                                            <li>
                                                <a href="#">
                                                    @if (session('lang') == 'vietnamese')
                                                    {{ $row->subcategory_vn }}
                                                    @else
                                                    {{ $row->subcategory_en }}
                                                    @endif
                                                </a>
                                            </li>

                                            @endforeach

                                        </ul>
                                    </li>

                                    @endforeach


                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-2 col-sm-12">
                <div class="header-icon">
                    <ul>
                        <!-- version-start -->
                        @if (session('lang') == 'vietnamese')
                        <li class="version"><a href="{{ route('lang.english') }}"><B>English</B></a></li>
                        &nbsp;&nbsp;&nbsp;
                        @else
                        <li class="version"><a href="{{ route('lang.vietnamese') }}"><B>Vietnamese</B></a></li>
                        &nbsp;&nbsp;&nbsp;
                        @endif
                        <!-- login-start -->

                        <!-- search-start -->
                        <li>
                            <div class="search-large-divice">
                                <div class="search-icon-holder"> <a href="#" class="search-icon" data-toggle="modal"
                                        data-target=".bd-example-modal-lg"><i class="fa fa-search"
                                            aria-hidden="true"></i></a>
                                    <div class="modal fade bd-example-modal-lg" action="" tabindex="-1" role="dialog"
                                        aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"> <i class="fa fa-times-circle"
                                                            aria-hidden="true"></i> </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="custom-search-input">
                                                                <form>
                                                                    <div class="input-group">
                                                                        <input class="search form-control input-lg"
                                                                            placeholder="search" value="Type Here.."
                                                                            type="text">
                                                                        <span class="input-group-btn">
                                                                            <button class="btn btn-lg" type="button"> <i
                                                                                    class="fa fa-search"
                                                                                    aria-hidden="true"></i>
                                                                            </button>
                                                                        </span> </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- social-start -->
                        <li>
                            <div class="dropdown">
                                <button class="dropbtn-02"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button>
                                <div class="dropdown-content">
                                    <a href="{{ $social->facebook }}" target="_blank"><i class="fa fa-facebook"
                                            aria-hidden="true"></i>
                                        Facebook</a>
                                    <a href="{{ $social->twitter }}" target="_blank"><i class="fa fa-twitter"
                                            aria-hidden="true"></i>
                                        Twitter</a>
                                    <a href="{{ $social->youtube }}" target="_blank"><i class="fa fa-youtube-play"
                                            aria-hidden="true"></i>
                                        Youtube</a>
                                    <a href="{{ $social->instagram }}" target="_blank"><i class="fa fa-instagram"
                                            aria-hidden="true"></i>
                                        Instagram</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section><!-- /.header-close -->

<!-- top-add-start -->
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                <div class="top-add"><img src="{{ asset('frontend/assets/img/top-ad.jpg') }}" alt="" /></div>
            </div>
        </div>
    </div>
</section> <!-- /.top-add-close -->

<!-- date-start -->
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="date">
                    <ul>
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i> Dhaka </li>
                        <li><i class="fa fa-calendar" aria-hidden="true"></i> Monday, 19th October 2020 </li>
                        <li><i class="fa fa-clock-o" aria-hidden="true"></i> Update 5 min ago </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</section><!-- /.date-close -->

<!-- notice-start -->

<section>
    <div class="container-fluid">
        <div class="row scroll">
            <div class="col-md-2 col-sm-3 scroll_01 ">
                @if (session('lang') == 'vietnamese')
                Tin nóng hổi :
                @else
                Breaking News :
                @endif

            </div>
            <div class="col-md-10 col-sm-9 scroll_02">
                <marquee>
                    @foreach ($posts as $row)
                    @if (session('lang') == 'vietnamese')
                    | {{ $row->title_vn }}
                    @else
                    | {{ $row->title_en }}
                    @endif
                    @endforeach
                </marquee>
            </div>
        </div>
    </div>
</section>

@if ($notice->status == 1)

<section>
    <div class="container-fluid">
        <div class="row scroll">
            <div class="col-md-2 col-sm-3 scroll_01 ">
                @if (session('lang') == 'vietnamese')
                Thông báo :
                @else
                Notice :
                @endif

            </div>
            <div class="col-md-10 col-sm-9 scroll_02">
                <marquee>
                    {{ $notice->notice }}
                </marquee>
            </div>
        </div>
    </div>
</section>

@endif
