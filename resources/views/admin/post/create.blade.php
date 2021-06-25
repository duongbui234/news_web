@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="content-wrapper">



    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add post</h4>
                <form class="forms-sample" method="POST" action="{{ route('post.store') }}"
                    enctype="multipart/form-data">
                    @csrf

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
                            <select class="form-control" id="category_id" name="category_id">
                                <option>--Select Category--</option>
                                @foreach ($categories as $row)
                                <option value="{{ $row->id }}">{{ $row->category_en }} | {{ $row->category_vn }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="title_vn">Sub Category</label>
                            <select class="form-control" name="subcategory_id" id="subcategory_id">
                                <option>--Select SubCategory--</option>
                            </select>
                        </div>
                    </div>
                    {{--End Category --}}


                    {{-- District --}}
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="district_id">District</label>
                            <select class="form-control" id="district_id" name="district_id">
                                <option>--Select District--</option>
                                @foreach ($districts as $row)
                                <option value="{{ $row->id }}">{{ $row->district_en }} | {{ $row->district_vn }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="subdistrict_id">Sub District</label>
                            <select class="form-control" id="subdistrict_id" name="subdistrict_id">
                                <option>--Select SubDistrict--</option>
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
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
                        </div>
                    </div>
                    {{--End Image --}}

                    {{-- Tag --}}
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="tags_en">Tag English</label>
                            <input type="text" class="form-control" id="tags_en" name="tags_en">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tags_en">Tag Vietnamese</label>
                            <input type="text" class="form-control" id="tags_en" name="tags_vn">
                        </div>
                    </div>
                    {{-- End Tag --}}

                    {{-- Detail --}}

                    <div class="form-group">
                        <label for="summernote1">Detail English</label>
                        <textarea class="form-control" name="details_en" id="summernote1"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="summernote2">Detail Vietnamese</label>
                        <textarea class="form-control" name="details_vn" id="summernote2"></textarea>
                    </div>


                    {{-- End Detail --}}

                    <hr>

                    <h4>Extra options</h4>

                    <div class="row">

                        <div class="form-group col-md-3">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="headline" value="1"> Headline
                                    <i class="input-helper"></i></label>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="big_thumbnail" value="1"> Big
                                    Thumbnail
                                    <i class="input-helper"></i></label>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="first_section" value="1">
                                    First section
                                    <i class="input-helper"></i></label>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="first_section_thumbnail"
                                        value="1">
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
