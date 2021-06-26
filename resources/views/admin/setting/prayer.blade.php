@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="content-wrapper">



    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Update Prayer</h4>
                <form class="forms-sample" method="POST" action="{{ route('prayer.update', $prayer->id) }}">
                    @csrf

                    <div class="form-group">
                        <label for="hanoi">hanoi</label>
                        <input type="text" class="form-control" id="hanoi" name="hanoi" value="{{ $prayer->hanoi }}">
                    </div>
                    <div class="form-group">
                        <label for="saigon">saigon</label>
                        <input type="text" class="form-control" id="saigon" name="saigon" value="{{ $prayer->saigon }}">
                    </div>
                    <div class="form-group">
                        <label for="danang">danang</label>
                        <input type="text" class="form-control" id="danang" name="danang" value="{{ $prayer->danang }}">
                    </div>
                    <div class="form-group">
                        <label for="sonla">sonla</label>
                        <input type="text" class="form-control" id="sonla" name="sonla" value="{{ $prayer->sonla }}">
                    </div>
                    <div class="form-group">
                        <label for="haiduong">haiduong</label>
                        <input type="text" class="form-control" id="haiduong" name="haiduong"
                            value="{{ $prayer->haiduong }}">
                    </div>
                    <div class="form-group">
                        <label for="thaibinh">thaibinh</label>
                        <input type="text" class="form-control" id="thaibinh" name="thaibinh"
                            value="{{ $prayer->thaibinh }}">
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
