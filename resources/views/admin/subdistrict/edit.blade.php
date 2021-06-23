@extends('admin.admin_master')

@section('admin')

<div class="content-wrapper">

    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit SubDistrict</h4>
                <form class="forms-sample" method="POST" action="{{ route('subdistrict.update', $subdistrict->id) }}">
                    @csrf
                    <div class="form-group">
                        <label for="subdistrict_en">SubDistrict English</label>
                        <input type="text" name="subdistrict_en" class="form-control" id="subdistrict_en"
                            value="{{ $subdistrict->subdistrict_en }}">
                        <input type="hidden" name="subdistrict_en_old" value="{{ $subdistrict->subdistrict_en }}">


                    </div>
                    <div class="form-group">
                        <label for="subdistrict_vn">SubDistrict Vietnamese</label>
                        <input type="text" name="subdistrict_vn" class="form-control" id="subdistrict_vn"
                            value="{{ $subdistrict->subdistrict_vn }}">
                        <input type="hidden" name="subdistrictold" value="{{ $subdistrict->subdistrict_vn }}">

                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect2">District ID</label>
                        <select class="form-control" name="district_id" id="exampleFormControlSelect2">
                            <option>Select district</option>

                            @foreach ($districts as $row)
                            <option value="{{ $row->id }}"
                                <?php if($row->id == $subdistrict->district_id) echo 'selected' ?>>
                                {{ $row->district_en }} | {{ $row->district_vn }}
                            </option>
                            @endforeach

                        </select>
                        <input type="hidden" name="district_id_old" value="{{ $subdistrict->district_id }}">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection
