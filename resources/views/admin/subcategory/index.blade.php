@extends('admin.admin_master')

@section('admin')

<div class="content-wrapper">

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All SubCategory</h4>

                <div class="row">
                    <a href="{{ route('subcategory.add') }}"><button type="button"
                            class="btn btn-outline-danger btn-icon-text" style="margin: 12px; padding: 10px">Add
                            SubCategory</button></a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Category English </th>
                                <th> Category Vietnamese </th>
                                <th> Category name </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach ($subCategories as $sub)

                            <tr>
                                <td> {{ $i++ }} </td>
                                <td> {{ $sub->subcategory_en }} </td>
                                <td> {{ $sub->subcategory_vn }} </td>
                                <td> {{ $sub->category_en }} </td>
                                <td>
                                    <a href="{{ route('subcategory.edit', $sub->id) }}" class="btn
                                    btn-info">Edit</a>
                                    {{-- <a href="" class="btn btn-info">Edit</a> --}}
                                    <a href="{{ route('subcategory.delete', $sub->id) }}"
                                        class="btn btn-danger">Delete</a>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $subCategories->links('pagination') }}
            </div>
        </div>
    </div>

</div>


@endsection
