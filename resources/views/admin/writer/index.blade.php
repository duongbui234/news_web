@extends('admin.admin_master')

@section('admin')

<div class="content-wrapper">

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All Category</h4>

                <div class="row">
                    <a href="{{ route('category.add') }}"><button type="button"
                            class="btn btn-outline-danger btn-icon-text" style="margin: 12px; padding: 10px">Add
                            Category</button></a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Name </th>
                                <th> Role </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach ($writer as $row)

                            <tr>
                                <td> {{ $i++ }} </td>
                                <td> {{ $row->name }} </td>
                                <td>
                                    @if ($row->category == 1)
                                    <span class="badge badge-primary">category</span>
                                    @endif
                                    @if ($row->district == 1)
                                    <span class="badge badge-primary">district</span>
                                    @endif
                                    @if ($row->post == 1)
                                    <span class="badge badge-primary">post</span>
                                    @endif
                                    @if ($row->setting == 1)
                                    <span class="badge badge-primary">setting</span>
                                    @endif
                                    @if ($row->website == 1)
                                    <span class="badge badge-primary">website</span>
                                    @endif
                                    @if ($row->gallery == 1)
                                    <span class="badge badge-primary">gallery</span>
                                    @endif
                                    @if ($row->ads == 1)
                                    <span class="badge badge-primary">ads</span>
                                    @endif
                                    @if ($row->role == 1)
                                    <span class="badge badge-primary">role</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="" class="btn btn-info">Edit</a>
                                    <a href="" class="btn btn-danger">Delete</a>
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
