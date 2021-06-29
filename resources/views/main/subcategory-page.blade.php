@extends('main.home_master')

@section('main')

<section class="single_page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="single_info">
                    <span>
                        <a href="/"><i class="fa fa-home" aria-hidden="true"></i> /
                        </a>
                        @if (session('lang') == 'vietnamese')
                        {{ Str::upper($subcategoryName->subcategory_vn) }}
                        @else
                        {{ Str::upper($subcategoryName->subcategory_en) }}
                        @endif
                    </span>
                </div>
            </div>
            <div class="col-md-9 col-sm-8">

                @foreach ($posts as $row)

                <div class="archive_post_sec_again">
                    <div class="row">
                        <div class="col-md-4 col-sm-5">
                            <div class="archive_img_again">
                                <a href="#"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-7">
                            <div class="archive_padding_again">
                                <div class="archive_heading_01">
                                    <a href="{{ URL::to('view/post/'.$row->id) }}">
                                        @if (session('lang') == 'vietnamese')
                                        {{ $row->title_vn }}
                                        @else
                                        {{ $row->title_en }}
                                        @endif
                                    </a>
                                </div>
                                <div class="archive_dtails">
                                    @if (session('lang') == 'vietnamese')
                                    {!! Str::limit($row->details_vn, 150, '...') !!}
                                    @else
                                    {!! Str::limit($row->details_en, 150, '...') !!}
                                    @endif
                                </div>
                                <div class="dtails_btn"><a href="{{ URL::to('view/post/'.$row->id) }}">
                                        @if (session('lang') == 'vietnamese')
                                        Đọc thêm ...
                                        @else
                                        Read more ...
                                        @endif
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach

                {{ $posts->links() }}

            </div>
            <div class="col-md-3 col-sm-4">
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
    </div>
</section>


@endsection
