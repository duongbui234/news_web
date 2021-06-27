@extends('admin.admin_master')

@section('admin')

<div class="content-wrapper">

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All photo</h4>

                <div class="row">
                    <a href="{{ route('photo.add') }}"><button type="button"
                            class="btn btn-outline-danger btn-icon-text" style="margin: 12px; padding: 10px">Add
                            photo</button></a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Photo Title </th>
                                <th> Image upload </th>
                                <th> Photo Type </th>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach ($photo as $row)

                            <tr>
                                <td> {{ $i++ }} </td>
                                <td> {{ $row->title }} </td>
                                <td><img src="{{ asset($row->photo) }}" alt="photo" style="width: 50px height: 50px">
                                <td> @if ($row->type == 1)
                                    <span class="badge badge-success">Big photo</span>
                                    @else
                                    <span class="badge badge-info">Small photo</span>
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
                {{ $photo->links('pagination') }}
            </div>
        </div>
    </div>

</div>


@endsection
