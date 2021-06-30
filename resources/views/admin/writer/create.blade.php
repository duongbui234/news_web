@extends('admin.admin_master')

@section('admin')

<div class="content-wrapper">



    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Writer</h4>
                <form class="forms-sample" method="POST" action="{{ route('writer.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" name="password" class="form-control" id="password">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-check form-check-primary">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" value='1' name="category">
                                        category <i class="input-helper"></i></label>
                                </div>
                                <div class="form-check form-check-success">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" value='1' name="district">
                                        district <i class="input-helper"></i></label>
                                </div>
                                <div class="form-check form-check-info">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" value='1' name="post"> post <i
                                            class="input-helper"></i></label>
                                </div>
                                <div class="form-check form-check-danger">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" value='1' name="setting">
                                        setting <i class="input-helper"></i></label>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-check form-check-success">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" value='1' name="website">
                                        website <i class="input-helper"></i></label>
                                </div>
                                <div class="form-check form-check-info">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" value='1' name="gallery">
                                        gallery
                                        <i class="input-helper"></i></label>
                                </div>
                                <div class="form-check form-check-danger">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" value='1' name="ads">
                                        ads <i class="input-helper"></i></label>
                                </div>
                                <div class="form-check form-check-warning">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" value='1' name="role"> role
                                        <i class="input-helper"></i></label>
                                </div>

                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection
