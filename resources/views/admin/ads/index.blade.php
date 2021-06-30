@extends('admin.admin_master')

@section('admin')

<div class="content-wrapper">

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All Advertisement</h4>

                <div class="row">
                    <a href="{{ route('ads.add') }}"><button type="button" class="btn btn-outline-danger btn-icon-text"
                            style="margin: 12px; padding: 10px">Add
                        </button></a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Link </th>
                                <th> Image </th>
                                <th> Type </th>
                                <th> Action </th>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach ($ads as $row)

                            <tr>
                                <td> {{ $i++ }} </td>
                                <td> {{ $row->link }} </td>
                                <td><img src="{{ asset($row->ads) }}" alt="photo" style="width: 50px height: 50px">
                                <td> @if ($row->type == 1)
                                    <span class="badge badge-success">Horizontal</span>
                                    @else
                                    <span class="badge badge-info">Vertical</span>
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

            </div>
        </div>
    </div>

</div>


@endsection
