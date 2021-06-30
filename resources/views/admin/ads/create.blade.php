@extends('admin.admin_master')

@section('admin')

<div class="content-wrapper">


    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add advertisement</h4>
                <form class="forms-sample" method="POST" action="{{ route('ads.store') }}"
                    enctype="multipart/form-data">
                    @csrf


                    <div class="form-group">
                        <label for="link">Photo link</label>
                        <input type="text" class="form-control" id="link" name="link">
                    </div>


                    <div class="form-group">
                        <label for="exampleFormControlFile1">
                            <h4>Image Upload</h4>
                        </label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="ads">
                    </div>

                    <div class="form-group">
                        <label for="type">
                            <h4>Type</h4>
                        </label>
                        <select name="type" id="type" class="form-control">
                            <option value="1">Horizontal</option>
                            <option value="0">Vertical</option>
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
