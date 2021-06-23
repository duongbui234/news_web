@extends('admin.admin_master')

@section('admin')

<div class="content-wrapper">

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All SubDistrict</h4>

                <div class="row">
                    <a href="{{ route('subdistrict.add') }}"><button type="button"
                            class="btn btn-outline-danger btn-icon-text" style="margin: 12px; padding: 10px">Add
                            SubDistrict</button></a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> District English </th>
                                <th> District Vietnamese </th>
                                <th> District name </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach ($subDistricts as $sub)

                            <tr>
                                <td> {{ $i++ }} </td>
                                <td> {{ $sub->subdistrict_en }} </td>
                                <td> {{ $sub->subdistrict_vn }} </td>
                                <td> {{ $sub->district_en }} </td>
                                <td>
                                    <a href="{{ route('subdistrict.edit', $sub->id) }}" class="btn
                                    btn-info">Edit</a>
                                    {{-- <a href="" class="btn btn-info">Edit</a> --}}
                                    <a href="{{ route('subdistrict.delete', $sub->id) }}"
                                        class="btn btn-danger">Delete</a>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $subDistricts->links('pagination') }}
            </div>
        </div>
    </div>

</div>


@endsection
