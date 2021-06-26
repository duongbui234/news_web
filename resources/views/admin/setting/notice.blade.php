@extends('admin.admin_master')

@section('admin')


<div class="content-wrapper">



    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Notice settings</h4>

                <div class="row" style="padding: 14px; flex-direction: column; align-items: flex-start;">
                    @if ($notice->status == 1)

                    <a href="{{ route('notice.inactive',$notice->id) }}" style="padding: 10px"
                        class="btn btn-danger">Inactive</a>
                    <small class="text-success" style="margin-top: 5px">Notice is active</small>

                    @else

                    <a href="{{ route('notice.active',$notice->id) }}" style="padding: 10px"
                        class="btn btn-primary">Active</a>
                    <small class="text-danger" style="margin-top: 5px">Notice is inactive</small>

                    @endif
                </div>

                <form class="forms-sample" style="margin-top: 10px" method="POST"
                    action="{{ route('notice.update', $notice->id) }}">
                    @csrf

                    <div class="form-group">
                        <label for="facebook">Notice</label>
                        <textarea class="form-control" id="summernote1" name="notice">{{ $notice->notice }}</textarea>
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
