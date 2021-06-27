@extends('admin.admin_master')

@section('admin')

<div class="content-wrapper">

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All Websites</h4>

                <div class="row">
                    <a href="{{ route('website.add') }}"><button type="button"
                            class="btn btn-outline-danger btn-icon-text" style="margin: 12px; padding: 10px">Add
                            Website</button></a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Website name </th>
                                <th> Webiste link </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach ($websites as $row)

                            <tr>
                                <td> {{ $i++ }} </td>
                                <td> {{ $row->name }} </td>
                                <td> {{ $row->link }} </td>
                                <td>
                                    <a href="{{ route('website.edit', $row->id) }}" class="btn
                                    btn-info">Edit</a>
                                    <a href="{{ route('website.delete', $row->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $websites->links('pagination') }}
            </div>
        </div>
    </div>

</div>


@endsection
