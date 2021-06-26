@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="content-wrapper">



    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Live TV settings</h4>

                <div class="row" style="padding: 14px; flex-direction: column; align-items: flex-start;">
                    @if ($livetv->status == 1)

                    <a href="{{ route('livetv.inactive',$livetv->id) }}" style="padding: 10px"
                        class="btn btn-danger">Inactive</a>
                    <small class="text-success" style="margin-top: 5px">Live TV is active</small>

                    @else

                    <a href="{{ route('livetv.active',$livetv->id) }}" style="padding: 10px"
                        class="btn btn-primary">Active</a>
                    <small class="text-danger" style="margin-top: 5px">Live TV is inactive</small>

                    @endif
                </div>

                <form class="forms-sample" style="margin-top: 10px" method="POST"
                    action="{{ route('livetv.update', $livetv->id) }}">
                    @csrf

                    <div class="form-group">
                        <label for="facebook">Embed code for Live TV</label>
                        <textarea class="form-control" id="summernote1"
                            name="embed_code">{{ $livetv->embed_code }}</textarea>
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
