@extends('admin.admin_master')

@section('admin')

<div class="content-wrapper">



    <div class="col-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Website</h4>
                <form class="forms-sample" method="POST" action="{{ route('website.store') }}">
                    @csrf

                    <div class="form-group">
                        <label for="website_name">website_name</label>
                        <input type="text" class="form-control" id="website_name" name="website_name">
                    </div>

                    <div class="form-group">
                        <label for="website_link">website_link</label>
                        <input type="text" class="form-control" id="website_link" name="website_link">
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
