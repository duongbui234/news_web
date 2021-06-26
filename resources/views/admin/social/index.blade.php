@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="content-wrapper">



    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Update social links</h4>
                <form class="forms-sample" method="POST" action="{{ route('social.update', $social->id) }}">
                    @csrf

                    <div class="form-group">
                        <label for="facebook">Facebook</label>
                        <input type="text" class="form-control" id="facebook" name="facebook"
                            value="{{ $social->facebook }}">
                    </div>
                    <div class="form-group">
                        <label for="twitter">Twitter</label>
                        <input type="text" class="form-control" id="twitter" name="twitter"
                            value="{{ $social->twitter }}">
                    </div>
                    <div class="form-group">
                        <label for="youtube">Youtube</label>
                        <input type="text" class="form-control" id="youtube" name="youtube"
                            value="{{ $social->youtube }}">
                    </div>
                    <div class="form-group">
                        <label for="linkedin">Linkedin</label>
                        <input type="text" class="form-control" id="linkedin" name="linkedin"
                            value="{{ $social->linkedin }}">
                    </div>
                    <div class="form-group">
                        <label for="instagram">Instagram</label>
                        <input type="text" class="form-control" id="instagram" name="instagram"
                            value="{{ $social->instagram }}">
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
