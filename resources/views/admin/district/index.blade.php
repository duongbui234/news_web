@extends('admin.admin_master')

@section('admin')

<div class="content-wrapper">

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All district</h4>

                <div class="row">

                    <a href="{{ route('district.add') }}"><button type="button"
                            class="btn btn-outline-danger btn-icon-text" style="margin: 12px; padding: 10px">Add
                            District</button></a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> District English </th>
                                <th> District Vietnamese </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach ($district as $row)

                            <tr>
                                <td> {{ $i++ }} </td>
                                <td> {{ $row->district_en }} </td>
                                <td> {{ $row->district_vn }} </td>
                                <td>
                                    <a href="{{ route('district.edit', $row->id) }}" class="btn btn-info">Edit</a>
                                    <a href="{{ route('district.delete', $row->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $district->links('pagination') }}
            </div>
        </div>
    </div>

</div>


@endsection
