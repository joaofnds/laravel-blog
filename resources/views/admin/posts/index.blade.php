@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">

            <table class="table table-hover">
                <thead>
                <th>Image</th>
                <th>Title</th>
                <th>Edit</th>
                <th>Trash</th>
                </thead>

                <tbody>
                @foreach($posts as $post)
                    <tr>

                        <td>
                            <img width="80px" height="45px" src="{{ $post->featured }}">
                        </td>

                        <td>
                            {{ $post->title }}
                        </td>

                        <td>
                            <a href="{{ route('post.edit', ['id' => $post->id]) }}"
                                role="button"
                                class="btn btn-info">Edit</a>
                        </td>

                        <td>
                            <a href="{{ route('post.trash', ['id' => $post->id]) }}"
                                role="button"
                                class="btn btn-danger">Trash</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
