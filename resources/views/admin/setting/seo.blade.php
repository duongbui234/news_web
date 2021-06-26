@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="content-wrapper">



    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Update Seo</h4>
                <form class="forms-sample" method="POST" action="{{ route('seo.update', $seo->id) }}">
                    @csrf

                    <div class="form-group">
                        <label for="meta_author">meta_author</label>
                        <input type="text" class="form-control" id="meta_author" name="meta_author"
                            value="{{ $seo->meta_author }}">
                    </div>

                    <div class="form-group">
                        <label for="meta_title">meta_title</label>
                        <input type="text" class="form-control" id="meta_title" name="meta_title"
                            value="{{ $seo->meta_title }}">
                    </div>

                    <div class="form-group">
                        <label for="meta_keyword">meta_keyword</label>
                        <input type="text" class="form-control" id="meta_keyword" name="meta_keyword"
                            value="{{ $seo->meta_keyword }}">
                    </div>

                    <div class="form-group">
                        <label for="google_verification">google_verification</label>
                        <input type="text" class="form-control" id="google_verification" name="google_verification"
                            value="{{ $seo->google_verification }}">
                    </div>


                    <div class="form-group">
                        <label for="meta_description">meta_description</label>
                        <textarea class="form-control" id="summernote3"
                            name="meta_description">{{ $seo->meta_description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="google_analytics">google_analytics</label>
                        <textarea class="form-control" id="summernote4"
                            name="google_analytics">{{ $seo->google_analytics }}</textarea>
                    </div>



                    <div class="form-group">
                        <label for="alexa_analytics">alexa_analytics</label>
                        <textarea class="form-control" id="summernote5"
                            name="alexa_analytics">{{ $seo->alexa_analytics }}</textarea>
                    </div>



                    <div class="row" style="justify-content: center">
                        <button type="submit" class="btn btn-primary mr-2" style="padding: 10px 15px">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>


@endsection
