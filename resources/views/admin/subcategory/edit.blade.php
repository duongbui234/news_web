@extends('admin.admin_master')

@section('admin')

<div class="content-wrapper">


    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit SubCategory</h4>
                <form class="forms-sample" method="POST" action="{{ route('subcategory.update', $subcategory->id) }}">
                    @csrf
                    <div class="form-group">
                        <label for="subcategory_en">SubCategory English</label>
                        <input type="text" name="subcategory_en" class="form-control" id="subcategory_en"
                            value="{{ $subcategory->subcategory_en }}">
                        <input type="hidden" name="subcategory_en_old" value="{{ $subcategory->subcategory_en }}">


                    </div>
                    <div class="form-group">
                        <label for="subcategory_vn">SubCategory Vietnamese</label>
                        <input type="text" name="subcategory_vn" class="form-control" id="subcategory_vn"
                            value="{{ $subcategory->subcategory_vn }}">
                        <input type="hidden" name="subcategory_vn_old" value="{{ $subcategory->subcategory_vn }}">

                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Category ID</label>
                        <select class="form-control" name="category_id" id="exampleFormControlSelect2">
                            <option>Select category</option>

                            @foreach ($categories as $row)
                            <option value="{{ $row->id }}"
                                <?php if($row->id == $subcategory->category_id) echo 'selected' ?>>
                                {{ $row->category_en }} | {{ $row->category_vn }}
                            </option>
                            @endforeach

                        </select>
                        <input type="hidden" name="category_id_old" value="{{ $subcategory->category_id }}">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection
