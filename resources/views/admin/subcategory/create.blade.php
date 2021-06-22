@extends('admin.admin_master')

@section('admin')

<div class="content-wrapper">



    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add SubCategory</h4>
                <form class="forms-sample" method="POST" action="{{ route('subcategory.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="subcategory_en">Category English</label>
                        <input type="text" name="subcategory_en" class="form-control" id="subcategory_en">

                        @error('subcategory_en')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="subcategory_vn">Category Vietnamese</label>
                        <input type="text" name="subcategory_vn" class="form-control" id="subcategory_vn">

                        @error('subcategory_vn')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Category ID</label>
                        <select class="form-control" name="category_id" id="exampleFormControlSelect2">
                            <option>Select category</option>

                            @foreach ($categories as $row)
                            <option value="{{ $row->id }}">{{ $row->category_en }} | {{ $row->category_vn }}</option>
                            @endforeach

                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection
