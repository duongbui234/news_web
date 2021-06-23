@extends('admin.admin_master')

@section('admin')

<div class="content-wrapper">

    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit district</h4>
                <form class="forms-sample" method="POST" action="{{ route('district.update', $district->id) }}">
                    @csrf
                    <div class="form-group">
                        <label for="district_en_update">District English</label>
                        <input type="text" name="district_en" class="form-control" id="district_en_update"
                            value="{{ $district->district_en }}">
                        <input type="hidden" name="district_en_old" class="form-control"
                            value="{{ $district->district_en }}">

                    </div>
                    <div class="form-group">
                        <label for="district_vn_update">District Vietnamese</label>
                        <input type="text" name="district_vn" class="form-control" id="district_vn_update"
                            value="{{ $district->district_vn }}">
                        <input type="hidden" name="district_vn_old" class="form-control"
                            value="{{ $district->district_vn }}">

                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection
