@extends('admin.admin_master')

@section('admin')

<div class="content-wrapper">



    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add SubDistrict</h4>
                <form class="forms-sample" method="POST" action="{{ route('subdistrict.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="subdistrict_en">Category English</label>
                        <input type="text" name="subdistrict_en" class="form-control" id="subdistrict_en">

                        @error('subdistrict_en')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="subdistrict_vn">Category Vietnamese</label>
                        <input type="text" name="subdistrict_vn" class="form-control" id="subdistrict_vn">

                        @error('subdistrict_vn')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect2">District ID</label>
                        <select class="form-control" name="district_id" id="exampleFormControlSelect2">
                            <option>Select district</option>

                            @foreach ($districts as $row)
                            <option value="{{ $row->id }}">{{ $row->district_en }} | {{ $row->district_vn }}</option>
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
