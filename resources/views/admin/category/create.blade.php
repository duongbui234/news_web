@extends('admin.admin_master')

@section('admin')

<div class="content-wrapper">



    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add category</h4>
                <form class="forms-sample" method="POST" action="{{ route('category.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="category_en">Category English</label>
                        <input type="text" name="category_en" class="form-control" id="category_en">

                        @error('category_en')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="category_vn">Category Vietnamese</label>
                        <input type="text" name="category_vn" class="form-control" id="category_vn">

                        @error('category_vn')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection
