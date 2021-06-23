@extends('admin.admin_master')

@section('admin')

<div class="content-wrapper">



    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add district</h4>
                <form class="forms-sample" method="POST" action="{{ route('district.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="district_en">District English</label>
                        <input type="text" name="district_en" class="form-control" id="district_en">

                        @error('district_en')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="district_vn">District Vietnamese</label>
                        <input type="text" name="district_vn" class="form-control" id="district_vn">

                        @error('district_vn')
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
