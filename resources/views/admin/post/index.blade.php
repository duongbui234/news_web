@extends('admin.admin_master')

@section('admin')

<div class="content-wrapper">

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All Posts</h4>

                <div class="row">
                    <a href="{{ route('post.add') }}"><button type="button" class="btn btn-outline-danger btn-icon-text"
                            style="margin: 12px; padding: 10px">Add
                            Post</button></a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Post Title </th>
                                <th> Category </th>
                                <th> District </th>
                                <th> Image </th>
                                <th> Post Date </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach ($posts as $post)

                            <tr>
                                <td> {{ $i++ }} </td>
                                <td> {{ Str::limit($post->title_en, 30, '...') }} </td>
                                <td> {{ $post->category_en }} </td>
                                <td> {{ $post->district_en }} </td>
                                <td><img src="{{ asset($post->image) }}" alt="post image"
                                        style="width: 50px height: 50px">
                                </td>
                                <td> {{  Carbon\Carbon::parse($post->post_date)->diffForHumans() }} </td>
                                <td>
                                    <a href="{{ route('post.edit', $post->id) }}" class="btn btn-info">Edit</a>
                                    <a href="{{ route('post.delete', $post->id) }}" class="btn
                                    btn-danger">Delete</a>

                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $posts->links('pagination') }}
            </div>
        </div>
    </div>

</div>


@endsection
