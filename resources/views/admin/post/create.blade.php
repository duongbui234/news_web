@extends('admin.admin_master')

@section('admin')

<div class="content-wrapper">



    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add post</h4>
                <form class="forms-sample">

                    {{-- Title --}}
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="title_en">Title English</label>
                            <input type="text" class="form-control" id="title_en" name="title_en">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="title_vn">Title Vietnamese</label>
                            <input type="text" class="form-control" id="title_vn" name="title_vn">
                        </div>
                    </div>
                    {{-- End title --}}

                    {{-- Category --}}
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="title_en">Category</label>
                            <select class="form-control" id="exampleSelectGender" name="category_id">
                                <option>--Select Category--</option>
                                @foreach ($categories as $row)
                                <option value="{{ $row->id }}">{{ $row->category_en }} | {{ $row->category_vn }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="title_vn">Sub Category</label>
                            <select class="form-control" id="exampleSelectGender" name="subcategory_id">
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                    </div>
                    {{--End Category --}}


                    {{-- District --}}
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="title_en">District</label>
                            <select class="form-control" id="exampleSelectGender" name="district_id">
                                <option>--Select District--</option>
                                @foreach ($districts as $row)
                                <option value="{{ $row->id }}">{{ $row->district_en }} | {{ $row->district_vn }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="title_vn">Sub District</label>
                            <select class="form-control" id="exampleSelectGender" name="subdistrict_id">
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                    </div>
                    {{--End District --}}

                    {{-- Image --}}
                    <div class="row" style="padding: 12px">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">
                                <h4>Image Upload</h4>
                            </label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                    </div>
                    {{--End Image --}}

                    {{-- Tag --}}
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="tag_en">Tag English</label>
                            <input type="text" class="form-control" id="tag_en" name="tag_en">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="title_vn">Tag Vietnamese</label>
                            <input type="text" class="form-control" id="title_vn" name="tag_vn">
                        </div>
                    </div>
                    {{-- End Tag --}}

                    {{-- Detail --}}

                    <div class="form-group">
                        <label for="detail_en">Detail English</label>
                        <textarea class="form-control" name="detail_en" id="summernote1"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="detail_en">Detail Vietnamese</label>
                        <textarea class="form-control" name="detail_vn" id="summernote2"></textarea>
                    </div>


                    {{-- End Detail --}}

                    <hr>

                    <h4>Extra options</h4>

                    <div class="row">

                        <div class="form-group col-md-3">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="headline"> Headline <i
                                        class="input-helper"></i></label>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="big_thumbnail"> Big Thumbnail
                                    <i class="input-helper"></i></label>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="first_section"> First section
                                    <i class="input-helper"></i></label>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="first_section_thumbnail">
                                    First section
                                    thumbnail <i class="input-helper"></i></label>
                            </div>
                        </div>

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
