@extends('admin.admin_master')

@section('admin')

<div class="content-wrapper">

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All video</h4>

                <div class="row">
                    <a href="{{ route('video.add') }}"><button type="button"
                            class="btn btn-outline-danger btn-icon-text" style="margin: 12px; padding: 10px">Add
                            video</button></a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Video Title </th>
                                <th> Video </th>
                                <th> Video Type </th>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach ($video as $row)

                            <tr>
                                <td> {{ $i++ }} </td>
                                <td> {{  Str::limit($row->title, 30, '...')  }} </td>
                                <td>{{ $row->embed_code }}</td>
                                <td> @if ($row->type == 1)
                                    <span class="badge badge-success">Big video</span>
                                    @else
                                    <span class="badge badge-info">Small video</span>
                                    @endif </td>
                                </td>
                                <td>
                                    <a href="" class="btn btn-info">Edit</a>
                                    <a href="" class="btn
                                    btn-danger">Delete</a>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $video->links('pagination') }}
            </div>
        </div>
    </div>

</div>


@endsection
