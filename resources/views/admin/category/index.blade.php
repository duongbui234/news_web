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
                                <th> Category English </th>
                                <th> Category Vietnamese </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach ($categories as $category)

                            <tr>
                                <td> {{ $i++ }} </td>
                                <td> {{ $category->category_en }} </td>
                                <td> {{ $category->category_vn }} </td>
                                <td>
                                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-info">Edit</a>
                                    <a href="{{ route('category.delete', $category->id) }}"
                                        class="btn btn-danger">Delete</a>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $categories->links('pagination') }}
            </div>
        </div>
    </div>

</div>


@endsection
