@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="content-wrapper">


    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Add video</h3>
                <form class="forms-sample" method="POST" action="{{ route('video.store') }}"
                    enctype="multipart/form-data">
                    @csrf


                    <div class="form-group">
                        <label for="title">
                            <h4>Video title</h4>
                        </label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>


                    <div class="form-group">
                        <label for="embed_code">
                            <h4>Video Upload</h4>
                        </label>
                        <input type="text" class="form-control" id="embed_code" name="embed_code">
                    </div>

                    <div class="form-group">
                        <label for="type">
                            <h4>Video type</h4>
                        </label>
                        <select name="type" id="type" class="form-control">
                            <option value="1">Big video</option>
                            <option value="0">Small video</option>
                        </select>
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
