@extends('admin.admin_master')

@section('admin')

<div class="content-wrapper">


    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit category</h4>
                <form class="forms-sample" method="POST" action="{{ route('category.update', $category->id) }}">
                    @csrf
                    <div class="form-group">
                        <label for="category_en_update">Category English</label>
                        <input type="text" name="category_en" class="form-control" id="category_en_update"
                            value="{{ $category->category_en }}">
                        <input type="hidden" name="category_en_old" class="form-control"
                            value="{{ $category->category_en }}">

                    </div>
                    <div class="form-group">
                        <label for="category_vn_update">Category Vietnamese</label>
                        <input type="text" name="category_vn" class="form-control" id="category_vn_update"
                            value="{{ $category->category_vn }}">
                        <input type="hidden" name="category_vn_old" class="form-control"
                            value="{{ $category->category_vn }}">

                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection
