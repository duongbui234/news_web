@extends('admin.admin_master')

@section('admin')

<div class="content-wrapper">

    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit website</h4>
                <form class="forms-sample" method="POST" action="{{ route('website.update', $website->id) }}">
                    @csrf
                    <div class="form-group">
                        <label for="website_name">Website name</label>
                        <input type="text" name="website_name" class="form-control" id="website_name"
                            value="{{ $website->name }}">

                    </div>
                    <div class="form-group">
                        <label for="website_link">Website link</label>
                        <input type="text" name="website_link" class="form-control" id="website_link"
                            value="{{ $website->link }}">

                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection
